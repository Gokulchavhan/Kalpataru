<?php include("includes/header.php"); ?>

<?php

if (isset($_SESSION['mobile']))
	{
	$sql = "SELECT * FROM users WHERE mobile_no ='$_SESSION[mobile]'";
	$result = query($sql);
	confirm($result);
	$row = fetch_array($result);
	$email = $row['email'];
	$fullname = $row['fullname'];
	}

?>

<link href="css/style_mdb.css" rel="stylesheet">
<link href="css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<body style="background-color: rgba(77,77,77,.5);">
	<div class="container" >
		<div class="row" >
			<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
				<div class="well profile" style="margin-top: 95px; margin-bottom: 95px; background-color: white;">
					
					<div style="margin-top: 10px;">
						<center>
						<img class="logo-dark hidden-xs"  src="images/logo.png" alt="" /> <img class="logo-dark hidden-lg hidden-md hidden-sm"  src="images/logo.png" alt="" />
						</center>
					</div>
					<div>
						<center>
						<p style="font-size: 18px; color: #212121" >Your Home Services Expart</p>
						<small>Quick, Affordable, Trusted</small>
						<h2 style="font-weight: bold; margin-bottom: 40px;">My Profile</h2>
						</center>
					</div>
					<div style="padding-right: 80px; padding-left: 80px; padding-bottom: 50px;"  >
						<form method="post" action="" autocomplete="off">
							<div class="md-form form-group mt-5">
								<i class="fas fa-user prefix"></i>
								<input type="text" class="form-control" name="fullname" id="formGroupExampleInputMD" disabled value="<?php echo $fullname; ?>">
							</div>
							<div class="md-form form-group mt-5">
								<i class="fas fa-envelope prefix"></i>
								<input type="email" class="form-control" name="email" id="formGroupExampleInputMD" disabled value="<?php echo $email; ?>">
							</div>
							<div class="md-form">
								<i class="fas fa-mobile prefix"></i>
								<input type="text" id="inputDisabledEx" name="mobileNumber" class="form-control" value="+91 <?php print_r($_SESSION['mobile']); ?>" disabled>
							</div>
						<!-- 	<button type="button" class="btn aqua-gradient btn-lg  pull-right" data-toggle="modal" data-target="#myModal">Change Password</button> -->
							<a class="btn purple-gradient btn-lg pull-left" href="index.php" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
							<input type="hidden" class="hide" name="token_email" id="token_email" value="<?php echo token_email_generator(); ?>">
						</form>
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
								
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header" style="background-color: #3987EA; color: white;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><center>Change Your Password</center></h4>
									</div>
									<form method="POST" action="?">
										<div class="modal-body">
											<div class="md-form form-group mt-5">
												
												<input type="password" class="form-control" name="fullname" id="formGroupExampleInputMD" value="" placeholder="Current password">
											</div>
											<div class="md-form form-group mt-5">
												
												<input type="password" class="form-control" name="fullname" id="formGroupExampleInputMD" value="" placeholder="New password">
											</div>
											<div class="md-form form-group mt-5">
												
												<input type="password" class="form-control" name="fullname" id="formGroupExampleInputMD"  value="" placeholder="Confirm password">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default btn-lg pull-left" data-dismiss="modal">Close</button>
											<button type="submit" name="submit" class="btn btn-info btn-lg pull-right" data-dismiss="modal">Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>
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