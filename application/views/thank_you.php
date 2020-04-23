<!doctype html>
<html>
<head>
<meta charset="utf-8">
	
<title>Thank You - Intelligent World</title>

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="Stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/stylesheet.css">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	

</head>
<body>
    <?php 
    $arr = explode('?',$_SERVER['REQUEST_URI']);
    $url = explode('&',$arr[1]);
    $final_url = base_url().'purchaseddetail?'.$url[1].'&'.$url[0];
    header( "refresh:1;'".$final_url."'" );?>
<!-- header -->
	<header class="sticky-top">
			<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white bx-shdw ptb20">
				<div class="container">
			      <a class="navbar-brand" href="<?php echo base_url(); ?>">
			      	<img src="<?php echo base_url(); ?>assets/images/logo.png">
			      </a>
			</nav>
	</header>
<!-- header -->

<div class="thankyouWrapper">
    <div class="thank-container">
        <div class="thank-header">
          <img src="<?php echo base_url();?>assets/images/thank-you.jpg" alt="Thank You" width="300px">
        </div>
        <div class="thank-content">
            <p>Your payment is sucessful. Now you can access the course you have purchased !</p>
        </div>
    </div>
</div>
</body>
</html>

