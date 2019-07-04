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
  margin-top: 5px;
  max-width: 600px;
  height: 625px;
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
            <div style="margin-top: 25px;">
              <center>
              <img class="logo-dark hidden-xs"  src="images/logo.png" alt="" /> <img class="logo-dark hidden-lg hidden-md hidden-sm"  src="images/logo.png" alt="" />
              </center>
            </div>
            <div style="margin-bottom: 10px;">
              <center>
              <p style="font-size: 18px; color: #212121" >Your Home Services Expart</p>
              <small>Quick, Affordable, Trusted</small>
              </center>
            </div>
            <center>

<?php complete_registration(); ?>
            </center>
            <form enctype="multipart/form-data" action="?" method="POST" autocomplete="off">
              <div class="md-form">
                <select class="md-form" name="card" style="border: none; border-bottom: 1px solid #ced4da; width:100%;   ">
                  <option value="0" disabled selected>Select Identity Card</option>
                    

<?php
$sql = "SELECT * FROM identity WHERE status = 0 ORDER by card_name ASC";
$result = (query($sql));

while ($row = mysqli_fetch_array($result))
  {
  $id = $row["id"];
  $card_name = $row["card_name"];
  echo "<option value='$id'> $card_name </option></a></li>";
  }

?>
                </select>
              </div>
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="card_no" class="form-control" placeholder="Card No">
                  </div>
                </div>
                <div class="col">
                  <div class="md-form mt-0" style="top: -10;" >
                    <input type="file" name="c_img_f" id="imageUpload1" accept=".png, .jpg, .jpeg" placeholder="Front side" class="hide"/>
                    <label for="imageUpload1" class="btn blue-gradient" style="color: white;">Front side</label>
                  </div>
                </div>
                <div class="col">
                  <div class="md-form mt-0" style="top: -10;" >
                    <input type="file" name="c_img_b" id="imageUpload2" accept=".png, .jpg, .jpeg" class="hide"/>
                    <label for="imageUpload2" class="btn peach-gradient" style="color: white;">Back side</label>
                  </div>
                </div>
              </div>
              <div class="md-form">
                <select class=" md-form" name="qualification" style="border: none; border-bottom: 1px solid #ced4da; width:100%;   ">
                  <option value="" disabled selected>Select Qualification</option>
                    

<?php
$sql = "SELECT * FROM qualification WHERE status = 0 ORDER by q_name ASC";
$result = (query($sql));

while ($row = mysqli_fetch_array($result))
  {
  $QId = $row["id"];
  $q_name = $row["q_name"];
  echo "<option value='$QId'> $q_name </option></a></li>";
  }

?>

                </select>
              </div>
              <div class="row">
                <div class="col">
                  <div class="md-form mt-0">
                    <input type="text" name="reg_no" class="form-control" placeholder="Reg. No">
                  </div>
                </div>
                <div class="col">
                  <div class="md-form mt-0" style="top: -10;" >
                    <input type="file" name="q_img_f" id="imageUpload3" class="hide"/>
                    <label for="imageUpload3" class="btn blue-gradient" accept=".png, .jpg, .jpeg" style="color: white;">Front side</label>
                  </div>
                </div>
                <div class="col">
                  <div class="md-form mt-0" style="top: -10;" >
                    <input type="file" name="q_img_b" id="imageUpload4" class="hide"/>
                    <label for="imageUpload4" accept=".png, .jpg, .jpeg" class="btn peach-gradient" style="color: white;">Back side</label>
                  </div>
                </div>
              </div>
              <div class="">
                <label style="color: #827775;">Past work picture</label>
                <div class="row">
                  <div class="col-sm">
                    <input type="file" name="p_img_1" id="imageUpload5" class="hide"/>
                    <label for="imageUpload5" accept=".png, .jpg, .jpeg" class="btn blue-gradient" style="color: white;">Picture 1</label>
                  </div>
                  <div class="col-sm">
                    <input type="file" name="p_img_2" id="imageUpload6" class="hide"/>
                    <label for="imageUpload6" accept=".png, .jpg, .jpeg" class="btn blue-gradient" style="color: white;">Picture 2</label>
                  </div>
                  <div class="col-sm">
                    <input type="file" name="p_img_3" id="imageUpload7" class="hide"/>
                    <label for="imageUpload7" accept=".png, .jpg, .jpeg" class="btn blue-gradient" style="color: white;">Picture 3</label>
                  </div>
                  <div class="col-sm">
                    <input type="file" name="p_img_4" id="imageUpload8" class="hide"/>
                    <label for="imageUpload8" accept=".png, .jpg, .jpeg" class="btn blue-gradient" style="color: white;">Picture 4</label>
                  </div>
                </div>
              </div>
              <div class="md-form">
                <textarea id="form103" name="about" class="md-textarea form-control" rows="3" placeholder="About your self"></textarea>
              </div>
              <div class="form-group">
                <input  type=submit name="cancel"  value="Cancel" class="btn purple-gradient btn-lg pull-left" >
                <input  type="submit" name="submit"  value="Continue" class="btn aqua-gradient btn-lg pull-right" >
              </div>
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

<script type="text/javascript">
$("[type=file]").on("change", function() {
    var file = this.files[0].name;
    var dflt = $(this).attr("placeholder");
    if ($(this).val() != "") {
        $(this).next().text(file);
    } else {
        $(this).next().text(dflt);
    }
});
</script>