<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Prateek Narayan
 * @version : 1.1
 * @since : 14 November 2019
 */
class Login extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('cias_helper');
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        //$this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $salesforce_data = $this->getAccessTokenSalesforce();
        // echo '<pre>';print_r($salesforce_data);die;
        $url = $salesforce_data->instance_url."/services/apexrest/getrecentcourselist";
       
        $data['home_detail'] = sendGetRequest($url, $salesforce_data->access_token);
        //$data['cookies_data'] = $this->input->cookie('intelligent_world_cookies',true);
        
        if(!empty($data)){
            $this->load->view('includes/header_web');
            $this->load->view('home', $data);
        }
        //$this->load->view('login');
        // $this->isLoggedIn();
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    /*function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        // var_dump($isLoggedIn);die;
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('/dashboard');
        }
    }*/
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        // $this->session->set_flashdata('error', 'Email or password mismatch');
        // $this->index();

        $email = strtolower($this->security->xss_clean($this->input->post('email')));
        $password = $this->input->post('password');
    
        $this->form_validation->set_rules($email, 'email', 'require|valid_email');
        $this->form_validation->set_rules($password, 'password', 'require');
        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('error', 'Username & Password are required fields.');
            $this->openLoginPage();
        } else if(!isset($email) || empty($email)){
             $this->session->set_flashdata('error', 'Email is required field');
            $this->openLoginPage();
        } else if(!isset($password) || empty($password)){
             $this->session->set_flashdata('error', 'Password is required field');
            $this->openLoginPage();
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

            if ($this->input->post("remember_me") == 'on' ) {
                setcookie ("loginId", $email, time()+ (86500));  
                setcookie ("loginPass", $password,  time()+ (86500));
            } else {
                setcookie ("loginId",""); 
                setcookie ("loginPass","");
            }      

            if($result->totalSize != 0){
                $userSessionArray = array(
                        'email' => $result->records[0]->Email,                    
                        'contact_id' => $result->records[0]->Id,
                        'name' => $result->records[0]->Name,
                        'userType' => $result->userType
                    );

                    $this->session->set_userdata($userSessionArray);
                    
                    if($result->userType == 'EduUser'){
                        redirect('/myCourse');   
                    } else {
                        redirect('/dashboard');
                    }
            } else {    
                $this->session->set_flashdata('error', 'Username or password mismatch');
                $this->openLoginPage();
            }
        }
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $email = strtolower($this->security->xss_clean($_REQUEST['email']));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if($this->form_validation->run() === FALSE) {
            echo json_encode(['st' => 403, "validation_error" => validation_errors()]);
        } else {
            $salesforce_data = $this->getAccessTokenSalesforce();
            $url = $salesforce_data->instance_url.'/services/apexrest/forgotUserPassword?user_email='.$email;
            $result = sendGetRequest($url, $salesforce_data->access_token);
            // echo"<pre>";print_r($result); die;

            if($result->response->status != 'Failure'){
                echo json_encode(["st"=>1, "msg" => "Reset password email sent successfully"]);
            } else { 
                echo json_encode(["st"=>0, "msg" => "User with this email does not exist!"]);
            }
        }
    }

    /**
    * This function used to load reset password view
    */
    public function resetPasswordUser(){
        $this->load->view('reset');
    }


    // reset password
    
    /*Home Page*/
    
    public function openLoginPage(){
        $this->load->view('includes/header_web');
        $this->load->view('login');
        $this->load->view('includes/footer_web');
    }
    

    public function resetPass(){

        $email = strtolower($this->security->xss_clean($this->input->post('email')));
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        $currenturl = $_SERVER['HTTP_REFERER']; 
        $con_id = explode("/", $currenturl);
        $contact_id = $con_id[4];
        
        $this->form_validation->set_rules($email, 'Email', 'require');
        $this->form_validation->set_rules($password, 'Password', 'require');
        $this->form_validation->set_rules($password, 'Confirm Password', 'require');

        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('error', 'Email & Password are required fields.');
            redirect('/reset/'.$contact_id);
        } elseif ( $password != $repassword) {
            $this->session->set_flashdata('error', 'Password & Confirm Password are Mismatch.');
            redirect('/reset/'.$contact_id);
        } else {
          
           $salesforce_data = $this->getAccessTokenSalesforce();
           $url = $salesforce_data->instance_url.'/services/apexrest/ResetUserPassword?user_email='.$email.'&Id='.$contact_id.'&password='.$password;
           $result = sendGetRequest($url, $salesforce_data->access_token);

           if($result->response->status =='Failure'){
                $this->session->set_flashdata('error', 'Email Does not exist');
                redirect('/reset/'.$contact_id);
              } else { 
                echo "<script language='javascript' type='text/javascript'>alert('Password Change successfully');</script>"; 
                $this->index();
            }

        }

    }
    
    public function loadThankYouPage(){
        $this->global['pageTitle'] = 'Thank You : Intelligent World';
        $this->loadViewsWeb("thank_you", $this->global, NULL , NULL);
    }
    
    public function loadPrivacyPage(){
        $this->global['pageTitle'] = 'Privacy Policy : Intelligent World';
        $this->loadViewsWeb("privacy", $this->global, NULL , NULL);
    }
    
    public function loadTermsConditionPage(){
        $this->global['pageTitle'] = 'Terms & Conditions : Intelligent World';
        $this->loadViewsWeb("terms_conditions", $this->global, NULL , NULL);
    }
    
    public function setUserCookies(){
        $cookie= array(
            'name'   => 'intelligent_world_cookies',
            'value'  => '1',                            
            'expire' => '2592000',                                                                                   
            'secure' => TRUE
        );

       $this->input->set_cookie($cookie);
       
       $data = $this->input->cookie('intelligent_world_cookies',true);
       echo json_encode(['st' => 1, 'msg' => 'Cookies Enabled']);
    }
    
    public function unsetUserCookies(){
        $data = $this->input->cookie('intelligent_world_cookies',true);
        if($data == 1){
           delete_cookie('intelligent_world_cookies');
        }
        echo json_encode(['st' => 1, 'msg' => 'Cookies Deleted']);
    }
}

?>