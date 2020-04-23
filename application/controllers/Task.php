<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * @author : Prateek Narayan
 * @version : 1.1
 * @since : 19 November 2016
 */
class Task extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('cias_helper');
        $this->load->library('form_validation');
    }
    
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->load->view('task_detail');
        //$data['page_title'] = 'Task Detail Page';
        // redirect('task_detail')
        // $this->loadViews('task_detail', $data);
    }

   public function paymentDetail() {
        $task_id = $this->uri->segment(3);
        $salesforce_data= $this->session->userdata();
        if(isset($salesforce_data) & !empty($salesforce_data)){

            $url = $salesforce_data['instance_url']."/services/data/v43.0/query/?q=select id,name,GrandTotal__c,Amount__c,Status__c from PO_Payment__c where PurchaseOrder__c='".$task_id."' order by createdDate desc limit 1";

            $payment_data = sendGetRequest($url, $salesforce_data['access_token']);

            // echo '<pre>';print_r($payment_data);die;
            if(count($payment_data->records)>0){
                echo json_encode(["st"=>1,"payment_data"=>$payment_data]);
            } else { 
                echo json_encode(["st"=>0,"msg"=>"No Data Available"]);
            }
        } else {
            echo json_encode(['st' => 403]);
        }
    }

        public function submitTaskDeliverable() {
        // echo '<pre>';print_r($_POST);die;

        $task_id = $this->input->post('task_id');
        // echo $task_id;die;
        $salesforce_data= $this->session->userdata();
        // $url = $salesforce_data['instance_url']."/services/data/v43.0/query/?q=select id,(select id,TASKRAY__Completed__c,name from TASKRAY__TaskRay_Checklist_Items__r) from TASKRAY__Project_Task__c where Purchase_Order__r.Supplier_Contact__c='".$salesforce_data['contact_id']."' and Purchase_Order__c='".$task_id."'";
        
        if(isset($salesforce_data) & !empty($salesforce_data)){
           //$url = $salesforce_data['instance_url']."/services/data/v43.0/query/?q=select id,TASKRAY__Description__c,(select id,TASKRAY__Completed__c,name from TASKRAY__TaskRay_Checklist_Items__r) from TASKRAY__Project_Task__c where Purchase_Order__r.Supplier_Contact__c='".$salesforce_data['contact_id']."' and Purchase_Order__c='".$task_id."' limit 1 ";

            $url = $salesforce_data['instance_url']."/services/data/v43.0/query/?q=select id,TASKRAY__Description__c,(select id,TASKRAY__Completed__c,name from TASKRAY__TaskRay_Checklist_Items__r order by TASKRAY__SortOrder__c),Purchase_Order__r.Content_URL__c from TASKRAY__Project_Task__c where Purchase_Order__r.Supplier_Contact__c='".$salesforce_data['contact_id']."' and Purchase_Order__c='".$task_id."' limit 1 ";
           // echo $url;die;
           $submitTaskDeliverable = sendGetRequest($url, $salesforce_data['access_token']);

           // echo '<pre>';print_r($submitTaskDeliverable);die;
           if(count($submitTaskDeliverable->records)>0){
            echo json_encode(["st"=>1,"submitTaskDeliverable"=>$submitTaskDeliverable, "sheet_link" => strstr($submitTaskDeliverable->records[0]->TASKRAY__Description__c, 'http')]);

            } else { 
            echo json_encode(["st"=>0,"msg"=>"No Data Available"]);
            }
        }  else {
            echo json_encode(['st' => 403]);
           }
    }
    
    public function updateSubmitTaskDeliverable() {

        $checkbox_id = $this->security->xss_clean($_REQUEST['check_id']);
        $check_id =explode(",", $checkbox_id);
       

         foreach ($check_id as $key => $value) {
            $data_id[] =array(
                "method" => "PATCH", 
                "url" => "v34.0/sobjects/TASKRAY__trChecklistItem__c/".$value,
                "richInput" => ["TASKRAY__Completed__c" => "true"]
            );   
        }
        // $data =json_encode($data_id);
        // echo '<pre>';print_r($data);die;

        $finalPostData = ["batchRequests" => $data_id];
        $salesforce_data= $this->session->userdata();
        if(isset($salesforce_data) & !empty($salesforce_data)){
        $url = $salesforce_data['instance_url']."/services/data/v41.0/composite/batch";
        
        $submitTaskDeliverable = sendPostRequest($url, $finalPostData , $salesforce_data['access_token']);
        $result = json_decode($submitTaskDeliverable);
        
        if(!empty($submitTaskDeliverable)){
            echo json_encode(["st"=>1,"submitTaskDeliverable"=>$result]);

        } else { 
            echo json_encode(["st"=>0]);
            }
        }  else {
            echo json_encode(['st' => 403]);
           }

    }



    public function submitTaskStatus() {

        $task_id = $this->security->xss_clean($_REQUEST['task_id']);
        $data =  ["type"=>"submit", "tasks"=>$task_id];
        $salesforce_data= $this->session->userdata();
        if(isset($salesforce_data) & !empty($salesforce_data)){
        $url = $salesforce_data['instance_url']."/services/apexrest/TaskStatusUpdate";
        $submitTaskStatus = sendPostRequest($url, $data, $salesforce_data['access_token']);
        $result = json_decode($submitTaskStatus);
        
        if(!empty($submitTaskStatus)){
            echo json_encode(["st"=>1,"submitTaskStatus"=>$result->response->Updated_Tasks_List[0]->PO_Status__c]);

        } else { 
            echo json_encode(["st"=>0]);
            }
        }  else {
            echo json_encode(['st' => 403]);
           }
    }



    public function acceptTaskStatus() {

        $task_id = $this->security->xss_clean($_REQUEST['task_id']);
        $data =  ["type"=>"accept", "tasks"=>$task_id];
        $salesforce_data= $this->session->userdata();

        if(isset($salesforce_data) & !empty($salesforce_data)){
            $url = $salesforce_data['instance_url']."/services/apexrest/TaskStatusUpdate";

            // echo $url;
            // echo '<pre>';print_r($data);die;
            $acceptTaskStatus = sendPostRequest($url, $data, $salesforce_data['access_token']);
            $result = json_decode($acceptTaskStatus);

            // echo '<pre>';print_r($acceptTaskStatus);die;
            if(!empty($result)){
                echo json_encode(["st"=>1,"acceptTaskStatus"=>$result->response->Updated_Tasks_List[0]->PO_Status__c]);
            } else { 
                echo json_encode(["st"=>0]);
            }
        }  else {
            echo json_encode(['st' => 403]);
        }
    }


    public function rejectTaskStatus() {

        $task_id = $this->security->xss_clean($_REQUEST['task_id']);
        $data =  ["type"=>"reject", "tasks"=>$task_id];
        $salesforce_data= $this->session->userdata();
            if(isset($salesforce_data) & !empty($salesforce_data)){
            
            $url = $salesforce_data['instance_url']."/services/apexrest/TaskStatusUpdate";
            $rejectTaskStatus = sendPostRequest($url, $data, $salesforce_data['access_token']);
            
            // echo '<pre>';print_r($rejectTaskStatus);die;
            $result = json_decode($rejectTaskStatus);
            if(!empty($result)){
                echo json_encode(["st"=>1,"rejectTaskStatus"=>$result->response->Updated_Tasks_List[0]->PO_Status__c]);

            } else { 
                echo json_encode(["st"=>0]);
            }
        }  else {
            echo json_encode(['st' => 403]);
        }
    }

    public function getAllQuestionAnswers(){
        $task_id = $this->uri->segment(2);

        $salesforce_data= $this->session->userdata();

        if(isset($salesforce_data) && !empty($salesforce_data)){
            $url = $salesforce_data['instance_url']."/services/apexrest/GetQuestionAnswers?contactId=".$salesforce_data['contact_id']."&taskId=".$task_id."";

            // echo $url;die;
            $result = sendGetRequest($url, $salesforce_data['access_token']);

            // echo '<pre>';print_r($result);die;
            // echo $result->response->isEditable;die;
            if($result->response->status == 'Success'){
                echo json_encode(["st" => 1, "data" => $result->response->Data, "is_editable" => $result->response->isEditable]);
            } else {
                echo json_encode(["st" => 0, "msg" => $result->response->message]);
            }
        } else {
            echo json_encode(["st" => 403]);
        }
    }

    public function saveQuestionAnswersData(){
        $data = $this->security->xss_clean($_POST);
        $task_id = $this->uri->segment(3);
        $type = $this->uri->segment(2);
        
        foreach ($data as $key => $value) {
            $data_id['data'][] =array(
                "RecordID" => $key, 
                "answer" => $value
            );
        }

        $salesforce_data = $this->session->userdata();
        if(isset($salesforce_data) && !empty($salesforce_data)){
            $url = $salesforce_data['instance_url']."/services/apexrest/GetQuestionAnswers?type=".$type."&task=".$task_id."";

            // echo $url;die;
            $result = json_decode(sendPostRequest($url, $data_id , $salesforce_data['access_token']));
            // echo '<pre>';print_r($result-);die;
            if($result->response->status == 'Success'){
                echo json_encode(["st" => 1, "msg" => $result->response->message, "is_editable" => $result->response->IsEditable]);
            } else {
                echo json_encode(["st" => 0]);
            }
        } else {
            echo json_encode(['st' => 403]);
        }
    }



    public function ChangeRequest(){
        $task_id = $this->security->xss_clean($_REQUEST['task_id']);
        $salesforce_data = $this->session->userdata();
        
        if(isset($salesforce_data) && !empty($salesforce_data)){
            $url = $salesforce_data['instance_url']."/services/apexrest/GetChangeRequests?task=".$task_id."";
            $ChangeRequest = sendGetRequest($url, $salesforce_data['access_token']);
            if(!empty($ChangeRequest) && is_array($ChangeRequest) && count($ChangeRequest)>0){
                echo json_encode(["st" => 1,"changerequest"=>$ChangeRequest]);  
            }  else {
                echo json_encode(["st" => 0,"msg"=>'No Data Available']);
            }
        } else {
            echo json_encode(["st" => 403]);
        }
    }
}

