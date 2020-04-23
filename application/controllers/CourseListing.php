<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Register (RegisterController)
  * @author : Jaidev Parida
 * @version : 1.1
 * @since : 27 March 2020
 */
class CourseListing extends BaseController
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
        $this->global['pageTitle'] = 'Course List : Intelligent World';
        $this->load->view('includes/header_web');
        $this->loadViewsWeb("courseListing", $this->global, NULL , NULL);

    }

    

 

         public function courseList(){
        //$task_id = $this->uri->segment(2);
        // $email = $this->session->userdata('email');
        $limit =3;
        $record_index=0;
        $salesforce_data = $this->getAccessTokenSalesforce();
        $url = $salesforce_data->instance_url.'/services/apexrest/getcourselist?limit='.$limit.'&offset='.$record_index;
        //echo $url; die;
       // $url = $salesforce_data->instance_url."/services/apexrest/getcourselist";
        
         $result = sendGetRequest($url, $salesforce_data->access_token);
              
            if(!empty($result)){
                echo json_encode(["st"=>1,"result"=>$result]);

            } else { 
                echo json_encode(["st"=>0]);
             }
        }
        
        
    public function Listpagination(){
        $arr = explode('/',$_SERVER['REQUEST_URI']);
        $limit = 3;
        $page = $arr[2];
        if (isset($page)) 
        { $page  = $page; } 
        else 
       { $page=1;  };  
        $record_index= ($page-1) * $limit; 
        
        $salesforce_data = $this->getAccessTokenSalesforce();
        $url = $salesforce_data->instance_url.'/services/apexrest/getcourselist?limit='.$limit.'&offset='.$record_index;
        $result = sendGetRequest($url, $salesforce_data->access_token);
            if(!empty($result)){
                echo json_encode(["st"=>1,"result"=>$result, "page"=>$page]);

            } else { 
                echo json_encode(["st"=>0]);
             }
        }
        
    }
?>
