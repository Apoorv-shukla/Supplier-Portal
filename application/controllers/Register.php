<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Register (RegisterController)
  * @author : Jaidev Parida
 * @version : 1.1
 * @since : 27 March 2020
 */
class Register extends BaseController
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
        $this->load->view('includes/header_web');
        $this->load->view('register');
        $this->load->view('includes/footer_web');
    }

    

    public function registerEduUser() {

        

        $firstName = $this->security->xss_clean($_REQUEST['firstName']);
        $lastName = $this->security->xss_clean($_REQUEST['lastName']);
        $company = $this->security->xss_clean($_REQUEST['company']);
        $userName = $this->security->xss_clean($_REQUEST['userName']);
        $phoneNumber = $this->security->xss_clean($_REQUEST['phoneNumber']);
        $about = $this->security->xss_clean($_REQUEST['about']);
        $password = $this->security->xss_clean($_REQUEST['password']);

        

        $data =  ["FirstName"=>$firstName,"LastName"=>$lastName,"Email"=>$userName,"Company"=>$company,"Phone"=>$phoneNumber,"About"=>$about,"password"=>$password];
        // echo "<pre>";print_r($data);
        $salesforce_data = $this->getAccessTokenSalesforce();
        // echo $salesforce_data;
        $url = $salesforce_data->instance_url."/services/apexrest/updatecontact/";
        
        $registerUserData = sendPostRequest($url, $data, $salesforce_data->access_token);
        $result = json_decode($registerUserData);
        // echo "<pre>";print_r($result->message);
        if(!empty($registerUserData)){

            if($result->message == 'Email Already Exists!'){
              echo json_encode(["st"=>409]);
            }else if ($result->message == 'Contact inserted successfully'){
               echo json_encode(["st"=>200]);
            }
           

        } else { 
            echo json_encode(["st"=>0]);
            }
       
    }
    
    
}

?>
