<?php include("includes/k_a_header.php") ?>
<?php
if (!logged_admin()) {
redirect("page-login.php");
}
?>
<?php include("includes/k_a_nav.php") ?>
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
<div class="content-page">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <h4 class="page-title">Profile</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="#">Kalpataru</a>
              </li>
              <li>
                <a href="#">Profile</a>
              </li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    <?php
if (isset($_SESSION['email'])) {
    $sql    = "SELECT * FROM admin WHERE email = '$_SESSION[email]'";
    $result = query($sql);
    confirm($result);
    $row        = fetch_array($result);
    $first_name = $row['first_name'];
    $last_name  = $row['last_name'];
    $email      = $row['email'];
    $dp         = $row['profile_picture'];
}
?>
      <?php add_profile_picture(); ?>
      <?php display_message(); ?>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              
              <form action="" method="post" enctype="multipart/form-data">
                <div class="preview text-center">
                  <img class="preview-img" src="images/admin_image/<?php echo $dp; ?>" alt="Preview Image" width="200" height="200"/>
                  <span class="Error"></span>
                </div>
                <div class="form-group">
                  <label>Uoload Profile Picture:</label>
                  <input class="form-control" type="file" name="profile_picture" />
                  <span class="Error"></span>
                </div>
                <div class="form-group">
                  <label>Full Name:</label>
                  <input class="form-control" type="text" name="fullname" value="<?php echo $first_name." ".$last_name ?>" disabled/>
                  <span class="Error"></span>
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" disabled/>
                  <span class="Error"></span>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success pull-right" name="">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/k_a_footer.php") ?>