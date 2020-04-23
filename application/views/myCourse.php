<?php 
	$salesforce_data= $this->session->userdata();
?>

<div id="MyCourses" class="container tab-pane">
    <!-- //for create dynamic url  -->
    <input type="hidden" name="contact_id" id="contact_id" value="<?php echo $salesforce_data['contact_id'];?>">
    <div class="myCourse_outer">
        <span class="myCourse_loader"></span>
    </div>    	   
    <div id="myCourseData"></div>
    <div class="container" id='pagination'></div>
</div>

<?php  if($salesforce_data['userType'] == 'EduUser' || $salesforce_data['userType'] == 'Merge'){?>
<?php $year = date("Y");?>

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
					COPYRIGHT © <?php echo $year;?> ALL RIGHT RESERVED. POWERED BY INTELLIGENT WORLD
				</p>
			</div>
			<div class="col-12 col-sm-12 col-md-3 col-lg-3">
				<ul class="social">
					<li><a href="https://www.instagram.com/intelligentworld.org"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://twitter.com/D_T_institute"><i class="fa fa-twitter"></i></a></li>
					<!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
					<li><a href="https://www.linkedin.com/company/35601521"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<?php
}
?>	
<script type="text/javascript">		
var email = "<?php echo $this->session->userdata('email'); ?>";
</script>
<script src="<?php echo base_url(); ?>assets/js/myCourse.js"></script>   
<script src="<?php echo base_url(); ?>assets/js/profile.js"></script>  