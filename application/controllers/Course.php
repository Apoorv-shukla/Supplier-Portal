<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Prateek Narayan
 * @version : 1.1
 * @since : 14 November 2019
 */
class Course extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('cias_helper');
        $this->load->library('form_validation');
    }


    /**
     * This method is calling all data for chart on dashboard.
    */

    /*Course Detail start*/
    public function getCourseDetail(){
        $salesforce_data = $this->getAccessTokenSalesforce();
        //echo '<pre>'; print_r($salesforce_data);
        

    
        $course_id = $this->uri->segment(2);
        $contact_id = $this->session->userdata('contact_id');
         
        
         $url = $salesforce_data->instance_url.'/services/apexrest/getsubscribestatus?courseid='.$course_id.'&contactid='.$contact_id;
         

            $result = sendGetRequest($url, $salesforce_data->access_token);
             
            
                if ( $result->num == '1'){
                  redirect(base_url().'purchaseddetail?courseid='.$course_id.'&contactid='.$contact_id);
                }else{
                    
               
           
        
        //$salesforce_data= $this->session->userdata();
        $url = $salesforce_data->instance_url."/services/apexrest/getcoursedetails?courseid=$course_id";
       
        $data['Course_detail'] = sendGetRequest($url, $salesforce_data->access_token);
         //echo '<pre>';print_r($data['Course_detail']);die;
        $data['pageTitle'] = 'Course Detail : Intelligent World';
        
        if(!empty($data)){
            $this->load->view('includes/header_web');
            $this->load->view('course_detail', $data);   
            $this->load->view('includes/footer_web'); 
        }
    }
    }


        public function purchasedCourseDetail(){
        $salesforce_data = $this->getAccessTokenSalesforce();
        //echo '<pre>'; print_r($salesforce_data);
        //$this->session->set_userdata('session_variable_name', $newvalue);
        $session_mangement= $this->session->userdata();
        if($session_mangement['userType']=='Supplier')
        {
             $this->session->set_userdata('userType', 'Merge'); 
        }

        $arr = explode('?',$_SERVER['REQUEST_URI']);
        $contact_id = $this->session->userdata('contact_id');
        $run_contact = explode('&',$arr[1]);
        $id = explode('=',$run_contact[1]);
        $to_check_course = $salesforce_data->instance_url."/services/apexrest/getsubscribestatus?$arr[1]";
        $result = sendGetRequest($to_check_course, $salesforce_data->access_token);

        //echo base_url();die;
        if($contact_id!=$id[1])
        {
            redirect(base_url().'error');
        }
        elseif ($result->num==0) {
            redirect(base_url().'error');
        }

        else {
        $url = $salesforce_data->instance_url."/services/apexrest/getcoursedetails?$arr[1]";
        
        //echo $url; die;
        $data['Purchase_detail'] = sendGetRequest($url, $salesforce_data->access_token);
         //echo '<pre>';print_r($data['Purchase_detail']);die;
        $data['pageTitle'] = 'Course Detail : Intelligent World';
        
        if(!empty($data)){
            $this->load->view('includes/header_web');
            $this->load->view('purchased_course', $data);   
            $this->load->view('includes/footer_web');
        }
    }
}
    
    
    
    public function UserLoginCourse()
    {
        // $this->session->set_flashdata('error', 'Email or password mismatch');
        // $this->index();
        //echo '<pre>'; print_r($_REQUEST); die;
        $salesforce_data = $this->getAccessTokenSalesforce();
        $email = strtolower($this->security->xss_clean($_REQUEST['email']));
        $password = $_REQUEST['pass'];

        $this->form_validation->set_rules($email, 'Email', 'require');
        $this->form_validation->set_rules($password, 'Password', 'require');

        if($this->form_validation->run() === FALSE){
             echo json_encode(["st"=>0,"msg"=>"Email and Password Is Invalid"]);
        } else {
            $salesforce_data = $this->getAccessTokenSalesforce();

            $sessionArray = array(
                'access_token' => $salesforce_data->access_token,                    
                'instance_url' => $salesforce_data->instance_url,
                'isLoggedIn' => TRUE
            );

            $this->session->set_userdata($sessionArray);

            //$url = $salesforce_data->instance_url."/services/data/v43.0/query/?q=select+id,name+,email,photo__c+from+contact+where+email='".$email."'+and Password__c='".$password."'";
            $url = $salesforce_data->instance_url."/services/apexrest/LoginEduPortal?user_email=".$email."&password=".$password."";
            
            // echo $url;die;
            $result = sendGetRequest($url, $salesforce_data->access_token);

             
            if($result->totalSize != 0){
                $userSessionArray = array(
                        'email' => $result->records[0]->Email,                    
                        'contact_id' => $result->records[0]->Id,
                        'name' => $result->records[0]->Name,
                        'userType' => $result->userType
                    );
                    /*echo '<pre>';print_r($userSessionArray);die;*/
                    $this->session->set_userdata($userSessionArray);
                    echo json_encode(["st"=>1,"msg"=>"Success","contact_id"=>$userSessionArray['contact_id']]);
                    
            } else {    
                echo json_encode(["st"=>0,"msg"=>"Email and Password Is Invalid"]);

            }
        }
    }
    

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
    public function errorPage()
    {
        $this->load->view('error');
    }
    
    public function cancelPayment()
    {
        $this->load->view('cancel');
    }
    
    public function courseModule()
    {
        
        $salesforce_data = $this->getAccessTokenSalesforce();
        $contact_id = $this->session->userdata('contact_id');
        if($_REQUEST['status'] == 1){
            $postData = ["contactid" => $contact_id,
                        "courseid"=>$_REQUEST['course_id'],
                        "courseModuleid"=>$_REQUEST['module_id'],
                        "status"=>"Completed"];
        }
        else {
            $postData = ["contactid" => $contact_id,
                        "courseid"=>$_REQUEST['course_id'],
                        "courseModuleid"=>$_REQUEST['module_id'],
                        "status"=>"Pending"];
        }
        
        $url = $salesforce_data->instance_url."/services/apexrest/updatemodule/";
        $module_data = sendPostRequest($url, $postData, $salesforce_data->access_token);
        $result = json_decode($module_data);
        
        if(!empty($result)){
                echo json_encode(["st"=>1, "data" => $result]);
            } else { 
                echo json_encode(["st"=>0]);
            }
            
    }
}
?>

