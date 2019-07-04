<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<?php include("includes/k_p_header.php");?>
<?php
if (logged_in_KP()) {
redirect("k_p_errors.php");
}
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

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

select {
  font-family: inherit;
  background-color: transparent;
  width: 100%;
  padding: $select-padding 0;
  font-size: $select-font-size;
  color: $select-color;
  border: none;
  border-bottom: 1px solid $select-border-color;
}

select:focus {
  outline: none
}

.mdl-selectfield label {
  display: none;
}

.mdl-selectfield select {
  appearance: none
}

.mdl-selectfield {
  font-family: 'Roboto', 'Helvetica', 'Arial', sans-serif;
  position: relative;
  &:after {
    position: absolute;
    top: 0.75em;
    right: 0.5em;
    width: 0;
    height: 0;
    padding: 0;
    content: '';
    border-left: .25em solid transparent;
    border-right: .25em solid transparent;
    border-top: .375em solid $select-border-color;
    pointer-events: none;
  }
}

body {
  padding: 20px;
  background: #fafafa;
  font-family: 'Roboto', 'Helvetica', 'Arial', sans-serif;
}

.demo {
  width: 200px;
  padding: 20px;
  margin: 0 auto;
  top: 50%;
  margin-top: -2em;
  position: absolute;
  right: 0;
  left: 0;
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
            <div >
              <center>
              <p style="font-size: 18px; color: #212121" >Your Home Services Expart</p>
              <small>Quick, Affordable, Trusted</small>
              </center>
            </div>
            <center>
<?php SignUp(); ?>
<?php display_message(); ?>
            </center>
            <div style="">
              <form id="login-form" class="form" action="" autocomplete="off" method="post" >
                <div class="md-form">
                  <input type="text" name="mobile_no" id="form1" class="form-control" placeholder="Enter mobile number" >
                </div>
                <div class="md-form">
                  <select name="options" class=" md-form"  style="border: none; border-bottom: 1px solid #ced4da; width:100%;   ">
                    <option value="0" selected disabled>Choose your service</option>
                      

<?php
$sql = "SELECT * FROM services WHERE status = 0 AND city_status = 0 ORDER by name ASC";
$result = (query($sql));

while ($row = mysqli_fetch_array($result))
  {
  $id = $row["id"];
  $name = $row["name"];
  echo "<option value='$id'> $name</option></a></li>";
  }

?>
                  </select>
                </div>
                <div class="form-group">
                  <input  type=submit name="cancel"  value="Cancel" class="btn purple-gradient btn-lg pull-left" >
                  <input  type="submit" name="submit_inputs"  value="Continue" class="btn aqua-gradient btn-lg pull-right" >
                </div>
                <input type="hidden" class="hide" name="token" id="token" value="<?php echo token_generator(); ?>">
              </form>
            </div>
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