<?php include("includes/k_p_header.php"); ?>

<?php 
if (logged_in_KP()) {
   redirect("index.php");
}
 ?>
<style type="text/css">
  .authfy-login {
    position: relative;
    top: 0;
    left: 0;
    overflow: hidden;
    margin-bottom: 30px;
}
</style>
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
          
          <div class="authfy-panel panel-login text-center active">
            <div class="authfy-heading">
               <center>
                    <img class="logo-dark hidden-xs"  src="images/logo.png" alt="" />
                  </center>
              <h3 >Login to your account</h3>
              <p>Don’t have an account? <a class="" data-panel="" href="k_p_signup.php">Sign Up Free!</a></p>
              <div>
<?php display_message(); ?>
<?php validate_user_login(); ?>
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <form name="loginForm" class="loginForm" action="#" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control email" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <div class="pwdMask">
                      <input type="password" class="form-control password" name="password" placeholder="Password">
                      <span class="fa fa-eye-slash pwd-toggle"></span>
                    </div>
                  </div>
                  
                  <div class="row remember-row">
                    <div class="col-xs-6 col-sm-6">
                      <label class="checkbox text-left">
                        <input type="checkbox" name="remember" value="remember-me">
                        <span class="label-text">Remember me</span>
                      </label>
                    </div>
                    <div class="col-xs-6 col-sm-6">
                      <p class="forgotPwd">
                        <a class="" data-panel="" href="k_p_recover.php">Forgot password?</a>
                      </p>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" name="signIn" type="submit">Login with email</button>
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