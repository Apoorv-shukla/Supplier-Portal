<!doctype html>
<html>
<head>
<meta charset="utf-8">
	
<title>Home - Intelligent World</title>

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="Stylesheet" />-->
	<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">-->
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet" />-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/jquery-ui.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/stylesheet.css"/>
	<!--<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />-->
 <!--   <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />-->


	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
	<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>-->
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>-->
	<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>-->
	
	    <script src="<?php echo base_url(); ?>assets/dist/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/profile.js"></script>
<style >
   
</style>
</head>
<body class="bg_white">
 <!--cookie-->
	<div class="cookie" style="display:none;">
		<div class="container ">
			<div class="row">
				<div class="col-12 col-sm-8 col-md-8">
					<p>This website uses cookies to improve user experience. Do you agree to the use of all cookies in accordance with our Cookie Policy?</p>
				</div>
				<div class="col-12 col-sm-4 col-md-4">
					<button class="cookie_btn" id="accept_cookie"> I Agree</button>
					<button class="cookie_btn" id="decline_cookie"> I Disagree</button>
				</div>
			</div>
		</div>
	</div>
	<div class="setting_btn">
		<button><i class="fa fa-cog" aria-hidden="true"></i> Cookie Setting</button>
	</div>
 <!--cookie end-->
<!-- header -->
<div class="sticky-top ">
	<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white bx-shdw">
				<div class="container static_header">
			      <a class="navbar-brand" href="<?php echo base_url(); ?>">
			      	<img src="<?php echo base_url(); ?>assets/images/logo.png">
			      </a>
			      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			        <span class="navbar-toggler-icon"></span>
			      </button>
			      <div class="collapse navbar-collapse" id="navbarNav">
			      </div>
			      <?php
				$salesforce_data= $this->session->userdata();
				if ($this->session->userdata('contact_id') != ''){
				?>
					<div class="col-12 col-sm-4 col-lg-4 user text-right">
						<div class="user_login">
							<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="profileImage()"><img src="<?php echo base_url(); ?>assets/images/user.jpg"/><?php echo $this->session->userdata('name'); ?></a>
							<div class="dropdown-menu">
								<a data-toggle="modal" data-target="#profile" class="forgot" href="javascript:;" onclick="profileData()"><i class="fa fa-user-circle"></i> Profile</a>
								<a data-toggle="modal" data-target="#changePasswordModal"  href="javascript:;" ><i class="fa fa-unlock-alt"></i> Change Password</a>
								<a href="<?php echo base_url(); ?>edulogout" class=""><i class="fa fa-sign-out"></i> Sign out</a>
							</div>
						</div>
					</div>
				<?php } ?>
			    </div>
			</nav>
	</header>
	 <!--Navigation Menu Bar Starts-->
        <nav class="task_tab">
        <div class="container">
        	<div class="row">
        		<div class="col-sm-12 col-12 col-lg-12 col-xl-12">
        			<ul class="nav nav-tabs" style="border:none;justify-content: center">
        				<!--<li class="hamburger">
        					<a href="<?php echo base_url(); ?>">
        						<i class="fa fa-bars" aria-hidden="true"></i>
        					</a>
        				</li>-->
        				
        				<?php
        				    $salesforce_data= $this->session->userdata();
                            if ($this->session->userdata('contact_id') == ''){
                                 $home_url = $_SERVER['REQUEST_URI'];
                                 $live_url = explode('/',$_SERVER['REQUEST_URI']);
                                 
                                ?>
                                <?php if($home_url=='/') { ?>
                                    <li><a href="<?php echo base_url(); ?>" class="nav-link active"><i class="fa fa-home home_ic"></i></a></li>
                                    <?php } else { ?>
                                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home home_ic"></i></a></li>
                                <?php } ?>
                                <?php if($live_url[1]=='courseListing') { ?>
            						<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link active">Courses</a></li>
            					<?php } else { ?>
            					<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link">Courses</a></li>
            					<?php } ?>
            					<?php if($live_url[1]=='login') { ?>
            						<li><a  href="<?php echo base_url(); ?>login" class="nav-link active">Login</a></li>
            					<?php } else { ?>
            					<li><a  href="<?php echo base_url(); ?>login" class="nav-link">Login</a></li>
            					<?php } ?>
            					<?php if($live_url[1]=='register') { ?>
            						<li><a  href="<?php echo base_url(); ?>register" class="nav-link active">Register</a></li>
            					<?php } else { ?>
            					<li><a  href="<?php echo base_url(); ?>register" class="nav-link">Register</a></li>
            					<?php } ?>
                                <?php
                            }
        				?>
        				
        				<?php if($this->session->userdata('userType') == 'Supplier'){
                            $home_url = $_SERVER['REQUEST_URI'];
                            $live_url = explode('/',$_SERVER['REQUEST_URI']);
        					?>
                                <?php if($home_url=='/') { ?>
                                    <li><a href="<?php echo base_url(); ?>" class="nav-link active"><i class="fa fa-home home_ic"></i></a></li>
                                    <?php } else { ?>
                                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home home_ic"></i></a></li>
                                <?php } ?>

        						<?php if($live_url[1]=='dashboard') { ?>
                                <li><a href="<?php echo base_url(); ?>dashboard" class="nav-link active">Tasks</a></li>
                                <?php } else { ?>
                                <li><a href="<?php echo base_url(); ?>dashboard" class="nav-link">Tasks</a></li>
                                <?php } ?>

                                <?php if($live_url[1]=='courseListing') { ?>
                                    <li><a href="<?php echo base_url(); ?>courseListing" class="nav-link active">Courses</a></li>
                                <?php } else { ?>
                                <li><a href="<?php echo base_url(); ?>courseListing" class="nav-link">Courses</a></li>
                                <?php } ?>

                                

        					<?php
        				}?>
        				<?php if($this->session->userdata('userType') == 'EduUser'){
        				    $home_url = $_SERVER['REQUEST_URI'];
                            $live_url = explode('/',$_SERVER['REQUEST_URI']);
        					?>
        						<?php if($home_url=='/') { ?>
                                    <li><a href="<?php echo base_url(); ?>" class="nav-link active"><i class="fa fa-home home_ic"></i></a></li>
                                    <?php } else { ?>
                                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home home_ic"></i></a></li>
                                <?php } ?>
                                <?php if($live_url[1]=='courseListing') { ?>
            						<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link active">Courses</a></li>
            					<?php } else { ?>
            					<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link">Courses</a></li>
            					<?php } ?>	
        						<?php if($live_url[1]=='myCourse') { ?>
        						<li><a href="<?php echo base_url(); ?>myCourse" class="nav-link active">My Courses</a></li>
        						<?php } else { ?>
        						<li><a href="<?php echo base_url(); ?>myCourse" class="nav-link">My Courses</a></li>
        						<?php } ?>
        						
        							
        					<?php
        				}?>
        				<?php if($this->session->userdata('userType') == 'Merge'){
        				    $home_url = $_SERVER['REQUEST_URI'];
                            $live_url = explode('/',$_SERVER['REQUEST_URI']);
        					?>
        						<?php if($home_url=='/') { ?>
                                    <li><a href="<?php echo base_url(); ?>" class="nav-link active"><i class="fa fa-home home_ic"></i></a></li>
                                    <?php } else { ?>
                                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home home_ic"></i></a></li>
                                <?php } ?>
        						<?php if($live_url[1]=='dashboard') { ?>
        						<li><a href="<?php echo base_url(); ?>dashboard" class="nav-link active">Tasks</a></li>
        						<?php } else { ?>
        						<li><a href="<?php echo base_url(); ?>dashboard" class="nav-link">Tasks</a></li>
        						<?php } ?>
        						<?php if($live_url[1]=='courseListing') { ?>
            						<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link active">Courses</a></li>
            					<?php } else { ?>
            					<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link">Courses</a></li>
            					<?php } ?>	
        						<?php if($live_url[1]=='myCourse') { ?>
        						<li><a href="<?php echo base_url(); ?>myCourse" class="nav-link active">My Courses</a></li>
        						<?php } else { ?>
        						<li><a href="<?php echo base_url(); ?>myCourse" class="nav-link">My Courses</a></li>
        						<?php } ?>
        					
        					<?php
        				}?>
        			</ul>
        		</div>
        	</div>
        </div>
        </nav>
        </div>
        <!--Navigation Menu Bar Ends-->
        
        <!-- Modal -->
        <div class="modal fade profile" id="changePasswordModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered profile_modal" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <img src="<?php echo base_url(); ?>assets/images/logo.png">
                        <button type="button" style="margin: 0rem 0rem 0rem 0rem !important;" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal_title">
                        <h4>Change Password</h4>
                    </div>
                    <div class="modal-body">
                        <div id="updatePassword_MESS"></div>
                        <form method="post" id="change_passd">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">New Password:</label>
                                <input type="password" class="form-control" id="password_one">
                                <span id="password_oneError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Confirm Password:</label>
                                <input type="password" class="form-control" id="password_two">
                                <span id="password_twoError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn edit_profile btn" id="update_pass" type="button">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- profile Modal -->
        <div class="modal fade profile" id="profile" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered profile_modal  main" role="document">
                <div class="modal-content">
                    <div class="profile_outer">
                        <span class="profile_loader"></span>
                    </div>
                    <div class="modal-header text-center">
                        <img src="<?php echo base_url(); ?>assets/images/logo.png">
                        <button type="button" style="margin: 0rem 0rem 0rem 0rem !important;" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal_title">
                        <h4>My Profile</h4>
                    </div>
                    <?php if($salesforce_data['userType'] === 'EduUser'){?>
                    <div class="modal-body">
                    <div role="tabpanel">
                    <div class="row">
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile_modal_tabs" role="tablist">
                    <li role="presentation" class="active">
                    <a href="#Profiletb" aria-controls="Profiletb" role="tab" class="active" data-toggle="tab"><i class="fa fa-user"></i>Profile</a>
                    
                    </li>
                    <li role="presentation"><a href="#Invoicetb" aria-controls="Invoicetb" role="tab" data-toggle="tab" onclick="invoiceDetail()"><i class="fa fa-file-o"></i>Invoice</a>
                    
                    </li>
                    </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="Profiletb">
                    
                    
                    <div class="row">
                    <p id="success_profile"></p>
                    
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                     
                    <img id="imagedata" class="user_img">
                    <div class="glyphicon glyphicon-pencil">
                        <label for="profile_img" class="edit_img">
                           <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </label>
                        <input type="file" name="profile_img" id="profile_img">
                    </div> 
                    <p id="msg_image_status"></p>
                    <button type="button" class="change_img btn" id="update_profile_img" >Save</button>
                    
                    </div>
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <input type="hidden" value = "<?php echo $salesforce_data['userType']; ?>" id="session_value">
                    <form method="post" id="profileEdit">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Name</label>
                                    <!--<p class="output" id="name"></p>-->
                                    <input type="hidden" class="inp form-control"  name="name" id="nameE" readonly="true">
                                     <p id="name"></p>
                                </div>
                                
                                 
                              <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Company Name</label>
                                    <p class="output" id="company"></p>
                                    <input type="text" name="company" class="inp form-control" id="companyE">
                                    <span id="companyerror" style="color:red;"></span>
                                </div>
                            
                           
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Account Name</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="" id="account_name"></p>
                                    <<input type="text" name="acc_name" class="inp form-control" id="account_nameE">
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Email</label>
                    
                                    <p id="email"></p>
                                    <!-- <input type="text"  class="inp form-control" id="emailE" disabled="disabled"> -->
                    
                    
                                </div>
                    
                                  
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Communication Language</label>
                                    <p class="output" id="comm"></p>
                                    <select name="comm_lan" class="inp form-control" id="commE">
                                        <option value="English">English</option>
                                        <option value="Dutch">Dutch</option>
                                        <option value="German">German</option>
                                        <option value="French">French</option>
                                    </select>
                                    <!-- <input type="text" name="comm_lan" class="inp form-control" id="commE"> -->
                                    <span id="commEerror" style="color:red;"></span>
                                </div>
                    
                            
                                <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                </div> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Phone</label>
                                    <p class="output" id="phone"></p>
                                    <input type="text" name="phone" class="inp form-control" id="phoneE">
                                    <span id="phoneEerror" style="color:red;"></span>
                                </div>
                    
                                 
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mobile</label>
                                    <p class="output" id="mobile"></p>
                                    <input type="text" name="mobile" class="inp form-control" id="mobileE">
                                    <span id="mobileEerror" style="color:red;"></span>
                                </div>
                            
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light" >Mobile</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="mobile"></p>
                                    <input type="text" name="mobile" class="inp form-control" id="mobileE">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Linkedin URL</label>
                                    <p class="output" id="l_url"></p>
                                    <input type="text" name="linked_url" class="inp form-control" id="l_urlE">
                                    <span id="l_urlEerror" style="color:red;"></span>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Twitter Name</label>
                                    <p class="output"  id="t_url"></p>
                                    <input type="text" name="twitter_url" class="inp form-control" id="t_urlE">
                                    <span id="t_urlEerror" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Twitter URL</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output"  id="t_url"></p>
                                    <input type="text" name="twitter_url" class="inp form-control" id="t_urlE">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Street</label>
                                    <p class="output" id="m_address_street"></p>
                                    <input type="text" name="m_address_street" class="inp form-control" id="m_addressE_street">
                                    <span id="m_addressE_streeterror" style="color:red;"></span>
                                </div>
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address City</label>
                                    <p class="output" id="m_address_city"></p>
                                    <input type="text" name="m_address_city" class="inp form-control" id="m_addressE_city">
                                    <span id="m_addressE_cityerror" style="color:red;"></span>
                                </div>
                    
                            </div>
                        </div>  
                       
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Mailing Address Street</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="m_address_street"></p>
                                    <input type="text" name="m_address_street" class="inp form-control" id="m_addressE_street">
                                </div>
                            </div>
                        </div> -->
                    
                         
                        <div class="form-group">
                            <div class="row">
                                <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address City</label>
                                    <p class="output" id="m_address_city"></p>
                                    <input type="text" name="m_address_city" class="inp form-control" id="m_addressE_city">
                                </div> -->
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address State</label>
                                    <p class="output" id="m_address_state"></p>
                                    <input type="text" name="m_address_state" class="inp form-control" id="m_addressE_state">
                                    <span id="m_addressE_stateerror" style="color:red;"></span>
                                </div>
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Country</label>
                                    <p class="output" id="m_address_country"></p>
                                    <input type="text" name="m_address_country" class="inp form-control" id="m_addressE_country">
                                    <span id="m_addressE_countryerror" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Mailing Address State</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="m_address_state"></p>
                                    <input type="text" name="m_address_state" class="inp form-control" id="m_addressE_state">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Postal Code</label>
                                    <p class="output" id="m_address_code"></p>
                                    <input type="text" name="m_address_code" class="inp form-control" id="m_addressE_code">
                                    <span id="m_addressE_codeerror" style="color:red;"></span>
                                </div>
                                
                    
                    
                                  
                                 <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">About Us</label>
                                    <p class="output" id="about"></p>
                                    <input type="text" name="about" class="inp form-control" id="aboutE">
                                    <span id="abouterror" style="color:red;"></span>
                                </div>
                    
                           
                            </div>
                        </div>
                    
                       
                    
                         <div class="form-group">
                           
                          </div>
                        
                        
                    
                         
                    
                        
                    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                                    <button class="edit_profile btn" type="button" id="edit" onclick="profileEdit()">Edit</button>
                                    <button class="edit_profile btn" type="button"  name="submit" id="profile_data">Update</button>
                                </div>
                            </div>
                        </div>
                    
                    
                    
                    </form>
                    </div>
                    </div>
                    
                    
                    
                    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Invoicetb">
                    <div id="invoiceData"></div>
                    
                    
                    
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    
                    
                    </div>
                    
                    <?php } else if($salesforce_data['userType'] === 'Supplier'){?>
                    <div class="modal-body">
                    <div class="row">
                    <p id="success_profile"></p>
                    
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                     
                    <img id="imagedata" class="user_img">
                    <div class="glyphicon glyphicon-pencil">
                        <label for="profile_img" class="edit_img">
                           <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </label>
                        <input type="file" name="profile_img" id="profile_img">
                    </div> 
                    <p id="msg_image_status"></p>
                    <button type="button" class="change_img btn" id="update_profile_img" >Save</button>
                    
                    </div>
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <input type="hidden" value = "<?php echo $salesforce_data['userType']; ?>" id="session_value">
                    <form method="post" id="profileEdit">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Name</label>
                                    <!--<p class="output" id="name"></p>-->
                                    <input type="hidden" class="inp form-control"  name="name" id="nameE" readonly="true">
                                     <p id="name"></p>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Account Name</label>
                                    <!--<p class="output" id="account_name"></p>-->
                                    <input type="hidden" name="acc_name" disabled="disabled" class="inp form-control" id="account_nameE">
                                     <p id="account_name"></p>
                                </div>
                           
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Account Name</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="" id="account_name"></p>
                                    <<input type="text" name="acc_name" class="inp form-control" id="account_nameE">
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Email</label>
                    
                                    <p id="email"></p>
                                    <!-- <input type="text"  class="inp form-control" id="emailE" disabled="disabled"> -->
                    
                    
                                </div>
                    
                                  
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Communication Language</label>
                                    <p class="output" id="comm"></p>
                                    <select name="comm_lan" class="inp form-control" id="commE">
                                        <option value="English">English</option>
                                        <option value="Dutch">Dutch</option>
                                        <option value="German">German</option>
                                        <option value="French">French</option>
                                    </select>
                                    <!-- <input type="text" name="comm_lan" class="inp form-control" id="commE"> -->
                                    <span id="commEerror" style="color:red;"></span>
                                </div>
                    
                            
                                <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                </div> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Phone</label>
                                    <p class="output" id="phone"></p>
                                    <input type="text" name="phone" class="inp form-control" id="phoneE">
                                    <span id="phoneEerror" style="color:red;"></span>
                                </div>
                    
                                 
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mobile</label>
                                    <p class="output" id="mobile"></p>
                                    <input type="text" name="mobile" class="inp form-control" id="mobileE">
                                    <span id="mobileEerror" style="color:red;"></span>
                                </div>
                            
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light" >Mobile</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="mobile"></p>
                                    <input type="text" name="mobile" class="inp form-control" id="mobileE">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Linkedin URL</label>
                                    <p class="output" id="l_url"></p>
                                    <input type="text" name="linked_url" class="inp form-control" id="l_urlE">
                                    <span id="l_urlEerror" style="color:red;"></span>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Twitter Name</label>
                                    <p class="output"  id="t_url"></p>
                                    <input type="text" name="twitter_url" class="inp form-control" id="t_urlE">
                                    <span id="t_urlEerror" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Twitter URL</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output"  id="t_url"></p>
                                    <input type="text" name="twitter_url" class="inp form-control" id="t_urlE">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Street</label>
                                    <p class="output" id="m_address_street"></p>
                                    <input type="text" name="m_address_street" class="inp form-control" id="m_addressE_street">
                                    <span id="m_addressE_streeterror" style="color:red;"></span>
                                </div>
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address City</label>
                                    <p class="output" id="m_address_city"></p>
                                    <input type="text" name="m_address_city" class="inp form-control" id="m_addressE_city">
                                    <span id="m_addressE_cityerror" style="color:red;"></span>
                                </div>
                    
                            </div>
                        </div>  
                       
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Mailing Address Street</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="m_address_street"></p>
                                    <input type="text" name="m_address_street" class="inp form-control" id="m_addressE_street">
                                </div>
                            </div>
                        </div> -->
                    
                         
                        <div class="form-group">
                            <div class="row">
                                <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address City</label>
                                    <p class="output" id="m_address_city"></p>
                                    <input type="text" name="m_address_city" class="inp form-control" id="m_addressE_city">
                                </div> -->
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address State</label>
                                    <p class="output" id="m_address_state"></p>
                                    <input type="text" name="m_address_state" class="inp form-control" id="m_addressE_state">
                                    <span id="m_addressE_stateerror" style="color:red;"></span>
                                </div>
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Country</label>
                                    <p class="output" id="m_address_country"></p>
                                    <input type="text" name="m_address_country" class="inp form-control" id="m_addressE_country">
                                    <span id="m_addressE_countryerror" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Mailing Address State</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="m_address_state"></p>
                                    <input type="text" name="m_address_state" class="inp form-control" id="m_addressE_state">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Postal Code</label>
                                    <p class="output" id="m_address_code"></p>
                                    <input type="text" name="m_address_code" class="inp form-control" id="m_addressE_code">
                                    <span id="m_addressE_codeerror" style="color:red;"></span>
                                </div>
                           
                            </div>
                        </div>
                    
                    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                                    <button class="edit_profile btn" type="button" id="edit" onclick="profileEdit()">Edit</button>
                                    <button class="edit_profile btn" type="button"  name="submit" id="profile_data">Update</button>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Mailing Address Postal Code</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                                    <button class="edit_profile btn" type="button" id="edit" onclick="profileEdit()">Edit</button>
                                     <button class="edit_profile btn" type="button"  name="submit" id="profile_data">Update</button>
                                </div>
                            </div>
                        </div> -->
                    </form>
                    </div>
                    </div>
                    </div>
                    
                    
                    <?php } else if($salesforce_data['userType'] === 'Merge'){?>
                    
                    <div class="modal-body">
                    
                    
                    <div role="tabpanel">
                    <div class="row">
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile_modal_tabs" role="tablist">
                    <li role="presentation" class="active">
                    <a href="#Profiletb" aria-controls="Profiletb" role="tab" class="active" data-toggle="tab"><i class="fa fa-user"></i>Profile</a>
                    
                    </li>
                    <li role="presentation"><a href="#Invoicetb" aria-controls="Invoicetb" role="tab" data-toggle="tab" onclick="invoiceDetail()"><i class="fa fa-file-o"></i>Invoice</a>
                    
                    </li>
                    </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="Profiletb">
                    
                    
                    <div class="row">
                    <p id="success_profile"></p>
                    
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                     
                    <img id="imagedata" class="user_img">
                    <div class="glyphicon glyphicon-pencil">
                        <label for="profile_img" class="edit_img">
                           <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </label>
                        <input type="file" name="profile_img" id="profile_img">
                    </div> 
                    <p id="msg_image_status"></p>
                    <button type="button" class="change_img btn" id="update_profile_img" >Save</button>
                    
                    </div>
                    
                    
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <input type="hidden" value = "<?php echo $salesforce_data['userType']; ?>" id="session_value">
                    <form method="post" id="profileEdit">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Name</label>
                                    <!--<p class="output" id="name"></p>-->
                                    <input type="hidden" class="inp form-control"  name="name" id="nameE" readonly="true">
                                     <p id="name"></p>
                                </div>
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Account Name</label>
                                    <!--<p class="output" id="account_name"></p>-->
                                    <input type="hidden" name="acc_name" disabled="disabled" class="inp form-control" id="account_nameE">
                                     <p id="account_name"></p>
                                </div>
                           
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Account Name</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="" id="account_name"></p>
                                    <<input type="text" name="acc_name" class="inp form-control" id="account_nameE">
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Email</label>
                    
                                    <p id="email"></p>
                                    <!-- <input type="text"  class="inp form-control" id="emailE" disabled="disabled"> -->
                    
                    
                                </div>
                    
                                  
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Communication Language</label>
                                    <p class="output" id="comm"></p>
                                    <select name="comm_lan" class="inp form-control" id="commE">
                                        <option value="English">English</option>
                                        <option value="Dutch">Dutch</option>
                                        <option value="German">German</option>
                                        <option value="French">French</option>
                                    </select>
                                    <!-- <input type="text" name="comm_lan" class="inp form-control" id="commE"> -->
                                    <span id="commEerror" style="color:red;"></span>
                                </div>
                    
                            
                                <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                </div> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Phone</label>
                                    <p class="output" id="phone"></p>
                                    <input type="text" name="phone" class="inp form-control" id="phoneE">
                                    <span id="phoneEerror" style="color:red;"></span>
                                </div>
                    
                                 
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mobile</label>
                                    <p class="output" id="mobile"></p>
                                    <input type="text" name="mobile" class="inp form-control" id="mobileE">
                                    <span id="mobileEerror" style="color:red;"></span>
                                </div>
                            
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light" >Mobile</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="mobile"></p>
                                    <input type="text" name="mobile" class="inp form-control" id="mobileE">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Linkedin URL</label>
                                    <p class="output" id="l_url"></p>
                                    <input type="text" name="linked_url" class="inp form-control" id="l_urlE">
                                    <span id="l_urlEerror" style="color:red;"></span>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Twitter Name</label>
                                    <p class="output"  id="t_url"></p>
                                    <input type="text" name="twitter_url" class="inp form-control" id="t_urlE">
                                    <span id="t_urlEerror" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Twitter URL</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output"  id="t_url"></p>
                                    <input type="text" name="twitter_url" class="inp form-control" id="t_urlE">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Street</label>
                                    <p class="output" id="m_address_street"></p>
                                    <input type="text" name="m_address_street" class="inp form-control" id="m_addressE_street">
                                    <span id="m_addressE_streeterror" style="color:red;"></span>
                                </div>
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address City</label>
                                    <p class="output" id="m_address_city"></p>
                                    <input type="text" name="m_address_city" class="inp form-control" id="m_addressE_city">
                                    <span id="m_addressE_cityerror" style="color:red;"></span>
                                </div>
                    
                            </div>
                        </div>  
                       
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Mailing Address Street</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="m_address_street"></p>
                                    <input type="text" name="m_address_street" class="inp form-control" id="m_addressE_street">
                                </div>
                            </div>
                        </div> -->
                    
                         
                        <div class="form-group">
                            <div class="row">
                                <!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address City</label>
                                    <p class="output" id="m_address_city"></p>
                                    <input type="text" name="m_address_city" class="inp form-control" id="m_addressE_city">
                                </div> -->
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address State</label>
                                    <p class="output" id="m_address_state"></p>
                                    <input type="text" name="m_address_state" class="inp form-control" id="m_addressE_state">
                                    <span id="m_addressE_stateerror" style="color:red;"></span>
                                </div>
                    
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Country</label>
                                    <p class="output" id="m_address_country"></p>
                                    <input type="text" name="m_address_country" class="inp form-control" id="m_addressE_country">
                                    <span id="m_addressE_countryerror" style="color:red;"></span>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Mailing Address State</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                    <p class="output" id="m_address_state"></p>
                                    <input type="text" name="m_address_state" class="inp form-control" id="m_addressE_state">
                                </div>
                            </div>
                        </div> -->
                         
                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Mailing Address Postal Code</label>
                                    <p class="output" id="m_address_code"></p>
                                    <input type="text" name="m_address_code" class="inp form-control" id="m_addressE_code">
                                    <span id="m_addressE_codeerror" style="color:red;"></span>
                                </div>
                                
                    
                    
                                  
                                 <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">About Us</label>
                                    <p class="output" id="about"></p>
                                    <input type="text" name="about" class="inp form-control" id="aboutE">
                                    <span id="abouterror" style="color:red;"></span>
                                </div>
                    
                           
                            </div>
                        </div>
                    
                       
                    
                         <div class="form-group">
                            <div class="row">
                              <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <label class="light">Company Name</label>
                                    <p class="output" id="company"></p>
                                    <input type="text" name="company" class="inp form-control" id="companyE">
                                    <span id="companyerror" style="color:red;"></span>
                                </div>
                            </div>
                          </div>
                        
                        
                    
                         
                    
                        
                    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                                    <button class="edit_profile btn" type="button" id="edit" onclick="profileEdit()">Edit</button>
                                    <button class="edit_profile btn" type="button"  name="submit" id="profile_data">Update</button>
                                </div>
                            </div>
                        </div>
                    
                    
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4">
                                    <label class="light">Mailing Address Postal Code</label>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-8">
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-right">
                                    <button class="edit_profile btn" type="button" id="edit" onclick="profileEdit()">Edit</button>
                                     <button class="edit_profile btn" type="button"  name="submit" id="profile_data">Update</button>
                                </div>
                            </div>
                        </div> -->
                    </form>
                    </div>
                    </div>
                    
                    
                    
                    
                    </div>
                    <div role="tabpanel" class="tab-pane" id="Invoicetb">
                    <div id="invoiceData"></div>
                    
                    
                    
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    
                    
                    </div>
                    
                    <?php }?>
                </div>
            </div>
        </div>  
      <!-- profile Modal ends-->