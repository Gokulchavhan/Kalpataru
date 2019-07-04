<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<?php include("includes/k_p_header.php");?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
  $(function() {
    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true
    });
});
</script>
<style type="text/css">
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  background-color: #FAFAFA;
}

#login .container #login-row #login-column #login-box {
  margin-top: 50px;
  max-width: 600px;
  height: 525px;
  box-shadow: 5px 10px 18px #888888;
  background-color: #FFFFFF;
}

#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}

#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}

.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
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
            
            <div style="margin-top: 20px;">
              <center>
              <img class="logo-dark hidden-xs"  src="images/logo.png" alt="" /> <img class="logo-dark hidden-lg hidden-md hidden-sm"  src="images/logo.png" alt="" />
              </center>
            </div>
            <div style="margin-bottom: 20px;">
              <center>
              <p style="font-size: 18px; color: #212121" >Your Home Services Expart</p>
              <small>Quick, Affordable, Trusted</small>
              </center>
            </div>
            <center>

<?php display_message(); ?>
<?php email_reg(); ?>

            </center>
            <form id="login-form" class="form" action="" method="post" autocomplete="off">
              
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" class="form-control" name="firstname" placeholder="First name">
                  </div>
                </div>
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" class="form-control" name="lastname" placeholder="Last name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <select class=" md-form" name="gender" style="border: none; border-bottom: 1px solid #ced4da; width:100%;  ">
                      <option value="0"  selected disabled>Select Gender</option>

<?php
$sqlG = "SELECT * FROM gender WHERE status = 0 ORDER by id ASC";
$resultG = (query($sqlG));

while ($rowG = mysqli_fetch_array($resultG))
  {
  $id = $rowG['id'];
  $gender = $rowG['gender'];
  echo " <option value='$id'>$gender</option></a></li>";
  }

?>

                      
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="birthday" id="datepicker" class="form-control" placeholder="Select Birthday" style="margin-top:5px;">
                  </div>
                </div>
              </div>
              <div class="md-form">
                <input type="email" name="email" id="form1" class="form-control" placeholder="Email address" style="margin-top:-25px;">
              </div>
              <div class="md-form">
                <select class=" md-form" name="city" style="border: none; border-bottom: 1px solid #ced4da; width:100%;   ">
                  <option value="0"  selected disabled>Where are you from ?</option>
                    

<?php
$sql = "SELECT * FROM city WHERE status = 0 ORDER by city_name ASC";
$result = (query($sql));

while ($row = mysqli_fetch_array($result))
  {
  $Cid = $row['id'];
  $CName = $row['city_name'];
  echo "<option value='$Cid'> $CName </option></a></li>";
  }

?>
                </select>
              </div>
              <div class="md-form">
                <input type="password" name="password" id="password-field" class="form-control" placeholder="Password">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="md-form">
                <input type="password" name="conf_password" id="form1" class="form-control" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                <input  type=submit name="cancel"  value="Cancel" class="btn purple-gradient btn-lg pull-left" >
                <input  type="submit" name="submit_reg"  value="Continue" class="btn aqua-gradient btn-lg pull-right" >
              </div>
              <input type="hidden" class="hide" name="token" id="token" value="<?php echo token_generator(); ?>">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/owlcarousel/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.mdb-select').materialSelect();
});
</script>


<script type="text/javascript">
$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
</script>