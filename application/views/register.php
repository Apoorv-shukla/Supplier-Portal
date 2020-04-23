

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	
<title>Register - Intelligent World</title>

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<!-- <link rel="stylesheet" href="css/jquery-ui.css"> -->
	<!-- <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/skitter.css"> -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="Stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/stylesheet.css">


	<!-- <script src="js/jquery.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- <script src="js/script.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.skitter.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	 -->


</head>
<body>

<!-- header -->

	<!-- register body -->

	<section>

		<div class="register_outer">
                    <span class="register_loader"></span>
                </div>
		<div class="container">
			<div class="row reg_row">
				<div class="col-12 col-sm-12 col-md-3 col-lg-3 side">	
					<div class="">
						<img src="<?php echo base_url(); ?>assets/images/reg.png" style="width: 50%">
						<h2>
							Register <br/>Here
						</h2>
						<p>
							
						</p>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-9 col-lg-9 form_div">
					 <span id="main_error" style="color:red;"></span>
					<form class="register_form" method="post" id="register_form">
					  	<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="inputEmail4">First Name</label>
						      <input type="text" class="form-control" id="firstName" placeholder="First Name"
						      name="firstName" >
						       <span id="firstNameerror" style="color:red;"></span>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="inputPassword4">Last Name</label>
						      <input type="text" class="form-control" id="lastName" placeholder="Last Name"
						      name="lastName" >
						       <span id="lastNameerror" style="color:red;"></span>
						    </div>
					 	</div>
					  	<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="inputEmail4">Company</label>
						      <input type="text" class="form-control" id="company" placeholder="Comapny Name" name="company" >
						       <span id="companyerror" style="color:red;"></span>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="inputPassword4">Phone Number</label>
						      <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number" name="phoneNumber" >
						       <span id="phoneNumbererror" style="color:red;"></span>
						    </div>
					  	</div>
					  	<div class="form-row">
						    <div class="form-group col-md-4">
						      <label for="inputEmail4">Email</label>
						      <input type="email" class="form-control" id="userName" placeholder="Email"
						      name="userName">
						       <span id="userNameerror" style="color:red;"></span>
						    </div>
						    <div class="form-group col-md-4">
						      <label for="inputPassword4">Password</label>
						      <input type="password" class="form-control" id="password" placeholder="Password" name="password" onkeypress="return AvoidSpace(event)">
						       <span id="passworderror" style="color:red;"></span>
						    </div>

						    <div class="form-group col-md-4">
						      <label for="inputEmail4">Confirm Password</label>
						      <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword"  onkeypress="return AvoidSpace(event)">
						       <span id="confirmPassworderror" style="color:red;"></span>
						    </div>
					  	</div>
					  	<div class="form-row">
						    <div class="form-group col-md-12">
						      <label for="inputEmail4">About</label>
						      <textarea class="form-control" name="about" ></textarea>
						    </div>
					  	</div>
					  	<div class="form-row">
				  			<div class="form-group">
							    <div class="form-check">
							      <input class="form-check-input" type="checkbox" value="1" id="term_checkbox">
							      
							      <label class="form-check-label" for="gridCheck">
							        I agree to the <a href="<?php echo base_url(); ?>terms-conditions">Terms and Conditions </a> or <a href="<?php echo base_url(); ?>privacy">Privacy Policy</a>
							      </label></br>
							      <span id="term_checkboxerror" style="color:red;"></span>
							    </div>
						  	</div>
				  		</div>
				  		<div class="form-row">
				  			<input type="button" class="btn btn-primary reg_btn" id="register_edu_user" value="Register"/>
				  		</div>
				  		<p class="Already">Already have an account ? <a href="<?php echo base_url(); ?>login" >Sign In</a></p>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- register body end-->
<script src="<?php echo base_url(); ?>assets/js/register.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
</body>
</html>

