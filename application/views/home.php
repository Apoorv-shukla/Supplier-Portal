	<!-- banner -->
	<div class="owl-carousel owl-theme banner">
	    <?php 
	    //echo '<pre>'; print_r($home_detail);
	    if(!empty($home_detail->homePage)){
				foreach ($home_detail->homePage as $key => $value) {
                if($value->Slider_1!='False') {
			?>
	    <div class="item">
	    	<img src="<?php echo $value->Slider_1;?>">
	    </div>
	    <?php } } } ?>
	    
	    <?php 
	    //echo '<pre>'; print_r($home_detail);
	    if(!empty($home_detail->homePage)){
				foreach ($home_detail->homePage as $key => $value) {
                if($value->Slider_2!='False') {
			?>
	    <div class="item">
	    	<img src="<?php echo $value->Slider_2;?>">
	    </div>
	    <?php } } } ?>
	    
	    <?php 
	    //echo '<pre>'; print_r($home_detail);
	    if(!empty($home_detail->homePage)){
				foreach ($home_detail->homePage as $key => $value) {
                if($value->Slider_3!='False') {
			?>
	    <div class="item">
	    	<img src="<?php echo $value->Slider_3;?>">
	    </div>
	    <?php } } } ?>
	    
	    <?php 
	    //echo '<pre>'; print_r($home_detail);
	    if(!empty($home_detail->homePage)){
				foreach ($home_detail->homePage as $key => $value) {
                if($value->Slider_4!='False') {
			?>
	    <div class="item">
	    	<img src="<?php echo $value->Slider_4;?>">
	    </div>
	    <?php } } } ?>
	    
	    <?php 
	    //echo '<pre>'; print_r($home_detail);
	    if(!empty($home_detail->homePage)){
				foreach ($home_detail->homePage as $key => $value) {
                if($value->Slider_5!='False') {
			?>
	    <div class="item">
	    	<img src="<?php echo $value->Slider_5;?>">
	    </div>
	    <?php } } } ?>
	    
	</div>
	<!-- banner end -->
	<!-- services -->
	<div class="container mt-3">
		<div class="row why_row">
			<div class="col-12 col-sm-12 -col-md-12 col-lg-4 why_col_flex">
			    <a href="<?php echo base_url(); ?>courseListing" class="">
    				<div class="us_image">
    				    <div class="ser_img">
    					    <img src="<?php echo base_url(); ?>assets/images/first.png" class="w100">
    					</div>
    					<div class="content">
    						<h3>EXECUTIVE COACHING COURSES</h3>
    						<p>
    							Learn in easy to digest modules with vibrant multimedia
    						</p>
    					</div>
    				</div>
				</a>
			</div>
			<div class="col-12 col-sm-12 -col-md-12 col-lg-4 why_col_flex">
			    <a href="<?php echo base_url(); ?>courseListing" class="">
				    <div class="us_image">
				    <div class="ser_img">
					    <img src="<?php echo base_url(); ?>assets/images/seconf.png" class="w100">
					</div>
					<div class="content">
						<h3>INSIGHTS FROM TOP EXPERTS</h3>
						<p>
							Top Thought Leaders, experts,analysts, and researchers from the most disruptive technology and consultancy firms in the world share views, use cases,strategies, and insights only found here
						</p>
					</div>
				</div>
				</a>
			</div>
			<div class="col-12 col-sm-12 -col-md-12 col-lg-4 why_col_flex">
			    <a href="<?php echo base_url(); ?>courseListing" class="">
				    <div class="us_image">
				    <div class="ser_img">
					    <img src="<?php echo base_url(); ?>assets/images/third.png" class="w100">
					</div>
					<div class="content">
						<h3>24 X 7 AVAILABLITY</h3>
						<p>
							Access courses anywhere,anytime, on any device
						</p>
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
	<!-- services end -->
	<!-- about us -->
	<!--<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-6 abt">
				<h2>
					Choose The Course You Want To Learn
				</h2>
				<?php if(!empty($home_detail->homePage)){
				foreach ($home_detail->homePage as $key => $value) { ?>

				<p>
					<?php echo $value->AboutUs;?>
				</p>
				<?php } } ?>
				<a  class="view_all btn " href="<?php echo base_url(); ?>courseListing">View All Courses</a>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-6">
				<img src="<?php echo base_url(); ?>assets/images/abt.jpg" class="w100">
			</div>
		</div>
	</div>-->
	
	<!-- <div class="why_image">
	</div> -->
	
	
	<!-- courses -->
	<div class="container mb-5" id="courses_div">
		<h2 class="mt-5 mb-3 avail_heading">Available Courses</h2>
		<p class="heading_txt mb-5">“Choose from a number of in-depth courses”</p>
		 <?php if(!empty($home_detail->services)){
		     if(count($home_detail->services)>3) { ?>
		<div class="owl-carousel owl-theme courses">
		    <?php 
				foreach ($home_detail->services as $key => $value) {
			?>
		    
			<div class="item">
				<div class=" ">
					<div class="imageCon">
						<a href="<?php echo base_url().'coursedetail/'.$value->serviceId;?>">
						    <img src="<?php if(!empty($value->imageUrl)) { echo $value->imageUrl; } ?>" class="w-100" alt="course3"/>
						</a>
					</div>
					<div class="course_box" style="">
						<div class="details">
							<h5 class="font-weight-medium">
							    <a href="<?php echo base_url().'coursedetail/'.$value->serviceId;?>">
				
							        <?php if(!empty($value->serviceName)) { if(strlen($value->serviceName)>55) { echo substr($value->serviceName,0,55).'...';  } else { echo $value->serviceName.'...';} } ?>
							    </a>
						    </h5>
							<!--<ul class="d-flex review">
								<li class="">
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star-half text-warning"></i>
									<i class="fa fa-star-o text-warning"></i>
								</li>
								
							</ul>-->
							<p class="p-0 m-0"><?php if(!empty($value->shortDesciption)) { if(strlen($value->shortDesciption)>70) { echo substr($value->shortDesciption,0,100).'...';  } else { echo $value->shortDesciption.'...';} } ?></p>
							<ul class="course-meta desc">
                                <li>
                                    <span><b>Chapters</b></span>
                                    <h6><?php if(empty($value->serviceChapter) || $value->serviceChapter==0) { echo 'N/A'; } else {echo $value->serviceChapter;}?></h6>
                                    
                                </li>
                                <li>
                                    <span><b>Duration</b></span>
                                     <h6><span class="course-time"><?php if(!empty($value->courseDuration)) { echo $value->courseDuration; } ?></span></h6>
                                    
                                </li>
                                <li>
                                    '<a href="<?php echo base_url().'coursedetail/'.$value->serviceId;?>"><button type="button" class="btn btn-primary" style="font-size:14px !important;">Read More</button></a>
                                </li>
                            </ul>
						</div>
					</div>
				</div>
			</div>
			
			<?php } ?>

	    </div>
	    <?php } else { ?>
	    <div class="owl-carousel owl-theme less_courses">
	    <?php 
				foreach ($home_detail->services as $key => $value) {?>
		    
			<div class="item">
				<div class=" ">
					<div class="imageCon">
						<a href="<?php echo base_url().'coursedetail/'.$value->serviceId;?>">
						    <img src="<?php if(!empty($value->imageUrl)) { echo $value->imageUrl; } ?>" class="w-100" alt="course3"/>
						</a>
					</div>
					<div class="course_box" style="">
						<div class="details">
							<h5 class="font-weight-medium">
							    <a href="<?php echo base_url().'coursedetail/'.$value->serviceId;?>">
							       <?php if(!empty($value->serviceName)) { if(strlen($value->serviceName)>55) { echo substr($value->serviceName,0,55).'...';  } else { echo $value->serviceName.'...';} } ?>
							    </a>
						    </h5>
							<!--<ul class="d-flex review">
								<li class="">
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star text-warning"></i>
									<i class="fa fa-star-half text-warning"></i>
									<i class="fa fa-star-o text-warning"></i>
								</li>
								
							</ul>-->
							<p class="p-0 m-0"><?php if(!empty($value->shortDesciption)) { if(strlen($value->shortDesciption)>70) { echo substr($value->shortDesciption,0,100).'...';  } else { echo $value->shortDesciption.'...';} } ?></p>
							<ul class="course-meta desc">
                                <li>
                                    <span><b>Chapters</b></span>
                                    <h6><?php if(empty($value->serviceChapter) || $value->serviceChapter==0) { echo 'N/A'; } else {echo $value->serviceChapter;}?></h6>
                                    
                                </li>
                                <li>
                                    <span><b>Duration</b></span>
                                     <h6><span class="course-time"><?php if(!empty($value->courseDuration)) { echo $value->courseDuration; } ?></span></h6>
                                    
                                </li>
                                <li>
                                    '<a href="<?php echo base_url().'coursedetail/'.$value->serviceId;?>"><button type="button" class="btn btn-primary" style="font-size:14px !important;">Read More</button></a>
                                </li>
                            </ul>
						</div>
					</div>
				</div>
			</div>
			
			<?php } ?>

	    </div>
	        
	    <?php } } ?>
		</div>
	<!-- footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-3 col-lg-3">
					<ul class="Privacy">
						<li><a href="<?php echo base_url(); ?>privacy">Privacy</a></li>
						<li><a href="<?php echo base_url(); ?>terms-conditions">Terms &amp; Conditions</a></li>
						
					</ul>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<p class="copyright">
						COPYRIGHT © 2020. ALL RIGHT RESERVED. POWERED BY INTELLIGENT WORLD
					</p>
				</div>
				<div class="col-12 col-sm-12 col-md-3 col-lg-3">
					<ul class="social">
						<li><a href="https://www.instagram.com/intelligentworld.org" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://twitter.com/D_T_institute" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
						<li><a href="https://www.linkedin.com/company/35601521" target="_blank"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		$('.owl-carousel.banner').owlCarousel({
         animateIn: 'fadeInRight',
         animateOut: 'fadeInLeft',
		    loop:true,
		    margin:0,
		    nav:true,
		    autoplay:true,
            autoplayTimeout:5000,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:1
		        },
		        1000:{
		            items:1
		        }
		    }
		})
		$('.owl-carousel.courses').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
		    autoplay:true,
            autoplayTimeout:10000,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:1
		        },
		        1000:{
		            items:3
		        }
		    }
		})
		
		$('.owl-carousel.less_courses').owlCarousel({
		    loop:false,
		    margin:10,
		    nav:true,
		    autoplay:true,
            autoplayTimeout:10000,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:1
		        },
		        1000:{
		            items:3
		        }
		    }
		})
		
    //cookie toggle script 
    
    $('.scroll_div').click(function(){
        $('html, body').animate({
        'scrollTop' : $("#courses_div").position().top
        });
    });
    $('.setting_btn button').click(function(){
		$('.cookie').toggleClass('cookie_shw');
	})
	
	
	/*var cookies_data = '<?php //echo $cookies_data;?>';
	if(cookies_data == 1){
	    $("#cookies_show").css('display', 'none');
	} else {
	    $("#cookies_show").css('display', 'show');
	}*/
	
	var baseURL = '<?php echo base_url();?>';
	$("#accept_cookie").click(function(){
	    $.ajax({
            url: baseURL+'setUserCookies',
            method: 'post',
            success: function(response) {
                location.reload();
            }
        });
    });
    
    $("#decline_cookie").click(function(){
	    $.ajax({
            url: baseURL+'unsetUserCookies',
            method: 'post',
            success: function(response) {
                location.reload();
            }
        });
    });
	</script>
	<script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
        var base_url = "<?php echo base_url(); ?>";
    //     $("#profile_data").click(function(){
    
    // alert('dev');
    //     });
    </script>
</body>
</html>