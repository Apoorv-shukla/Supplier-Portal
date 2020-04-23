<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Register (RegisterController)
  * @author : Prateek Narayan
 * @version : 1.1
 * @since : 27 March 2020
 */
class MyCourse extends BaseController
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
        $this->global['pageTitle'] = 'Intelligent World : My Courses';
        $this->loadViews('myCourse', $this->global, NULL , NULL);
    }
    
    public function loadMyPurchasedCourses(){
        $limit =3;
        $record_index=0;
        $salesforce_data = $this->getAccessTokenSalesforce();
        $contact_id =  $this->session->userdata('contact_id');
        
        $url = $salesforce_data->instance_url.'/services/apexrest/getmycourses?contactid='.$contact_id.'&limit='.$limit.'&offset='.$record_index;
        https://cs102.salesforce.com/services/apexrest/getmycourses?contactid=0031j00000PpcusAAB&limit=10&offset=0
        // echo $url; 
        // die;
        $result = sendGetRequest($url, $salesforce_data->access_token);
        
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
    
    public function Listpagination(){
        $arr = explode('/',$_SERVER['REQUEST_URI']);
        $limit = 3;
        $page = $arr[2];
        if (isset($page)) 
        { $page  = $page; } 
        else 
       { $page=1;  };  
        $record_index= ($page-1) * $limit; 
         $contact_id =  $this->session->userdata('contact_id');
        $salesforce_data = $this->getAccessTokenSalesforce();
        $url = $salesforce_data->instance_url.'/services/apexrest/getmycourses?contactid='.$contact_id.'&limit='.$limit.'&offset='.$record_index;
        $result = sendGetRequest($url, $salesforce_data->access_token);
            if(!empty($result)){
                echo json_encode(["st"=>1,"result"=>$result, "page"=>$page]);

            } else { 
                echo json_encode(["st"=>0]);
             }
    }
}

?>
