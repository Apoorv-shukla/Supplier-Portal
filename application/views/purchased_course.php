
	<!-- listing start-->
		<!-- <div class="inner_banner">
			<div class="inner_overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="page-title-heading">
						    <?php if(!empty($Purchase_detail->services)){
				                foreach ($Purchase_detail->services as $key => $value) {	?>
                            <h2 class="title"><?php if(!empty($value->serviceName)){ echo $value->serviceName; } else {echo 'No Data Available';} ?></h2>
                            <?php } } ?>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li>Purchased Courses Details</li>
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
			    <?php if(!empty($Purchase_detail->services)){
				foreach ($Purchase_detail->services as $key => $value) {
			?>
				<h1 class="course-landing-summary"><?php if(!empty($value->serviceName)){ echo $value->serviceName;} else { echo 'No Data Available'; }?></h1>
				<?php } }  else { ?>
				<h1 class="course-landing-summary" style="text-align:center;"><?php echo 'No Data Available'; ?></h1>
				<?php } ?>
				<?php if(!empty($Purchase_detail->services)){ ?>
				<div class="course_meta">
					<ul>
					    <?php if(!empty($Purchase_detail->services)){ ?>
						<li>
							 <a class="author-img">
							    <img alt="Admin bar avatar" src="<?php echo base_url(); ?>assets/images/user.jpg" class="avatar avatar-96 photo">
							  </a>
						</li>
						<?php } ?>
						<li style="padding-right: 20px;">
							<span class="meta_title">Thoughtleader</span>
					  		<?php if(!empty($Purchase_detail->services)){
				            foreach ($Purchase_detail->services as $key => $value) {	?>
					  		<span class="meta_data"><a><?php if(!empty($value->courseAuthor)) { echo $value->courseAuthor; } else {echo 'N/A'; } ?></a></span>
					  		<?php } } ?>
						</li>
						<?php if(!empty($Purchase_detail->services)){
			foreach ($Purchase_detail->services as $key => $value) { 
			if(!empty($value->courseVideoLink)) { ?>
						<li style="padding-right: 20px;">
							<input type="button" name="test" value="button_12sec" onclick="videotime('<?php echo $value->courseVideoLink;?>');">
						</li>
						<?php } } }?>
						<li style="padding-left: 30px;border-left: 1px solid #ccc;">
							<span class="meta_title">Duration</span>
					  		<?php if(!empty($Purchase_detail->services)){
				            foreach ($Purchase_detail->services as $key => $value) { ?>
				            <span class="value"><?php  if(!empty($value->courseDuration)) { echo $value->courseDuration; } else {echo 'N/A'; }?></span>
				            <?php } }?>
						</li>
					</ul>
				</div>
				<?php } ?>
			</div>

		</div>
		<?php if(!empty($Purchase_detail->services)){ ?>
		<div class="row main_course_conetnt">
			<div class="col-12 col-sm-12 col-md-12 col-lg-9 mt-5">
		<?php if(!empty($Purchase_detail->services)){
			foreach ($Purchase_detail->services as $key => $value) { 
			if(!empty($value->courseVideoLink)) { ?>
				<iframe width="100%" height="520" id="main_video" src="<?php echo $value->courseVideoLink;?>" style="border:none;" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
				<?php } } }?>
				
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-3 mt-5">
				<div class="sponser">
					<h2>Sponsored By</h2>
						<div class="s_div">
							<img src="<?php echo base_url(); ?>assets/images/logo.png">
						</div>
				</div>
			</div
		</div>
		<?php } ?>
		


		<?php if(!empty($Purchase_detail->services)){ ?>
		<div class="row mt-5">
			<div class="col">
				<ul class="nav nav-tabs course-nav-tabs purchased">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#c_content">Course Modules</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#c_des">Course Content</a>
				  </li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active container" id="c_content">
				      <?php if(!empty($Purchase_detail->services)){
				            foreach ($Purchase_detail->services as $key => $value) {
				            foreach($value->SubscribedCourses as $ke =>$ve) { 
				            foreach ($ve->SubscribedCourseModules as $k =>$v ) { ?>
				        <div class="row module">
				            <?php if(!empty($v->CourseModule)) { ?>
					  		<div class="col-1 col-sm-1 col-md-1 col-lg-1">
					  			<input type="checkbox" name="check" id="status_<?php echo $v->CourseModuleId;?>"  <?php if($v->Status=='Completed') { echo 'checked'; } ?> onclick="module('<?php echo $v->CourseModuleId;?>','<?php echo $value->serviceId;?>','<?php echo $v->ModuleVideoLink;?>')">
					  		</div>
					  		<?php } ?>
					  		<div class="col-7 col-sm-7 col-md-7 col-lg-7">
					  		    
					  			<h3><?php if(!empty($v->CourseModule)) { echo $v->CourseModule;} else { echo "No Data Available";}?></h3>
					  			
					  		</div>
					  		<?php if(!empty($v->ModuleVideoLink)) { ?>
					  		<div class="col-4 col-sm-4 col-md-4 col-lg-4">
					  			<div class="module_video">
					  				<iframe width="100%" height="100%" src="<?php if(!empty($v->ModuleVideoLink)) { echo $v->ModuleVideoLink;} ?>"></iframe>
					  			</div>
					  		</div>
					  		<?php }  else {?>
					  		<div class="col-4 col-sm-4 col-md-4 col-lg-4">
					  			<?php echo "Video Not Available";?>
					  		</div>
					  		<?php }?>
					  	</div>
				      <?php } } } } ?>
				     
				  </div>
				  <div class="tab-pane container" id="c_des">
				  		 <?php if(!empty($Purchase_detail->services)){
				            foreach ($Purchase_detail->services as $key => $value) {	?>
					  	<p>
					  	    <?php if(!empty($value->courseContent)) {  echo $value->courseContent; } else { echo 'No Data Available';}?>
							
							
					  	</p>
					  	<?php }}?>
				  </div>
				  <div class="tab-pane container" id="menu2">
				  	 <?php if(!empty($Purchase_detail->services)){
				            foreach ($Purchase_detail->services as $key => $value) {	?>
					  	<p>
							<?php if(!empty($value->courseContent)) {  echo $value->courseContent; } else { echo 'No Data Available';}?>
							
					  	</p>
					  	<?php }}?>
				  </div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<!-- courses details end-->
	<script src="<?php echo base_url(); ?>assets/js/courseListing.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
        var base_url = "<?php echo base_url(); ?>";

        function videotime(video_link)
			{
				//var finl = video_link+'#t=2s';
				 alert(finl);
				 document.getElementById("main_video").src = "https://player.vimeo.com/video/376324501?autoplay=1#t=2s";

			}
    </script>
</body>
</html>

