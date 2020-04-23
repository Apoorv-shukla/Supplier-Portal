    <!-- forgot password Modal -->
      <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered forgot_pass" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <span id="forgot_err"></span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeForgetPassword">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <!-- <div id="divLoading_outer">
                <span id="divLoading"></span>
              </div> -->
              <h6 class="text-center">FORGOT PASSWORD</h6>
              <p>Enter Your email to receive password reset instruction</p>
              <span id="forget_p"></span>
              <form method="post" class="main_form" id="forgetPassword_form">
                <div class="form-group">
                  <label class="light">Enter Your email</label>
                  <input type="email" class="form-control"  id="forgot_password_email" aria-describedby="emailHelp" name="email">
                </div>
                <div id="forgot_password_email_err" class="text-red"></div>
                <button type="button" class="btn btn-primary forgt-btn" id="forgetPassword">SUBMIT</button>
              </form>
            </div>
          </div>
        </div>
      </div>  
      
      <!-- forgot password Modal ends-->
    <div class="login-box">
      <div class="login-logo">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 login">
                <h1 class="text-center wel mt-3 mb-3">WELCOME</h1>
                <!--<h6 class="tagline text-center">The Thought Leader, Analyst &amp; Influencer Network</h6>-->
              </div>
            </div>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div id="divLoading_outer">
          <span id="divLoading"></span>
        </div>
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
        <form action="<?php echo base_url(); ?>loginMe" method="post" class="main_form">
          <img src="https://www.filesaccessibility.com//assets/images/loading.gif" id="img" style="display:none"/ >
          <div class="form-group has-feedback ">
            <input type="email" class="form-control" placeholder="Username*" name="email" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>" required />
            <i class="fa fa-user-o form-control-feedback" aria-hidden="true"></i>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password*" name="password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>" required />
            <i class="fa fa-lock form-control-feedback" aria-hidden="true"></i>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-6">    
              <div class="checkbox icheck rememeber">
                <label>
                  <input type="checkbox" name="remember_me" value="on" <?php if(isset($_COOKIE["loginId"])) { ?> checked="checked" <?php } ?> > Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
              <!-- <a href="<?php echo base_url() ?>forgotPassword" class="forgot">Forgot Password</a><br> -->
              <a data-toggle="modal" data-target="#forgot" class="forgot">Forgot Password ?</a><br>
            </div><!-- /.col -->
          </div>
          <input type="submit" class="btn btn-primary btn-block btn-flat custom-btn" value="LOGIN" id="loginUser"/>
        </form>
      </div>
      <!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
  </body>
</html>


<script type="text/javascript">
$("#loginUser").click(function(e){
  e.preventDefault();
  //show loading gif
  $("#divLoading_outer").show();
  $("#divLoading").addClass('show');
  $(this).closest('form').submit();
});
</script>

<!-- fff -->