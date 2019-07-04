<?php include("includes/header.php"); ?>
<?php
	if (loggedIn()) {
		redirect("index.php");
	}
 ?>
<link href="css/style_mdb.css" rel="stylesheet">
<link href="css/mdb.min.css" rel="stylesheet">
<body style="background-color: rgba(77,77,77,.5);">
	<div class="container" >
		<div class="row" >
			<div class="well profile col-md-offset-3 col-md-6" style="margin-top: 160px; margin-bottom: 95px; background-color: white;">
				<div class="col-md-10 col-md-offset-1"  >

<?php VerifyOtp(); ?>
<?php display_message(); ?>

					<div style="margin-top: 26px;">
						<center>
						<img class="logo-dark hidden-xs"  src="images/logo.png" alt="" /> <img class="logo-dark hidden-lg hidden-md hidden-sm"  src="images/logo.png" alt="" />
						</center>
					</div>
					<div>
						<center>
						<p style="font-size: 18px; color: #212121" >Your Home Services Expart</p>
						<small>Quick, Affordable, Trusted</small>
						</center>
					</div>
					<div style="margin-bottom:100px;">
						<center>
						<p style="color:#030002;"> <strong>OTP send on <?php print_r($_SESSION['mobileNumber']); ?></strong> <a href="login.php">Edit</a></p>
						</center>
						<form method="post" action="" >
							<div style="margin-bottom:20px; margin-top:40px;">
								<div class="md-form">
									<input type="password" style="text-align: center;" name="otp_code"  id="form1" class="form-control" placeholder="Enter OTP">
								</div>
							</div>
							<center >
							<input  type=submit name="cancel"  value="Cancel" class="btn purple-gradient btn-lg pull-left" >
							<input  type="submit" name="otp_submit"  value="Continue" class="btn aqua-gradient btn-lg pull-right" >
							</center>
							<input type="hidden" class="hide" name="token" id="token" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owlcarousel/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>