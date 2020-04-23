<?php $course_id = explode('/',$_SERVER['REQUEST_URI']);?>
	<!-- listing start-->
		<!-- <div class="inner_banner">
			<div class="inner_overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="page-title-heading">
						    <?php if(!empty($Course_detail->services)){
				                foreach ($Course_detail->services as $key => $value) { ?>
                            <h2 class="title"><?php if(!empty($value->serviceName)){ echo $value->serviceName; } else {"No Data Available"; }?></h2>
                            <?php } } ?>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li>Courses Details</li>
                            </ul>
                        </div>
					</div>
				</div>
			</div>
		</div> -->
		<!--  courses details sstart -->
	<div class="container mt-5 mb-5 course_de">
	  
		<div class="row">
			<div class="col">
			    <?php if(!empty($Course_detail->services)){
				foreach ($Course_detail->services as $key => $value) {

			?>
				<h1 class="course-landing-summary"><?php if(!empty($value->serviceName)){ echo $value->serviceName; } else { echo 'No Data Available'; } ?></h1>
				<?php } }  else { ?> 
				<h1 class="course-landing-summary" style="text-align:center;"><?php  echo 'No Data Available';  ?></h1>
				<?php } ?>
				<div class="course_meta">
					<ul>
					     <?php if(!empty($Course_detail->services)){ ?>
						<li>
							 <a class="author-img">
							    <img alt="Admin bar avatar" src="<?php echo base_url(); ?>assets/images/user.jpg" class="avatar avatar-96 photo">
							  </a>
						</li>
						<?php } ?>
						<?php if(!empty($Course_detail->services)){ ?>
						<li>
							<span class="meta_title">ThoughtLeader</span>
							<?php 
				            foreach ($Course_detail->services as $key => $value) {	?>
					  		<span class="meta_data"><a><?php if(!empty($value->courseAuthor)) { echo $value->courseAuthor; } else { echo "N/A"; }?></a></span>
					  		<?php } ?>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>

		</div>
		<?php if(!empty($Course_detail->services)){ ?>
		<div class="row main_course_conetnt">
			<div class="col-12 col-sm-12 col-md-12 col-lg-9 mt-5">
				<div id="video_frame">

				
			    <?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) {	
				            if(!empty($value->courseVideoLink)) { ?>
				<iframe width="100%" height="520" id="course_video" src="<?php echo $value->courseVideoLink;?>" style="border:none;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
				<?php } } }?>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-3 mt-5">
				<div class="wgl-course-essentials">
				    <h3 class="title">Price: <span class="vat">(VAT Included)</span>
				    	<span class="course-price">
				    	    <?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) { foreach ($value->servicePrices as $k => $v) { 
				            if(!empty($v->currencySymbol) && !empty($v->price)) { ?>
				    		<span class="price"><?php echo $v->currencySymbol.' '.$v->price;?></span>
				    		<?php } } } }?>
				    		<!--<span class="price">&euro;249</span>-->
				    	</span>
				    </h3>
				    <ul>
				        <li class="language">
				            <i class="fa fa-globe"></i>
				            <span class="label">Language:</span>
				            <span class="value">English</span>
				        </li>
				        <li class="duration">
				            <i class="fa fa-clock-o"></i>
				            <span class="label">Duration:</span>
				            <?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) { ?>
				            <span class="value"> <?php if(!empty($value->courseDuration)){ echo $value->courseDuration;} else { echo 'N/A';} ?></span>
				            <?php } }?>
				        </li>
				        <li class="lectures">
				            <i class="fa fa-files-o"></i>
				            <span class="label">Chapters:</span>
				            <?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) { ?>
				            <span class="value"><?php if(!empty($value->serviceChapter) || $value->serviceChapter !=0){ echo $value->serviceChapter;} else { echo 'N/A';} ?></span>
				            <?php } }?>
				        </li>
				        
				    </ul>
				    <div class="lp-course-buttons">
				     <?php 
                        $salesforce_data= $this->session->userdata();
                        if ($this->session->userdata('contact_id') == ''){ ?> 
                        <button type="button" class="btn btn-info btn-lg buy_custm" data-toggle="modal" data-target="#custom_login_buy">Buy Now</button>
				        <?php } else { ?>
				        <button type="button" id="curr_pick" class="btn btn-info btn-lg buy_custm" data-toggle="modal" data-target="#currency_pick">Buy Now</button>
				    <?php } ?>
				    </div>

				    	<?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) {	
				            if(!empty($value->courseVideoLink)) { ?>
				       		<input type="button" name="test" class="btn-primary" value="button_20sec" onclick="videotime('<?php echo $value->courseVideoLink;?>');">
				            <?php } } }?>

				            <?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) {	
				            if(!empty($value->courseVideoLink)) { ?>
				       		<input type="button" name="test" class="btn-primary" value="button_30sec" onclick="videoTesttime('<?php echo $value->courseVideoLink;?>');">
				            <?php } } }?>
				            <?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) {	
				            if(!empty($value->courseVideoLink)) { ?>
				       		<input type="button" name="test" class="btn-primary" value="button_40sec" onclick="videoFinaltime('<?php echo $value->courseVideoLink;?>');">
				            <?php } } }?>
				       
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($Course_detail->services)){ ?>
		<div class="row mt-5">
			<div class="col">
				<ul class="nav nav-tabs course-nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#home">Description</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#menu1">What You`ll Learn</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#menu2">Who This Course For</a>
				  </li>
				  <!--<li class="nav-item">-->
				  <!--  <a class="nav-link disabled" data-toggle="tab" href="#menu2">Reviews</a>-->
				  <!--</li>-->
				</ul>
        
        
        <!--Modal-->
        <div class="modal fade" id="currency_pick" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm currency_md" role="document">
                <div class="modal-content">
                    <div class="modal-header model-header-currency text-center">
                        <h4 class="modal-title color-fff">Currency Details</h4>
                        <button type="button" class="close" data-dismiss="modal"  style="color:#fff;">&times;</button>
                    </div>
                    <div class="modal-body padded-30">
                        <form method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-sm-12">
                                         <label for="exampleFormControlSelect1" class="label-blue">Select Currency</label>
                                        <select class="form-control" id="currency_amount" onchange="removeMessage(this.value);">
                                                    <option value="">Select A Currency &nbsp;&nbsp;&nbsp;>></option>
    <?php if(!empty($Course_detail->services)){
			foreach ($Course_detail->services as $key => $value) { 
			    foreach ($value->servicePrices as $k => $va){
			        if(!empty($va->price)) {
			        $price = $va->price*100;	?>
            <option value="Amount=<?php echo $price.'&CurrencyType='.$va->currencyCode;?>"><?php echo $va->price;?><small>(in <?php echo $va->currencyCode;?>)</small></option>
         <?php }}} } else { ?>  
         <option value="">NO Price Available</option>
         <?php } ?>
                                                    
                                            </select>
                                        <span id="currency_amount_error" style="color: red;"></span>
                        <ul class="edgt-feature">
                                 <li class="edgt-feature-item"> <span class="edgt-item-icon">
<input type="checkbox" id="term_condition" style="height:auto;width:20px; border:1px solid #b1b1a9; -webkit-appearance: checkbox;" onclick="removeValdMessge();" /></span>
<span class="edgt-item-label">I've read and accept the <a href="<?php echo base_url(); ?>terms-conditions" target="_blank">Terms & Conditions</a> and <a href="<?php echo base_url(); ?>privacy" target="_blank">Privacy Policy</a></span></li>
<span id="term_condition_error" style="color:red;"></span>
</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <input type="button" class="btn btn-default login-button-custome" id = "buy_button" name="currency" value="Buy" onclick="validuser('<?php echo $this->session->userdata('contact_id');?>','<?php echo $course_id[2];?>')">
                                    </div>
                                    <span id="loading" style="color:green;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active container" id="home">
				      <div class="content_wrapper">
				        <?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) {	?>
					  	<p>
					  	    
							<?php if(!empty($value->shortDesciption)) { echo $value->shortDesciption; } else { echo 'No Data Available ';}?>
							
					  	</p>
					  	<?php }}?>
					  	 </div>
				  </div>
				  <div class="tab-pane container" id="menu1">
				      <div class="content_wrapper">
				      <?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) { 
				            if(!empty($value->whatyouwilllearn)){
				                $whatuwilllearn = explode('<br>',$value->whatyouwilllearn);
				                
				            }
				            ?>
				            <ul><?php foreach($whatuwilllearn as $key =>$v) { ?>
				                <li><?php echo $v;?></li>
				                <?php } ?>
				            </ul>
				  		
				  		<?php } } ?>
				  	</div>
				  </div>
				  <div class="tab-pane container" id="menu2">
				      <div class="content_wrapper">
				  	<?php if(!empty($Course_detail->services)){
				            foreach ($Course_detail->services as $key => $value) {
				                if(!empty($value->whoThisFor)){
				                $whoThisFor = explode('<br>',$value->whoThisFor);
				             }
				            
				            ?>
				  		
				  		    <ul><?php foreach($whoThisFor as $key =>$w) { ?>
				                <li><?php echo $w;?></li>
				                <?php } ?>
				            </ul>
				  		<?php } } ?>
				  		</div>
				  </div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<!-- courses details end-->
	<!--Apoorv Login-->
	<div class="modal fade" id="custom_login_buy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog model-signIn" role="document">
                <div class="modal-content">
                    <div class="modal-header model-header-signIn text-center">
                        <h4 class="modal-title w-100 font-weight-bold color-fff">Sign in</h4>
                        <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" style="color:#fff;">&times;</button>
                    </div>
                    <form method="post" id="loginform">
                        <div class="modal-body mx-3 padded-30">
                            <div class="register_outer">
                                <span class="register_loader"></span>
                            </div> 
                            <div class="md-form" style="margin-bottom: 15px; margin-top: 20px;">
                                <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email" class="label-blue"> Email</label>
                                        <i class="fa fa-envelope prefix " style="color: #1e73be"></i>

                                    </div>
                                    <div class="col-8 col-md-8 col-lg-8">
                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control validate" >
                                        <span id="email_error" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="md-form mb-4">
                                <div class="row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <label data-error="wrong" data-success="right" for="defaultForm-pass" class="label-blue">Password</label>
                                        <i class="fa fa-lock prefix " style="color: #1e73be"></i>
                                    </div>

                                    <div class="col-8 col-md-8 col-lg-8">
                                        <input type="password" id="pass" name="pass" placeholder="Password" class="form-control validate" onkeypress="return AvoidSpace(event)">
                                        <span id="pass_error" style="color: red;"></span>

                                    </div>


                                </div>
                            </div>

                            <div class="row text-center" style="padding-top: 20px;">
                                <div class="col-4 col-md-4 col-lg-4"></div>

                                <div class="col-4 col-md-5 col-lg-5">
                                    <input type="button" class="btn btn-default login-button-custome" name="submit_login" onclick="Validation()" value="Login">
                                       
                                </div>
                                
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="w100">
                                <a href="<?php echo base_url(); ?>register" style="text-decoration: none; text-align:left;float:left;" target="_blank"><i class="fa fa-lock"></i> Create an account</a>
                                <a data-toggle="modal" data-target="#forgot" class="forgot" style="cursor: pointer; text-align:right;float:right;">Forgot Password ?</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        
        
      <!-- forgot password Modal -->
      <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered forgot_pass" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <span id="forgot_err" ></span>
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
                <div id="forgot_password_email_err" class="text-red" style="color:red;"></div>
                <button type="button" class="btn btn-primary forgt-btn" id="forgetPassword">SUBMIT</button>
              </form>
            </div>
          </div>
        </div>
      </div>  
      
      <!-- forgot password Modal ends-->
        
        
</body>
</html>

<script type="text/javascript">


    var base_url = '<?php echo base_url(); ?>';
    function videotime(video_link)
			{
				var video_play = video_link+'?autoplay=1#t=20s';
				var frame_html = '<iframe width="100%" height="520" id="course_video" src="'+video_play+'" style="border:none;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>';
				//var final = video_link+'?autoplay=1#t=12s';
				document.getElementById("video_frame").innerHTML = frame_html;

			}

			function videoTesttime(video_link)
			{
				var video_play = video_link+'?autoplay=1#t=30s';
				var frame_html = '<iframe width="100%" height="520" id="course_video" src="'+video_play+'" style="border:none;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>';
				//var final = video_link+'?autoplay=1#t=12s';
				document.getElementById("video_frame").innerHTML = frame_html;

			}
			function videoFinaltime(video_link)
			{
				var video_play = video_link+'?autoplay=1#t=40s';
				var frame_html = '<iframe width="100%" height="520" id="course_video" src="'+video_play+'" style="border:none;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>';
				//var final = video_link+'?autoplay=1#t=12s';
				document.getElementById("video_frame").innerHTML = frame_html;

			}
			

</script>
<script src="<?php echo base_url(); ?>assets/js/coursedetail.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

