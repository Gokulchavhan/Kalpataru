<?php include("includes/k_p_header.php"); ?>

<?php 
if (logged_in_KP()) {
   redirect("index.php");
}
 ?>
<body>
<link  rel="stylesheet" href="css/login3-style.css">
<div class="row" style="margin-top: 0px;">
  <div class="col-sm-6 col-sm-offset-3">
    
    
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="authfy-container col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
      <div class="col-sm-5 ">
        
      </div>
      <div class="col-sm-8 col-sm-offset-2 authfy-panel-right">
        <div class="authfy-login">
          <div class="authfy-panel panel-forgot">
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="authfy-heading">
                	  <center>
                  	<img class="logo-dark hidden-xs"  src="images/logo.png" alt="" />
                  </center>
                  <h3>
                  	<center>Enter OTP</center>
                  </h3>
                
                  <p style="margin-top: 20px;"><center>Cheack your email for OTP</center></p>

                  <div class="text-center">

	<?php display_message(); ?>
						<?php validate_code(); ?>


                  </div>
                </div>
                
                <form name="forgetForm" class="forgetForm" action="#" method="POST" autocomplete="off">
                  <div class="form-group">
                    <input type="password" class="form-control" style="text-align: center;" name="code" placeholder="One Time Password">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" name="code-submit" type="submit">Submit</button>
                  </div>
                 <input type="text" class="" name="token" id="token" value="">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owlcarousel/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>