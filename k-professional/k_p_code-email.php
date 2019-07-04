<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<?php include("includes/k_p_header.php");?>
<style type="text/css">
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  background-color: #FAFAFA;
}

#login .container #login-row #login-column #login-box {
  margin-top: 140px;
  max-width: 600px;
  height: 350px;
  box-shadow: 5px 10px 18px #888888;
  background-color: #FFFFFF;
}

#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}

#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
<link href="css/style_mdb.css" rel="stylesheet">
<link href="css/mdb.min.css" rel="stylesheet">
<body>
  <div id="login">
    
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            
            <div style="margin-top: 40px;">
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
            <center>
            <p style="color:#030002;"> <strong>OTP send on <?php print_r($_SESSION['kp_email']); ?></strong></p>
            </center>
            <center>
<?php email_otp_validation(); ?>
<?php display_message(); ?>
            </center>
            <form id="login-form" class="form" action="" method="post" autocomplete="off">
              <div class="md-form">
                <input type="password" style="text-align: center;" name="email_otp" id="form1" class="form-control" placeholder="Enter OTP">
              </div>
              <div class="form-group">
                <input  type=submit name="cancel"  value="Cancel" class="btn purple-gradient btn-lg pull-left" >
                <input  type="submit" name="submit_otp"  value="Continue" class="btn aqua-gradient btn-lg pull-right" >
              </div>
              <input type="hidden" class="hide" name="token" id="token" value="">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $('.mdb-select').materialSelect();
});
</script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owlcarousel/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>