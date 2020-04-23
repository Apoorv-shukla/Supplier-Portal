<?php 
	// echo '<pre>'; print_r($this->session->all_userdata());exit;
	// print_r($this->session->userdata);
	// print_r($this->load->library('session'));
	$salesforce_data= $this->session->userdata();
?>

<section class="container-fluid p0" >
	<div class="tab-content">
		<div id="Tasks" class="tab-pane">
			<div class="wrapper">
				<div class="sidebars" id="sidebar">
					<div style="position: relative;">
						<span id="noData"></span>
						<span id="chartloading"></span>	
						<canvas id="mychart" style="height: 300px; width: 100%;position: relative;"></canvas>
					</div>
					<div class="recent mt30">
						<h3>Recent Searches</h3>
						<div id="recentsearchdata"></div>
						<div id="recentsearchs"></div>
						<!-- <ul>
							<li><a href="javascript:;">PO-0000839</a></li>
							<li><a href="javascript:;">PO-0000839</a></li>
							<li><a href="javascript:;">PO-0000839</a></li>
							<li><a href="javascript:;">PO-0000839</a></li>
						</ul> -->
					</div>
				</div>
				<div class="main_content">
					<div class="row">
						<div class="col-12 col-sm-5">
							<div class="p20 pb0"> 
								<button class="btn head_btn accpt disabled" id="accept_status_btn" style="display: none;">Accept</button>
								<button class="btn head_btn reject disabled" id="reject_status_btn" style="display: none;">Reject</button>
							</div>
						</div>
						<div class="col-12 col-sm-3 mb_none">
							<div class="p20 pb0">
								<span id="btn_click_without_select" class="output task reject" style="display: none;"></span>
							</div>
						</div>
						<div class="col-12 col-sm-4 filter_div">
							<div class="p20 pb0">
								<select class="filter" id="filter_id" onchange="getAllTaskList('<?php echo $this->session->userdata('email'); ?>')">
									<option value="All" selected>All Tasks </option>
									<option value="Pending">All Pending </option>
									<option value="Started">All Started</option>
									<option value="Review">All Review</option>
									<option value="Change Request">All Change Request</option>
									<option value="Completed">All Completed</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row" id="mytable">
						<div id="onloadtable"></div>
						<div class="col-sm-12">
							<div class="pl-3 pr-3" style="overflow: auto;" id="div_outer_table"> 
							</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
		<div id="MyCourses" class="container tab-pane">
		    <!-- //for create dynamic url  -->
		<input type="hidden" name="contact_id" id="contact_id" value="<?php echo $salesforce_data['contact_id'];?>">
	 <div class="myCourse_outer">
                    <span class="myCourse_loader"></span>
                </div>    	   
<div id="myCourseData"></div>
<div class="container" id='pagination'>
	
	</div>
		</div>
	</div>
</section>

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

<?php } ?>




<script type="text/javascript">

var userType = "<?php echo $salesforce_data['userType'];?>";

if(userType == 'Supplier' || userType == 'Merge'){
	$("#Tasks").addClass('active');
} else if(userType == 'EduUser'){
	$("#MyCourses").addClass('active');
}

$(document).ready( function () {
	$('.hamburger').click(function(){
		$('#sidebar').toggleClass('active');
	});

	 if($('#recentsearchs').is(':empty')){
        $('#recentsearchs').html('Data Not Available');
    }
	
});



var email = "<?php echo $this->session->userdata('email'); ?>";

</script>
 <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>   
 <script src="<?php echo base_url(); ?>assets/js/profile.js"></script>   