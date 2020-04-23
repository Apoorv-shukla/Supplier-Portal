<!doctype html>
<html>
<head>
<meta charset="utf-8">
	
<title>Privacy - Intelligent World</title>

	
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
                    <h2 class="title">PRIVACY POLICY</h2>
                    <ul>
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12">
            <p><strong><u>1. General information</u></strong></p>
            <p>This privacy policy (the “Privacy Policy”) explains the policies and procedures governing the processing of individual user’s (“you” and “your”) personal data through the website <a href="<?php echo base_url(); ?>"><?php echo base_url();?></a>,other Intelligent World and Digital Transformation Institute sites and the related services (collectively, the “Website”).</p>
            <p>For the purposes of this Privacy Policy, the term “personal data” refers to any information relating to a natural person who can be identified, directly or indirectly, by using such information and the term “processing” refers to collecting, storing, deleting, using, disclosing, and transferring of your personal data.</p>
            <p><strong>Responsible entity (data controller).</strong></p>
            <p>The legal entity responsible for collection and processing of your personal data is Digital Transformation Institute, having a principal place of business at Heidestein 2, 3452LL, Vleuten, the Netherlands (“we” and “us”).</p>
            <p><strong>About the Website.</strong></p>
            <p>The Website provides access to a database containing Internet-based live and recorded educational content (e.g., videos, webinars, articles, video articles, and whitepapers) of educational nature from leading business experts (the “Services”).</p>
            <p><strong>Term and termination.</strong></p>
            <p>The version of the Privacy Policy enters into force on the effective date indicated at the top of the Privacy Policy and remains valid until terminated or updated by us.</p>
            <p>By using the Website, you acknowledge that you have read this Privacy Policy and you agree to be bound by it. If you do not understand some parts of the Privacy Policy or do not agree with one or more provisions of this Privacy Policy, please do not use the Website.</p>
            <p><strong><u>2. Collection and processing of personal data</u></strong><br>
            <strong>2.1 What personal data we collect</strong></p>
            <p>We adhere to data minimization principles and collect only a minimal amount of personal data that is necessary for ensuring your usage of all features of the Website and the provision of the Services. We collect your personal data in several instances that are described below.</p>
            <p><strong>Personal data that we obtain from you directly.</strong></p>
            <p>We collect personal data that you submit to us directly.</p>
            <p>– When you register a user account on the Website, we collect your:</p>
            <p>– First and last name;</p>
            <p>– Email address;</p>
            <p>– Phone number;</p>
            <p>– Address (optional);</p>
            <p>– Company name (optional);</p>
            <p>– Your role in the company (optional); and</p>
            <p>– Any other information you decide to provide us voluntarily.</p>
            <p>– When you use the Services, register for events though the Website, or submit requests on the Website, we collect:</p>
            <p>– Registration data (as defined above);</p>
            <p>– Information about the Services used by you; and</p>
            <p>– Information about the events that you register for.</p>
            <p>– When you contact us through the chat functionality available on the Website, we will collect your:</p>
            <p>– Name; and</p>
            <p>– Information that you decide to provide us in your message.</p>
            <p>– When you submit any user content through the Website, we collect the personal data that may be made available in that content.</p>
            <p>– When you visit the Website, we collect your IP address.</p>
            <p><strong>Personal data obtained from third parties.</strong></p>
            <p>We may receive your personal data from third parties, such as our affiliates, service providers, social media websites, and other publicly available sources. Please note that your personal data will be obtained only in compliance with the applicable data protection laws, the terms and conditions of the respective third party, and your individual privacy settings. For example, when you access the Website or use the Services through your social media account (e.g., Twitter, LinkedIn, Instagram, Facebook, and YouTube), we collect the personal data that you authorize your social media provider to make available to us (e.g., your public social media profile).</p>
            <p><strong>Sensitive data.</strong></p>
            <p>Please note that we DO NOT collect any sensitive data about you (e.g., your health information, opinion about your religious and political beliefs, racial origins, sexual orientation, and memberships in professional or trade associations), unless you, at your sole discretion, decide to make such sensitive data available to us (e.g., though the chat functionality available on the Website).</p>
            <p><strong>2.2 Purposes of collection and processing of personal data</strong></p>
            <p>We respect strictest data protection principles. Thus, we collect and process your personal data only for specified, explicit, and legitimate purposes. The purposes for which your personal data is used and the legal basis on which we rely are specified in the table below.</p>
            <p><strong><u>3. Collection and processing of non-personal data</u></strong></p>
            <p>When you visit the Website and use the Services, we may collect certain technical non-personal data. Non-personal data does not allow us to identify you in any manner. In case your non-personal data is aggregated with certain elements of your personal data in the way that allows us to identify you, we will treat such aggregated data as personal data.</p>
            <p><strong>3.1 What non-personal data we collect</strong></p>
            <p>The non-personal data collected by us includes:</p>
            <ul class="">
            <li style="list-style-type: circle;">Your traffic analytics data (e.g., the websites and promotional campaigns from which you access the Website, browser types, operating systems, and the URL addresses of websites clicked to and from the Website);</li>
            <li style="list-style-type: circle;">Your behavior data (e.g., information about which content of the Website and the Services you react to by using your social media functionalities, such as “liking”, sharing, and commenting); and</li>
            <li style="list-style-type: circle;">The sector you work in.</li>
            </ul>
            <p><strong>3.2 Purposes of collection and processing of non-personal data</strong></p>
            <p>We collect your non-personal data for:</p>
            <ul class="">
            <li style="list-style-type: circle;">Analyzing what kind of users visit the Website and use the Services;</li>
            <li style="list-style-type: circle;">Identifying the channels though which the Website and the Services are accessed and used;</li>
            <li style="list-style-type: circle;">Examining the relevance, popularity and engagement rate with regard to the content available on the Website and the Services; and</li>
            <li style="list-style-type: circle;">Personalizing the content of the Website and the Services to your specific needs.</li>
            </ul>
            <p><strong><u>4. Marketing communication</u></strong></p>
            <p>We will send you direct marketing communications, including newsletters, brochures, promotions, and advertisements, send you messages through your social media account, or contact you by any other means with the aim to offer you our Services only if you provide us with your contact details and a prior explicit consent to receive such marketing communications. Please note that we will send you marketing-related messages through your social media account only if (i) we are authorized by the social media provider, (ii) your individual privacy settings allow us to do so, (iii) you have provided your consent to the social media provider or to us directly to receive such messages, and (iv) it is in compliance with applicable data protection laws.</p>
            <p><strong>Opt-out from marketing communication.</strong></p>
            <p>If you have provided us with your consent to receive direct marketing communication and, at some point, you would like to stop receiving such communication, you can easily opt-out by:</p>
            <ul class="" data-bold="inherit" data-writefull-timeout="null">
            <li style="list-style-type: circle;">&nbsp;Clicking on the “unsubscribe” link contained in any of online marketing communications submitted to you; or</li>
            <li style="list-style-type: circle;">&nbsp;Contacting us directly by email at&nbsp;<a href="mailto:legal@digital-transformation.institute">legal@digital-transformation.institute</a>.</li>
            </ul>
            <p class="w100"><strong>Informational notices.</strong></p>
            <p>Please note that the following communications sent by us do not fall within the scope of direct marketing communication that requires your explicit consent: (i) information about our new Services that are closely relate to the Services already used by you; and (ii) informational notices regarding the Services used by you, the Website, your privacy and security, and other important matters that are send on the “if-needed” basis.</p>
            <p><strong><u>5. Consent</u></strong></p>
            <p><strong><u>​</u></strong></p>
            <p>By using the Website and/or providing your explicit consent to the Privacy Policy, you are consenting to our processing of your personal and non-personal data as set forth in this Privacy Policy.</p>
            <p>Should we intend to (i) collect any sensitive data from you, (ii) provide you with any marketing communication, (iii) use your personal and non-personal data for the purposes not indicated in this Privacy Policy, (iv) transfer your personal data to third parties not indicated in this Privacy Policy, or (v) significantly amend this Privacy Policy, we will seek your explicit consent in advance for the particular purpose.</p>
            <p><strong><u>6. Children</u></strong></p>
            <p>The Website is not marketed and cannot be accessed and used by persons under the age of 18. Although we put reasonable efforts to prevent minors from using the Website, we cannot distinguish the age of people accessing the Website. If a person under the age of 18 has provided us with personal data without obtaining parental or guardian consent in advance, the parent or guardian may contact us requesting us to destroy the personal data. Our contact details are specified in Section 14 “Contact information” of this Privacy Policy.</p>
            <p><strong><u>7. Protection of personal data</u></strong></p>
            <p>We put reasonable efforts to ensure the security of your personal data. We implement organizational and technical information security tools to protect your personal data, such as secured networks, encryption, and limited access to your personal data.</p>
            <p>However, due to the inherent risks of the Internet, we cannot be liable for any unlawful destruction, loss, use, copying, modification, leakage, and falsification of your personal data caused by circumstances beyond our reasonable control.</p>
            <p>In order to ensure the security of your personal data, we kindly ask you to keep your registration details in a secure and confidential manner and use the Website and the Services only though a secure network.</p>
            <p><strong>Security breaches.</strong></p>
            <p>In case a personal data breach occurs, we will inform the relevant data protection authorities without undue delay and immediately take reasonable measures to mitigate the breach, as stipulated in the applicable law.</p>
            <p><strong><u>8. Retention period</u></strong></p>
            <p>We will keep your personal data in our systems only for as long as such personal data is required for the purposes indicated in Section 2.2 of this Privacy Policy. After your personal data is no longer necessary for the indicated purposes, we will delete your personal data from our systems immediately.</p>
            <p>However, please note that, in certain cases, we may be required by law to retain your personal data for a certain period of time (e.g., for maintaining our accountancy records). In such cases, we will store your personal data for the time period stipulated by the applicable law.</p>
            <p><strong><u>9. Disclosure and transfer of your personal data</u></strong><br>
            <strong>9.1 Disclosure of personal data to third parties</strong></p>
            <p>In certain situations, on a case-by-case basis, we may disclose your personal data to third parties. Such a disclosure is limited to the situations when the personal data is required for the following purposes:</p>
            <ul class="">
            <li style="list-style-type: none;">
            <ul class="">
            <li style="list-style-type: circle;">Ensuring the operation of the Website;</li>
            <li style="list-style-type: circle;">Ensuring the provision of the Services requested by you;</li>
            </ul>
            </li>
            </ul>
            <p class="w100">Pursuing our legitimate interests;</p>
            <ul>
            <li style="list-style-type: circle;">Carrying out our contractual obligations to our clients;</li>
            <li style="list-style-type: circle;">Law enforcement purposes; or</li>
            <li style="list-style-type: circle;">If you provide your prior explicit consent.</li>
            </ul>
            <p>&nbsp;</p>
            <p>Your personal data may be disclosed to third parties that provide professional, technical, and other types of support to us, including:</p>
            <ul class="">
            <li style="list-style-type: circle;">Our independent contractors;</li>
            <li style="list-style-type: circle;">Our clients that order the Services;</li>
            <li style="list-style-type: circle;">Our web developing partners, such as Beyond Vision;</li>
            <li style="list-style-type: circle;">Our hosting and data storage providers, such as Salesforce.com, Virmacch, Godaddy.com, Clickfunnels.com, Upviral.com, Profitserver, sendible, Google.com, Audiense, Manageflitter;</li>
            <li style="list-style-type: circle;">Our user information logistics providers, such as Salesforce, Google, Exact, Zoom;</li>
            <li style="list-style-type: circle;">Our marketing partners, such as Google, Facebook, Twitter, Linkedin;</li>
            <li style="list-style-type: circle;">Our newsletter and mailing service providers, such as Salesforce.com;</li>
            <li style="list-style-type: circle;">Our web video streaming service providers, such as Youtube, Google; and</li>
            <li style="list-style-type: circle;">Other third parties who assist us in operating the Website, providing the Services, and conducting our business. Benefit: Our products are delivered immediately</li>
            </ul>
            <p>The third parties listed above will access your personal data as a part of their partnership with us and only if they agree to ensure an adequate level of protection of personal data that is consistent with this Privacy Policy.</p>
            <p><strong>9.2 Transfer of personal data outside EEA</strong></p>
            <p>Please note that some third parties listed above may be located outside the EEA and we may need to transfer your personal data to the jurisdictions located outside the EEA. In case it is necessary to make such a transfer, we will make sure that the jurisdiction in which the recipient third party is located ensures an adequate level of protection of your personal data or we conclude an agreement with the respective third party that ensures such protection.</p>
            <p><strong>9.3 Other third parties</strong></p>
            <p class="w100">We do not sell, trade, or transfer to third parties not indicated in this Privacy Policy your personal data, unless we obtain your prior explicit consent to do so.</p>
            <p>We are not responsible for actions of other third parties that are not mentioned in this Privacy Policy, with whom you share your personal data, and we have no authority to manage or control third party solicitations.</p>
            <p><strong><u>10. Your rights regarding your personal data</u></strong></p>
            <p>We provide you with the possibility to exercise the following rights regarding your personal data:</p>
            <ul class="">
            <li style="list-style-type: circle;"><strong>The right to access, rectification, portability, and erasure of personal data.</strong>&nbsp;You can ask us to access, modify, move, or delete your personal data. We may ask you to provide us with an identifying piece of data, so that we would be able to identify you in our system.</li>
            <li style="list-style-type: circle;"><strong>The right to object and restrict processing.</strong>&nbsp;You can ask us to object or restrict the processing of your personal data (e.g., stop sending you marketing communication).</li>
            <li style="list-style-type: circle;"><strong>The right to withdraw consent.</strong>&nbsp;If you have provided us with your explicit consent, you have the right to withdraw such consent at any time.</li>
            <li style="list-style-type: circle;"><strong>The right to launch a complaint.</strong> If you would like to launch a complaint about the way in which your personal data is handled, please contact us first. After you contact us, we will send you a confirmation that we have received your complaint. Afterwards, we will investigate your complaint and provide you with our response within a reasonable timeframe but no later than 2 weeks. If you are a resident of the EU and you are not satisfied with the outcome of your complaint, you have the right to lodge a complaint with your local data protection authority.</li>
            </ul>
            <p>If you would like to exercise your rights listed above, please contact us by email at <a href="mailto:legal@digital-transformation.institute">legal@digital-transformation.institute</a>. We will answer your request within a reasonable timeframe but no later than two weeks.</p>
            <p><strong><u>11. Third-party applications and links</u></strong></p>
            <p>The Website contains links to the websites owned and operated by third parties (e.g., social network providers). The Website may also use applications enabled by third parties (e.g., Facebook registration forms). We are not responsible for the privacy and security practices of those third-party websites and applications and this Privacy Policy does not apply to any of such websites and applications. Please note that it is your sole responsibility to familiarize with the terms and conditions governing such third-party websites and reading the applicable privacy policies before providing your personal data thereto.</p>
            <p><strong><u>12. Cookies</u></strong></p>
            <p>The Website uses cookies. By using the Website, you agree to our use of cookies as described in this Privacy Policy. If you do not agree to our use of cookies, you need to either discontinue your use of the Website or set your browser to refuse cookies. Please be aware that some parts of the Website may not function properly and some Services may not be available without cookies.</p>
            <p><strong>12.1 What are cookies?</strong></p>
            <p>A cookie is a small computer file, typically consisting of letters and numbers. When you visit a website, the website may send a cookie to your browser. Subsequently, the browser may store the cookie on your computer system. The main purpose of cookies is to allow a website to recognize user’s device. There are two types of cookies, namely, persistent cookies and session cookies. Persistent cookies remain valid until their expiration date, unless deleted by the user before that date. Session cookies will be stored on a web browser and will remain valid until the moment when the browser is closed. Cookies do not typically contain personal data. Web servers can use cookies to identify and track users while they navigate through different pages on a website or identify users returning to a website.</p>
            <p><strong>12.2 What cookies do we use?</strong></p>
            <p>When you visit the Website, we use session cookies, which allow you to use the full functionality of the Website. Session cookies are used in order to verify your details until you are navigating from page to page on the Website. The session cookies enable you to avoid re-entering your details each time you enter a new page on the Website.</p>
            <p>When you register a user account on the Website, we use persistent cookies, such as retargeting cookies, login cookies, and functional cookies. We use persistent cookies in order to recognize you as a unique user when you return to the Website. As a result, you do not have to enter your login details multiple times as you move from other websites to the Website. Also, retargeting cookies may be used to serve you advertisements on the basis of your user traffic of the Website and other websites online.</p>
            <p>We will not use cookies for purposes, which are not mentioned in this Privacy Policy.</p>
            <p class="w100"><strong>12.3 How to refuse cookies?</strong></p>
            <p>If you would like to refuse our use of cookies, you can do so by checking your browser’s “help” information or visiting&nbsp;<a href="http://www.whatarecookies.com/" target="_self" rel="noopener noreferrer">http://www.whatarecookies.com</a>&nbsp;for further information.</p>
            <p><strong>12.4 Google Analytics</strong></p>
            <p>We use Google Analytics to analyze your use of the Website and the Services. Google Analytics generates statistical and other information by means of cookies and we use its services to create reports about the use of the Website and the Services and to collect data via advertising cookies and identifiers. We use the following Google Analytics features: (1) Remarketing with Google Analytics; (2) Google Display Network Impression Reporting; (3) Google Analytics Demographics and Interest Reporting; and (4) Integrated services that require Google Analytics.</p>
            <p>If you would like to opt out from Google Analytics features, you can do so through Ad Settings, Ad Settings for mobile apps, or any other available means (for example, the NAI’s consumer opt-out). You can also install a Google Analytics opt-out browser add-on available at&nbsp;<a href="https://tools.google.com/dlpage/gaoptout?hl=en" target="_self" rel="noopener noreferrer">https://tools.google.com/dlpage/gaoptout?hl=en</a>.</p>
            <p><strong><u>13. Amendment of the Privacy Policy</u></strong></p>
            <p>The Privacy Policy may be amended from time to time. The amended Privacy Policy will be posted on this page and the date of the last amendment will be indicated therein. We encourage you to review the Privacy Policy regularly. If you continue using the Website after the date of the last amendment, your usage of the Website will constitute your acknowledgment of the amendments and your consent to abide and be bound by the amended Privacy Policy. For significant changes in the Privacy Policy, or where required by the applicable law, we may seek your explicit consent to the changes stated in the Privacy Policy.</p>
            <p><strong>Date of last amendment.</strong>&nbsp;This Privacy Policy was last amended on 25th of May 2018.</p>
            <p class="w100"><strong><u>14. Contact information</u></strong></p>
            <p class="w100">You can contact us by using the following contact details:</p>
            <ul class="">
            <li style="list-style-type: circle;">&nbsp;<strong>Company name:&nbsp;</strong>Digital Transformation Institute</li>
            <li style="list-style-type: circle;"><strong>&nbsp;</strong><strong>Address:&nbsp;</strong>Heidestein 2, 3452LL, Vleuten, the Netherlands</li>
            <li style="list-style-type: circle;"><strong>&nbsp;Email address:&nbsp;</strong><a href="mailto:legal@digital-transformation.institute">legal@digital-transformation.institute</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>

