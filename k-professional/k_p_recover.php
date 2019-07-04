<?php include("includes/k_p_header.php"); ?>

<?php 
if (logged_in_KP()) {
   redirect("index.php");
}
 ?>


<link  rel="stylesheet" href="css/login3-style.css">
<body>
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
                    <center>Recover your password</center>
                  </h3>
                  <p><center>
                    Fill in your e-mail address below and we will send you an email with further instructions.
                  </center></p>
                  <div class="text-center">
<?php display_message(); ?>
<?php recover_password(); ?>
                  </div>
                </div>
                
                <form name="forgetForm" class="forgetForm" action="#" method="POST">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email address">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" name="reset" type="submit">Recover your password</button>
                  </div>
                  <div class="form-group">
                    <a class="" data-panel="" href="k_p_login.php">Already have an account?</a>
                  </div>
                  <input type="hidden" class="hide" name="token" id="token" value="<?php echo token_generator(); ?>">
                  <div class="form-group">
                    <a class="" data-panel="" href="k_p_signup.php">Don’t have an account?</a>
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owlcarousel/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>