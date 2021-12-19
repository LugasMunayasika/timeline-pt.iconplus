<!doctype html>
<html lang="en">
  <head>
  	<title>Login | Timeline</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="d-flex fa  justify-content-center">
				 	 <img src="<?= base_url('assets'); ?>/images/icon3.png" class="img-fluid" alt="logo">
		      	</div>
            <section class="login_content ">
            <form method="post" action="<?php echo base_url() ?>login/dologin">
              <?php
                $announce = $this->session->flashdata('announce');
                if(!empty($announce)){
                  echo '
                    <div class="alert alert-danger">
                    '.$announce.' 
                    </div>
                  ';
                }
              ?>
			  <br>
		      	<h3 class="text-center mb-4">Login Timeline ICON+</h3>
						<form action="#" class="login-form">
		      		<div class="form-group">
              		<input type="text" class="form-control rounded-left" name="username" autocomplete= "off" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
              <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
	            </div>
	            <div class="form-group">
              <div>
                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" value="Login">Login</button>
                <!-- <input type="submit" name="login" class="btn btn-warning submit pull-right" value="Login" /> -->
              </div> <br>
	          </form>
			  <div>
				<a href="https://api.whatsapp.com/send?phone=085270047977" class="text-center mb-2">Lupa password? </a>
			  </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url() ?>assets/login/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/login/js/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/login/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/login/js/main.js"></script>

	</body>
</html>

