<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Intelligent World | Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>assets/dist/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google Font -->
  </head>
  <body class="hold-transition login-page container">
    <div class="login-box">
      <div class="login-logo">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 login">
                <h1 class="text-center wel mt-3 mb-3">RESET PASSWORD</h1>
                <div class="text-center mb-3">
                  <img src="<?php echo base_url(); ?>assets/images/logo.png">
                </div>
                <h6 class="tagline text-center">The Thought Leader, Analyst &amp; Influencer Network</h6>
              </div>
            </div>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
        <form action="<?php echo base_url(); ?>resetPass" method="post" class="main_form">
          <div class="form-group has-feedback ">
            <input type="email" class="form-control reset" placeholder="Email" name="email" required />
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control reset" placeholder="Password" name="password" required />
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control reset" placeholder="Confirm Password" name="repassword" required />
          </div>
          <input type="submit" class="btn btn-primary btn-block btn-flat custom-btn" value="Reset Password" />
        </form>

        
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>