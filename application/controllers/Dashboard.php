<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Prateek Narayan
 * @version : 1.1
 * @since : 14 November 2019
 */
class Dashboard extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('cias_helper');
    }


    /**
     * This method is calling all data for chart on dashboard.
    */

    public function piechart() {
        $email =  $this->session->userdata('email');
        $salesforce_data= $this->session->userdata();
        $url = $salesforce_data['instance_url'].'/services/apexrest/TaskChartData?user_email='.$email;
        $result = sendGetRequest($url, $salesforce_data['access_token']);
          
        if(!empty($result)){
            echo json_encode(["st"=>1,"result"=>$result]);

        } else { 
            echo json_encode(["st"=>0]);
        }
    }

    /*List of All Task start*/
    public function listOfTask(){
        $email =  $this->session->userdata('email');
        $filter_data =$this->security->xss_clean($_REQUEST['filter_data']);
        $salesforce_data= $this->session->userdata();

        if(isset($salesforce_data) && !empty($salesforce_data)){
            if($filter_data=='All'){
                $url = $salesforce_data['instance_url']."/services/data/v43.0/query/?q=select+id,name,Taskray_Priority__c,Name__c,PO_Status__c,OrderDate__c,StartDate__c,PricePerWord__c+from+PurchaseOrder__c where supplier_contact__r.email='".$email."' order by createdDate desc "; 
            }
            else{
                $url = $salesforce_data['instance_url']."/services/data/v43.0/query/?q=select+id,name,Taskray_Priority__c,Name__c,PO_Status__c,OrderDate__c,StartDate__c,PricePerWord__c+from+PurchaseOrder__c where supplier_contact__r.email='".$email."' and PO_Status__c='".$filter_data."' order by createdDate desc ";
            }

            $task_list = sendGetRequest($url, $salesforce_data['access_token']);
            if(count($task_list->records)>0){
                echo json_encode(["st"=>1,"task_list"=>$task_list]);
            } else { 
                echo json_encode(["st"=>0 ,"msg"=>"No Data Available"]);
            }
        } else {
            echo json_encode(["st" => 403]);
        }
    }
    
    /*Task Detail start*/
    public function getTaskDetail(){
        $task_id = $this->uri->segment(2);
        $limit=10;
        $offset=0;
        $email = $this->session->userdata('email');
        
        $salesforce_data= $this->session->userdata();
        $url = $salesforce_data['instance_url']."/services/data/v43.0/query/?q=select+name,Name__c,PO_Status__c,Taskray_Priority__c,Sales_Order_Name__c,AdditionalInfo_For__c,AmountPaid__c,Terms_and_Conditions__c,TotalWords__c,GrandTotal__c,Supplier_Contact__r.Name,PurchaseServiceName_For__c,SalesServiceName__c,Project_Manager__r.Name,OrderDate__c,StartDate__c,PricePerWord__c,Derogating_Provision__c,CreatedBy.Name,LastModifiedBy.Name,TaxVAT__c,PurchaseOrderType__c+from+PurchaseOrder__c where id='".$task_id."' and Supplier_Contact__r.email='". $email."'  limit ". $limit." offset ".$offset;
       
        $data['task_detail'] = sendGetRequest($url, $salesforce_data['access_token']);
        // echo '<pre>';print_r($data['task_detail']);die;
        $data['task_id'] = $task_id;
        $data['pageTitle'] = 'Task Detail : Intelligent World';
        
        if(!empty($data)){
            $this->load->view('includes/header', $data);
            $this->load->view('task_detail', $data);   
            $this->load->view('includes/footer'); 
        }
    }


    //profile data start
    public function profileData() {
        $email =  $this->session->userdata('email');
        $salesforce_data= $this->session->userdata();
        if(isset($salesforce_data) & !empty($salesforce_data)){
        $url = $salesforce_data['instance_url']."/services/data/v43.0/query/?q=select+id+,name+,email+,phone+,MobilePhone+,account.Name+,Linkedin_URL__c+,Twitter_Name__c+,Communication_Language__c+,MailingAddress+,Company__c+,Description+from+contact where email='".$email."'";

        $profile_data = sendGetRequest($url, $salesforce_data['access_token']);
          
          if(!empty($profile_data)){
            echo json_encode(["st"=>1,"profile_data"=>$profile_data]);

           } else { 
            echo json_encode(["st"=>0]);
           }
        } else {
            echo json_encode(['st' => 403]);
        }
    }
    //profile data end

    //edit profile data
    public function profileDatasubmit() {
        $salesforce_data= $this->session->userdata();
         if($salesforce_data['userType'] === 'EduUser'){

        $name =$this->security->xss_clean($_REQUEST['name']);
        $phone =$this->security->xss_clean($_REQUEST['phone']);
        $about =$this->security->xss_clean($_REQUEST['about']);
        $company =$this->security->xss_clean($_REQUEST['company']);
        $mobile =$this->security->xss_clean($_REQUEST['mobile']);
        $linked_url =$this->security->xss_clean($_REQUEST['linked_url']);
        $twitter_url =$this->security->xss_clean($_REQUEST['twitter_url']);
        $comm_lan =$this->security->xss_clean($_REQUEST['comm_lan']);
        $m_address_street =$this->security->xss_clean($_REQUEST['m_address_street']);
        $m_address_city =$this->security->xss_clean($_REQUEST['m_address_city']);
        $m_address_state =$this->security->xss_clean($_REQUEST['m_address_state']);
        $m_address_country =$this->security->xss_clean($_REQUEST['m_address_country']);
        $m_address_code =$this->security->xss_clean($_REQUEST['m_address_code']);


        $data = array('LastName' => $name , 
                      'phone' => $phone ,
                      'Description' => $about ,
                      'Company__c' => $company,
                      'MobilePhone' => $mobile ,
                      'Linkedin_URL__c' => $linked_url ,
                      'Twitter_Name__c' => $twitter_url ,
                      'Communication_Language__c' => $comm_lan ,
                      'MailingStreet' => $m_address_street ,
                      'MailingCity' => $m_address_city ,
                      'MailingState' => $m_address_state ,
                      'MailingCountry' => $m_address_country ,
                      'MailingPostalCode' => $m_address_code  
                       );

         }
         else if($salesforce_data['userType'] === 'Supplier') {

            $name =$this->security->xss_clean($_REQUEST['name']);
        $phone =$this->security->xss_clean($_REQUEST['phone']);
        $mobile =$this->security->xss_clean($_REQUEST['mobile']);
        $linked_url =$this->security->xss_clean($_REQUEST['linked_url']);
        $twitter_url =$this->security->xss_clean($_REQUEST['twitter_url']);
        $comm_lan =$this->security->xss_clean($_REQUEST['comm_lan']);
        $m_address_street =$this->security->xss_clean($_REQUEST['m_address_street']);
        $m_address_city =$this->security->xss_clean($_REQUEST['m_address_city']);
        $m_address_state =$this->security->xss_clean($_REQUEST['m_address_state']);
        $m_address_country =$this->security->xss_clean($_REQUEST['m_address_country']);
        $m_address_code =$this->security->xss_clean($_REQUEST['m_address_code']);
       


        $data = array('LastName' => $name , 
                      'phone' => $phone ,
                      'MobilePhone' => $mobile ,
                      'Linkedin_URL__c' => $linked_url ,
                      'Twitter_Name__c' => $twitter_url ,
                      'Communication_Language__c' => $comm_lan ,
                      'MailingStreet' => $m_address_street ,
                      'MailingCity' => $m_address_city ,
                      'MailingState' => $m_address_state ,
                      'MailingCountry' => $m_address_country ,
                      'MailingPostalCode' => $m_address_code 
                       );


         }
         else if($salesforce_data['userType'] === 'Merge'){

            $name =$this->security->xss_clean($_REQUEST['name']);
        $phone =$this->security->xss_clean($_REQUEST['phone']);
        $mobile =$this->security->xss_clean($_REQUEST['mobile']);
        $linked_url =$this->security->xss_clean($_REQUEST['linked_url']);
        $twitter_url =$this->security->xss_clean($_REQUEST['twitter_url']);
        $comm_lan =$this->security->xss_clean($_REQUEST['comm_lan']);
        $m_address_street =$this->security->xss_clean($_REQUEST['m_address_street']);
        $m_address_city =$this->security->xss_clean($_REQUEST['m_address_city']);
        $m_address_state =$this->security->xss_clean($_REQUEST['m_address_state']);
        $m_address_country =$this->security->xss_clean($_REQUEST['m_address_country']);
        $m_address_code =$this->security->xss_clean($_REQUEST['m_address_code']);
        $about =$this->security->xss_clean($_REQUEST['about']);
        $company =$this->security->xss_clean($_REQUEST['company']);


        $data = array('LastName' => $name , 
                      'phone' => $phone ,
                      'MobilePhone' => $mobile ,
                      'Linkedin_URL__c' => $linked_url ,
                      'Twitter_Name__c' => $twitter_url ,
                      'Communication_Language__c' => $comm_lan ,
                      'MailingStreet' => $m_address_street ,
                      'MailingCity' => $m_address_city ,
                      'MailingState' => $m_address_state ,
                      'MailingCountry' => $m_address_country ,
                      'MailingPostalCode' => $m_address_code ,
                      'Description' => $about ,
                      'Company__c' => $company 
                       );


         }
        $contact_id =  $this->session->userdata('contact_id');
        //$salesforce_data= $this->session->userdata();
        $url = $salesforce_data['instance_url']."/services/data/v41.0/sobjects/contact/".$contact_id;

        $profile_updata = sendPatchRequest($url, $data,$salesforce_data['access_token']);

        if(!empty($profile_updata)){
            echo json_encode(["st"=>1,"profile_updata"=>$profile_updata]);

        } else { 
            echo json_encode(["st"=>0]);
        }
    }

    // Profile image Method
    public function profileImage(){
         $salesforce_data= $this->session->userdata();
       // if($salesforce_data['userType'] == 'Supplier' || $salesforce_data['userType'] == 'Merge'){
        $contact_id =  $this->session->userdata('contact_id');
        //$salesforce_data= $this->session->userdata();

        if(isset($salesforce_data) & !empty($salesforce_data)){
            $url = $salesforce_data['instance_url']."/services/apexrest/UserProfilePic";

            $postData = ["contactId" => $contact_id];

            $profile_image_data = sendPostRequest($url, $postData, $salesforce_data['access_token']);

            $result = json_decode($profile_image_data);

            $image = base64_decode($result->response->Base64);
            $image_name = $this->session->userdata('contact_id');
            $filename = $image_name . '.' . 'png';
            $path = './assets/uploads/supplier_images/';
            $profile_image_data=file_put_contents($path . $filename, $image);

            $image_url = base_url().'assets/uploads/supplier_images/'.$contact_id.'.png';
            if(!empty($profile_image_data)){
                echo json_encode(["st"=>1, "image_url" => $image_url]);
            } else { 
                echo json_encode(["st"=>0]);
            }
        } else {
            echo json_encode(['st' => 403]);
        }
     //}
    //  else{
    //     echo json_encode(["st"=>0]); 
    //  }
    }


       public function acceptDashboardStatus() {
        $id = [];
        $PO_Status__c=[];
        $task_id = $this->security->xss_clean($_REQUEST['task_id']);
        $all_task_id = implode(",",$task_id);
        $data =  ["type"=>"accept", "tasks"=>$all_task_id];
        $salesforce_data= $this->session->userdata();
        if(isset($salesforce_data) & !empty($salesforce_data)){
           $url = $salesforce_data['instance_url']."/services/apexrest/TaskStatusUpdate";
           $acceptDashboardStatus = sendPostRequest($url, $data, $salesforce_data['access_token']);
           $result = json_decode($acceptDashboardStatus);
           if(!empty($result)){
            echo json_encode(["st"=>1,"acceptDashboardStatus"=>$result->response->Updated_Tasks_List]);

           } else { 
            echo json_encode(["st"=>0]);
           }
        }  else {
            echo json_encode(['st' => 403]);
        }   
    }


    public function rejectDashboardStatus() {
        $task_id = $this->security->xss_clean($_REQUEST['task_id']);
        $all_task_id = implode(",",$task_id);
        $data =  ["type"=>"reject", "tasks"=>$all_task_id];
        $salesforce_data= $this->session->userdata();
        if(isset($salesforce_data) & !empty($salesforce_data)){
          $url = $salesforce_data['instance_url']."/services/apexrest/TaskStatusUpdate";
          $rejectDashboardStatus = sendPostRequest($url, $data, $salesforce_data['access_token']);
          $result = json_decode($rejectDashboardStatus);
          if(!empty($result)){
            echo json_encode(["st"=>1,"rejectDashboardStatus"=>$result->response->Updated_Tasks_List]);

          } else { 
            echo json_encode(["st"=>0]);
          }
        }else {
            echo json_encode(['st' => 403]);
        }   
    }

    public function updateProfileImg(){
        
        $config['upload_path']   = './assets/uploads/supplier_images/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        /*$config['max_size']      = 100; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 768;  */
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('profile_img')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(['st' => 0, "msg" => "Please Select an Image"]);
        }

        else { 
            $data = array('upload_data' => $this->upload->data());
            //echo '<pre>'; print_r($data);die;
            $image_url = base_url().'assets/uploads/supplier_images/'.$data['upload_data']['file_name'];
            $salesforce_data= $this->session->userdata();
            $Base64=  base64_encode(file_get_contents($image_url));

            // echo $Base64;die;
            $data =  ["contactId"=>$salesforce_data['contact_id'], "base64Encode"=>$Base64];
            
            $url = $salesforce_data['instance_url']."/services/apexrest/UpdateProfilePic";
            $profile_image_salesforce = sendPostRequest($url, $data, $salesforce_data['access_token']);
            $result = json_decode($profile_image_salesforce);

            // echo '<pre>';print_r($result);
            if(!empty($result->response->status == "Success")){
                echo json_encode(['st' => 1, "msg" => "Image uploaded successfully.", "image_url" => $image_url]); 
            }
        } 
    }  


    // recent search api 
        public function recentsearch(){

        $contact_id =  $this->session->userdata('contact_id');
        $salesforce_data= $this->session->userdata();
        $url = $salesforce_data['instance_url']."/services/apexrest/RecentSearchesAPI?supplier=".$contact_id;

        $recent_search = sendGetRequest($url, $salesforce_data['access_token']);
        // echo "<pre>";print_r($recent_search);die;

            if(!empty($recent_search)){
              echo json_encode(["st"=>1,"recent_search"=>$recent_search]);

            } else { 
              echo json_encode(["st"=>0]);
            }

        } 

         //  search api 
        public function search_data(){

        $contact_id =  $this->session->userdata('contact_id');
        $input_data =$this->security->xss_clean($_REQUEST['input_data']);
        $salesforce_data= $this->session->userdata();
        $url = $salesforce_data['instance_url']."/services/apexrest/POSearchAPI?searchStr=".$input_data."&supplier=".$contact_id;
        $search = sendGetRequest($url, $salesforce_data['access_token']);
            if(!empty($search)){
              echo json_encode(["st"=>1,"search"=>$search]);
            } else { 
              echo json_encode(["st"=>0]);
            }

        } 

        public function update_recent_search_data(){       
           $task_id = $this->security->xss_clean($_REQUEST['task_id']);
           $contact_id =  $this->session->userdata('contact_id'); 
           $data =  ["Supplier__c"=>$contact_id, "Purchase_Order__c"=>$task_id];
           $salesforce_data= $this->session->userdata();
           $url = $salesforce_data['instance_url']."/services/data/v36.0/sobjects/Recent_Searches__c/";
           $update_recent_data = sendPostRequest($url, $data, $salesforce_data['access_token']);
          $result = json_decode($update_recent_data);

           if(!empty($result)){
            echo json_encode(["st"=>1,"update_recent_data"=>$result]);

           } else { 
            echo json_encode(["st"=>0]);
           } 

        }
		
		//update password
		 public function updatePassword() {
            $password_one =$this->security->xss_clean($_REQUEST['password_one']);
            $data = array('password__c' => $password_one
                       );
             // echo "<pre>";print_r($data);
            // die;

            $contact_id =  $this->session->userdata('contact_id');
            $salesforce_data= $this->session->userdata();
            if(isset($salesforce_data) & !empty($salesforce_data)){
                $url = $salesforce_data['instance_url']."/services/data/v41.0/sobjects/contact/".$contact_id;
                $password_updata = sendPatchRequest($url, $data,$salesforce_data['access_token']);

                if(!empty($password_updata)){
                    echo json_encode(["st"=>1,"password_updata"=>$password_updata]);
                  } else { 
                echo json_encode(["st"=>0]);
                }
            } else {
               echo json_encode(["st" => 403]);
              }
        }




        // Invoice detail

         public function invoiceDetail() {
           $contact_id =  $this->session->userdata('contact_id');
            $salesforce_data= $this->session->userdata();
            $url = $salesforce_data['instance_url'].'/services/apexrest/invoice?contactid='.$contact_id;

            // echo $url; 
            // die;
            $result = sendGetRequest($url, $salesforce_data['access_token']);
             
            if(!empty($result)){
                if ( $result->numberofrecords == '0'){
                  echo json_encode(["st"=>404,"result"=>$result]); 
                }else{
                   echo json_encode(["st"=>1,"result"=>$result]); 
                }
                

            } else { 
                echo json_encode(["st"=>0]);
             }
        }
}
?>
