<!doctype html>
<html>
<head>
<meta charset="utf-8">
	
<title>Terms & Conditions - Intelligent World</title>

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="Stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/stylesheet.css">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	

</head>
<body>
<!-- header -->
	<div class="sticky-top">
<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white bx-shdw ptb20">
				<div class="container">
			      <a class="navbar-brand" href="<?php echo base_url(); ?>">
			      	<img src="<?php echo base_url(); ?>assets/images/logo.png">
			      </a>
			      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			        <span class="navbar-toggler-icon"></span>
			      </button>
			      <div class="collapse navbar-collapse" id="navbarNav">
			      </div>
			    </div>
			</nav>
	</header>
	<!-- header end -->
	<nav class="task_tab">
        <div class="container">
        	<div class="row">
        		<div class="col-sm-12 col-12 col-lg-12 col-xl-12">
        			<ul class="nav nav-tabs" style="border:none;justify-content: center">
        				<li class="hamburger">
        					<a href="<?php echo base_url(); ?>">
        						<i class="fa fa-bars" aria-hidden="true"></i>
        					</a>
        				</li>
        				
        				<?php
        				    $salesforce_data= $this->session->userdata();
                            if ($this->session->userdata('contact_id') == ''){
                                ?>
                                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home home_ic active"></i></a></li>
            						<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link">Courses</a></li>
            						<li>
            							<a  href="<?php echo base_url(); ?>login" class="nav-link active">Login</a>
            						</li>
            						<li>
            							<a href="<?php echo base_url(); ?>register" class="nav-link active">Register</a>
            						</li>
                                <?php
                            }
        				?>
        				
        				<?php if($this->session->userdata('userType') == 'Supplier'){
        					?>
        						<li>
        							<a data-toggle="tab" href="#Tasks" class="nav-link active">Tasks</a>
        						</li>
        					<?php
        				}?>
        				<?php if($this->session->userdata('userType') == 'EduUser'){
        					?>
        						<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home home_ic"></i></a></li>	
        						<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link">Courses</a></li>
        						<li><a href="<?php echo base_url(); ?>dashboard" class="nav-link">My Courses</a></li>
        						<li><a href="<?php echo base_url(); ?>edulogout" class="nav-link">Logout</a></li>
        							
        					<?php
        				}?>
        				<?php if($this->session->userdata('userType') == 'Merge'){
        					?>
        						<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home home_ic"></i></a></li>
        						<li><a href="<?php echo base_url(); ?>dashboard" class="nav-link">Tasks</a></li>
        						<li><a href="<?php echo base_url(); ?>courseListing" class="nav-link">Courses</a></li>	
        						<li><a href="<?php echo base_url(); ?>dashboard" class="nav-link">My Courses</a></li>
        						<li><a href="<?php echo base_url(); ?>edulogout" class="nav-link">Logout</a></li>
        					<?php
        				}?>
        			</ul>
        		</div>
        	</div>
        </div>
        </nav>
    </div>
<!-- header -->
	
<div class="inner_banner">
	<div class="inner_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-title-heading">
                    <h2 class="title">TERM & CONDITION</h2>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li>Term & Condition</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12">
        <p>These Terms and Conditions (the “Terms”) for the website (the “Website”) constitute a legal agreement between the user (the “user”, “you”, “your”) of the Website <a href="<?php echo base_url(); ?>" target="_blank" rel="noopener noreferrer"><?php echo base_url(); ?></a> and the related software (collectively, the “Website”) and the company “Digital Transformation Institute”, having a principal place of business at Heidestein 2, 3452LL, Vleuten, the Netherlands (the “Company”, “us”, “we”, “our”).</p>
        
        <p>By using the Website, you agree to be legally bound by these Terms. In case you do not agree with one or more provisions of these Terms, please do not use the Website. You are authorized to use the Website only if you agree to these Terms.</p>
        
        <p><strong><u>1. About the Website</u></strong></p>
        
        <p>The Website provides access to a database of Internet-based live and recorded educational content (e.g., videos, webinars, articles, video articles, interviews, and whitepapers) of educational nature from leading business experts (the “Services”). The use of the Website is free of charge.</p>
        
        <p><strong>Minors.</strong>&nbsp;The Website is not marketed to, and cannot be accessed and used, by persons under the age of 18.</p>
        
        <p><strong>Registering user account.</strong>&nbsp;In order to start using the Website and access the Services, the user is required to complete a registration process. By registering a user account, you agree to provide only true, complete, and up-to-date personal data. Please note that a part of your user profile may be made public. You are solely responsible for maintaining the confidentiality of your user account, including login details and password. The user account may be cancelled by you at any time.</p>
        
        <p><strong>Your representation.</strong>&nbsp;By accessing and using the Website and the Services, you represent and warrant that: (i) you will not use the Website in a way that violates any applicable law; (ii) your age is at least 18 years; (iii) you will use the Website only in accordance with these Terms.</p>
        
        <p><strong><u>2. Company’s Content</u></strong></p>
        
        <p>The content published on the Website and made available through the Services is owned by the Company, its partners, agents, licensors, vendors, and/or other content providers (the “Company’s Content”). The Company’s Content includes, but is not limited to, text, images, audiovisual content, source code, trademarks, service marks and trade names. We would like to inform you that Company’s Content is protected by the applicable intellectual property laws. Unless otherwise provided in these Terms, you are not allowed to copy or use Company’s Content in any manner without obtaining a prior written permission from the Company.</p>
        
        <p><strong><u>3. User-Generated Content</u></strong></p>
        
        <p>The Website offers you the opportunity to publish online content, such as comments, questions, feedback, and videos, on the Website (the “User-Generated Content”). By posting your User-Generated Content on the Website, you grant the Company unrestricted, royalty-free, perpetual, and irrevocable license to use, distribute, adapt, remix, modify, publicly display, publicly perform, excerpt, prepare derivative works of, and reproduce your User-Generated Content.</p>
        
        <p>You are not allowed to submit any User-Generated Content or other material on the Website that:</p>
        
        <ul class="w100">
            <li style="list-style-type: circle;">Violates any applicable laws;</li>
            <li style="list-style-type: circle;">Facilitates in any manner illegal activities;</li>
            <li style="list-style-type: circle;">Violates the intellectual property rights of others;</li>
            <li style="list-style-type: circle;">Is copied from other online sources;</li>
            <li style="list-style-type: circle;">Is ethnically, racially, or otherwise objectionable;</li>
            <li style="list-style-type: circle;">Is sexually explicit, libelous, harassing, defamatory, abusive, profane, vulgar, threatening, hateful, obscene;</li>
            <li style="list-style-type: circle;">Advertises or encourages the use of tobacco, alcohol, and illegal substances;</li>
            <li style="list-style-type: circle;">Is a form of spam or other illegal messaging;</li>
            <li style="list-style-type: circle;">contains links to other websites and online sources;</li>
            <li style="list-style-type: circle;">Does not contain a solid content; or</li>
            <li style="list-style-type: circle;">Contains malware (e.g., viruses, worms, Trojan horses) or redirects to websites containing malware.</li>
        </ul>
        
        <p>By publishing any User-Generated Content, you acknowledge and agree that you will be solely responsible and liable for any claims, costs, expenses, liabilities, losses, and damages arising out or in connection with your User-Generated Content.</p>
        
        <p>The Company reserves the right, in our sole discretion, to modify, delete or remove any User-Generated Content which violates these Terms or which it considers, in its sole discretion, inappropriate.</p>
        
        <p class="w100"><strong><u>4. License to use the Website</u></strong></p>
        
        <p>The Company grants you a personal, revocable, non-exclusive, non-transferable, limited license to use the Website pursuant to these Terms.</p>
        
        <p><strong>License restrictions.</strong> Unless otherwise stated in these Terms, you are not allowed to:</p>
        <ul class="w100">
            <li style="list-style-type: circle;">Distribute Company’s Content and the User-Generated Content;</li>
            <li style="list-style-type: circle;">Copy Company’s Content and the User-Generated Content;</li>
            <li style="list-style-type: circle;">Disassemble, make alterations, decompile, reverse engineer, translate, adapt Company’s Content and the User-Generated Content; and</li>
            <li style="list-style-type: circle;">Distribute, rent, loan, use, lease or attempt to grant other rights to Company’s Content and the User-Generated Content to third parties.</li>
        </ul>
        
        <p><strong><u>5. Privacy</u></strong></p>
        <p>We respect your right to privacy. Therefore, we kindly request you to read our Privacy Policy available at http://3.86.198.118/ privacy, which explains our practices and procedures for collection and processing of your personal data through the Website. By using the Website, you hereby agree and acknowledge that you have read and agree with the Privacy Policy.</p>
        <p>Please note that, subject to the Privacy Policy, the Company may track your use of the Website and analyze what features of the Services you use.</p>
        <p class="w100"><strong><u>6. Availability</u></strong></p>
        <p>The Company puts reasonable efforts to ensure that the Website is always available to you. However, the availability of the Website may be affected by factors, which may be outside of Company’s reasonable control, e.g., bandwidth problems, equipment failure, or Force Majeure events. The Company takes no responsibility for the unavailability of the Website caused by such factors.</p>
        <p><strong><u>7. Third party links</u></strong></p>
        <p>The Website and the User-Generated Content may contain links to websites and online sources owned by third parties. The Company is not responsible in any manner for the content of such third-party websites and sources.</p>
        <p><strong><u>8. Disclaimer of warranties</u></strong></p>
        <p>To the extent permitted by the applicable law, the Company provides the Website and the Services on “as available”, “as is”, and “with all faults” basis. The Company does not make any representations or warranties about the reliability, suitability, and accuracy, for any purpose, of the Website and the Services. The Company hereby disclaims all warranties regarding the Website, its operation, and the Services.</p>
        <p><strong><u>9. Limitation of liability</u></strong></p>
        <p>Unless otherwise stated in the applicable law, the Company shall not be liable for any damages, including, but not limited to, incidental, punitive, special or other related damages arising out or in connection with the Website and the Services. You agree not to hold the Company liable to you in respect of any losses arising out of any event or events beyond Company’s reasonable control.</p>
        <p><strong><u>10. Indemnification</u></strong></p>
        <p>You agree to indemnify, defend and hold harmless the Company, its subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p>
        <p><strong><u>11. Severability</u></strong></p>
        <p>In the event that any provision of these Terms is determined to be unlawful, void or unenforceable, such a provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms. The validity and enforceability of the remaining provisions shall not be affected as a result.</p>
        <p><strong><u>12. Term and termination</u></strong></p>
        <p>The Terms enter into force on the Effective Date indicated at the top of the Terms and remain in force until terminated by the Company. The Company reserves the right, in its sole discretion, terminate the Terms at any time by sending you a message through the Website or an email. In addition, your rights under these Terms will be automatically terminated if you do not comply with any provision of these Terms. Upon termination of the Terms, all legal rights granted to you pursuant to the Terms will terminate and you shall stop using the Website.</p>
        <p class="w100"><strong><u>13. Breach of the Terms</u></strong></p>
        <p>If the Company believes, in its sole discretion, that you violate these Terms and it is appropriate, necessary or desirable to do so, the Company may:</p>
        <ul class="w100">
        <li style="list-style-type: circle;">Send you a formal warning;</li>
        <li style="list-style-type: circle;">Temporary suspend your user account on the Website;</li>
        <li style="list-style-type: circle;">Permanently prohibit the use of the Website and the Services;</li>
        <li style="list-style-type: circle;">Delete your user account; or</li>
        <li style="list-style-type: circle;">Commence a legal action against you.</li>
        </ul>
        <p><strong><u>14. Copyright policy</u></strong></p>
        <p>The Company respects intellectual property rights of others and expects the users of the Website to do the same. If required by the applicable law, we will respond to notices of alleged copyright infringement. If you believe that any content available on the Website constitutes a copyright infringement, please contact the Company without undue delay and provide the following information:</p>
        <ul class="">
        <li style="list-style-type: circle;">Identify with sufficient detail the copyrighted work that you believe has to been infringed;</li>
        <li style="list-style-type: circle;">Identify the material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit the Company to locate the material;</li>
        <li style="list-style-type: circle;">Provide us with information reasonably sufficient to permit us to contact the complaining party, such as an address, telephone number, and, if available, an email address at which the complaining party may be contacted;</li>
        <li style="list-style-type: circle;">Add the following statement: “I have a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law”;</li>
        <li style="list-style-type: circle;">Add the following statement: “I swear, under penalty of perjury, that the information in the notification is accurate, and that I am the copyright owner or am authorized to act on behalf of the owner of an exclusive right that is allegedly infringed”;</li>
        <li style="list-style-type: circle;">Sign the document; and</li>
        <li style="list-style-type: circle;">Send the document to the Company. The contact details of the Company are indicated in Section 17 “Contact information”.</li>
        </ul>
        <p><strong><u>15. Governing Law</u></strong></p>
        <p>The Terms shall be governed by the laws of the Netherlands. Unless submitted to an alternative dispute resolution body, all disputes arising out of or in connection with these Terms shall be resolved by the courts in The Hague, the Netherlands. The Company encourages resolving any eventual dispute through online alternative dispute resolution services.</p>
        <p><strong><u>16. Amendment of the Terms</u></strong></p>
        <p>We reserve the right to amend or modify these Terms from time to time by posting an amended version on the Website, indicating the date of the amendment, and informing you about the amendments by a notice through the Website or an email. In case you continue using the Website after such a date of amendment, you agree to the amendments of the Terms. Please note that it is your responsibility to read these Terms before starting using the Website and regularly review the Terms for any amendments.</p>
        <p><strong><u>17. Contact information</u></strong></p>
        <p class="w100">You can contact us by using the following contact details:</p>
        <ul class="w100">
        <li style="list-style-type: circle;">Company name: Digital Transformation Institute</li>
        <li style="list-style-type: circle;">Address: Heidestein 2, 3452LL, Vleuten, the Netherlands</li>
        <li style="list-style-type: circle;">Email address: <a href="mailto:legal@digital-transformation.institute" target="_blank" rel="noopener noreferrer">legal@digital-transformation.institute</a></li>
        </ul>
        </div>
    </div>
</div>
</body>
</html>

