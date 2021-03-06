<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['taskDetails'] = 'task';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
//$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

/*List of task start*/
$route['list-of-task'] = "dashboard/listOfTask";
/*end list of task*/
$route['piechart'] = "dashboard/piechart";
$route['task/(:any)'] = "dashboard/getTaskDetail";
$route['profileData'] = "dashboard/profileData";
$route['paymentDetail/(:any)'] = "task/paymentDetail";
$route['submitTaskDeliverable'] = "task/submitTaskDeliverable";
$route['updateSubmitTaskDeliverable'] = "task/updateSubmitTaskDeliverable";
// $route['profileData'] = "profile/profileData";

//Reset Password Route
$route['reset/(:any)'] = 'login/resetPasswordUser';
$route['profileDatasubmit'] = "dashboard/profileDatasubmit";
$route['resetPass'] = 'login/resetPass';
$route['profileImage'] = "dashboard/profileImage";
$route['submitTaskStatus'] = "task/submitTaskStatus";
$route['acceptTaskStatus'] = "task/acceptTaskStatus";
$route['rejectTaskStatus'] = "task/rejectTaskStatus";
$route['acceptDashboardStatus'] = "dashboard/acceptDashboardStatus";
$route['rejectDashboardStatus'] = "dashboard/rejectDashboardStatus";
$route['updateProfileImg'] = "dashboard/updateProfileImg";
/* End of file routes.php */
/* Location: ./application/config/routes.php */


/*Question Answer Route*/

$route['getQuestionAnswers/(:any)'] = "task/getAllQuestionAnswers";

$route['saveQuestion/(:any)/(:any)'] = "task/saveQuestionAnswersData";

// recent search
$route['recentsearch'] = "dashboard/recentsearch";
$route['search_data'] = "dashboard/search_data";
$route['update_recent_search_data'] = "dashboard/update_recent_search_data";

/*Change Request*/
$route['changeRequest'] = "task/changeRequest";
$route['updatePassword'] = "dashboard/updatePassword";


/*Apoorv EDU Portal*/
$route['login'] = "login/openLoginPage";
$route['coursedetail/(:any)'] = "course/getCourseDetail";
$route['courselogin'] = "course/UserLoginCourse";
$route['edulogout'] = 'course/logout';
$route['purchaseddetail'] = "course/purchasedCourseDetail";
$route['error'] = "course/errorPage";
$route['courseList/(:any)'] = "courseListing/Listpagination";
$route['coursemodule'] = "course/courseModule";
$route['payment-cancel'] = "course/cancelPayment";

/*jaidev edu route */
$route['registerEduUser'] = 'register/registerEduUser';
$route['invoiceDetail'] = "dashboard/invoiceDetail";
$route['myCourse'] = "MyCourse";
$route['loadCourses'] = "MyCourse/loadMyPurchasedCourses";
$route['courseList'] = "courseListing/courseList";
$route['myCourse/(:any)'] = "MyCourse/Listpagination";


/*Prateek's routes*/
$route['thank-you'] = 'login/loadThankYouPage';
$route['privacy'] = 'login/loadPrivacyPage';
$route['terms-conditions'] = 'login/loadTermsConditionPage';
$route['setUserCookies'] = 'login/setUserCookies';
$route['unsetUserCookies'] = 'login/unsetUserCookies';