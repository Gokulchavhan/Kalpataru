<?php include("functions/k_a_init.php"); ?>
<?php
if (!logged_admin()) {
# code...
redirect("page-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>K-admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon123.png">
    <link href="plugins/custombox/css/custombox.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <script src="assets/js/modernizr.min.js"></script>
  </head>
  <?php include("includes/k_a_nav.php") ?>
  <link href="assets/css/profile-style.css" rel="stylesheet" type="text/css" />
  <div class="content-page">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="page-title-box">
              <h4 class="page-title">Employee Details</h4>
              <ol class="breadcrumb p-0 m-0">
                <li>
                  <a href="#">Kalpataru</a>
                </li>
                <li>
                  <a href="#">Employee</a>
                </li>
                <li class="active">
                  Employee Details
                </li>
              </ol>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <a href="page-employee.php" class="btn btn-primary" style="margin-bottom: 20px;" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
<?php
function exits_id($e_id)
{
    $sql    = "SELECT * FROM employee WHERE id = $e_id";
    $result = query($sql);
    if (row_count($result) == 1) {
        return true;
    } else {
        return false;
    }
}
?>
       <?php
if (isset($_GET['e_id'])) {
    $e_id = decode($_GET['e_id']);
    if (empty($e_id)) {
        redirect("aaa-404.php");
    } else {
        if (exits_id($e_id)) {
            $sql    = "SELECT * FROM employee WHERE id = $e_id";
            $result = (query($sql));
            $count  = 1;
            while ($row = fetch_array($result)) {
                $mobile_no       = $row["mobile_no"];
                $emp_id          = $row["emp_id"];
                $email           = $row["email"];
                $first_name      = $row["first_name"];
                $last_name       = $row["last_name"];
                $gender          = $row["gender_id"];
                $birthday        = $row["birthday"];
                $mobile_no       = $row["mobile_no"];
                $city            = $row["city"];
                $service         = $row["service"];
                $identity_id     = $row["identity_id"];
                $card_no         = $row["card_no"];
                $card_img_f      = $row["card_img_f"];
                $card_img_b      = $row["card_img_b"];
                $qualification   = $row["qualification_id"];
                $reg_no          = $row["reg_no"];
                $q_img_f         = $row["q_img_f"];
                $q_img_b         = $row["q_img_b"];
                $p_img_1         = $row["p_img_1"];
                $p_img_2         = $row["p_img_2"];
                $p_img_3         = $row["p_img_3"];
                $p_img_4         = $row["p_img_4"];
                $about           = $row["about"];
                $apply_date_time = $row["apply_date_time"];
                $apply_date_time = date('j-F-Y \a\t g:i a', strtotime($apply_date_time));
            }
        } else {
            redirect("111-404.php");
        }
    }
}
?>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div id="user-profile-2" class="user-profile">
                  <div class="tabbable">
                    <div class="row">
                      <div class="col-md-12">
                        <ul class="nav nav-tabs tabs-bordered nav-justified" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab-b2" data-toggle="tab" href="#home" role="tab" aria-controls="home-b2" aria-selected="false">
                              <span class="d-block d-sm-none"><i class="fa fa-home"></i></span>
                              <span class="d-none d-sm-block">
                                <i class="green ace-icon fa fa-user bigger-120"></i> Profile
                              </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link " id="profile-tab-b2" data-toggle="tab" href="#pictures1" role="tab" aria-controls="profile-b2" aria-selected="true">
                              <span class="d-block d-sm-none"><i class="fa fa-user"></i></span>
                              <span class="d-none d-sm-block">
                                <i class="blue ace-icon fa fa-graduation-cap bigger-120"></i> Qualifications
                              </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="message-tab-b2" data-toggle="tab" href="#pictures2" role="tab" aria-controls="message-b2" aria-selected="false">
                              <span class="d-block d-sm-none"><i class="fa fa-envelope-o"></i></span>
                              <span class="d-none d-sm-block">
                                <i class="orange ace-icon fa fa-id-card bigger-120"></i> Identity Proofs
                              </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="setting-tab-b2" data-toggle="tab" href="#pictures3" role="tab" aria-controls="setting-b2" aria-selected="false">
                              <span class="d-block d-sm-none"><i class="fa fa-cog"></i></span>
                              <span class="d-none d-sm-block"><i class="pink ace-icon fa fa-image bigger-120"></i> Past Work Picture
                              </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="setting-tab-b2" data-toggle="tab" href="#pictures4" role="tab" aria-controls="setting-b2" aria-selected="false">
                              <span class="d-block d-sm-none"><i class="fa fa-cog"></i></span>
                              <span class="d-none d-sm-block"><i class="pink ace-icon mdi mdi-worker bigger-120"></i> Working History
                              </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-content no-border padding-24">
                      <div id="home" class="tab-pane in active">
                        <div class="row">
                          <div class="col-xs-12 col-sm-3 center">
                            <span class="profile-picture">
                              <img class="editable img-responsive" alt=" Avatar" id="avatar2" src="images/empPic/avatar6.png">
                            </span>
                            <div class="space space-4"></div>
                            <a href="#custom-modal" class="btn btn-primary waves-effect w-md m-r-5 m-b-10" data-animation="swell" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" style="margin-top:20px;"><i class="ace-icon fa fa-envelope-o bigger-110"></i> Send Message</a>
                            <!-- Modal -->
                            </div><!-- /.col -->
                            <div class="col-xs-12 col-sm-9">
                              <h4 class="blue">
                              <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                  <?php
                                  echo ucwords($first_name);
                                  echo " ";
                                  echo ucwords($last_name);
                                  ?>
                                </div>
                                <div class="col-md-5"></div>
                              </div>
                              </h4>
                              <div class="profile-user-info">
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> User ID </div>
                                  <div class="profile-info-value">
                                    <span> <?php echo $emp_id; ?> </span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Location </div>
                                  <div class="profile-info-value">
                                    <i class="fa fa-map-marker light-orange bigger-110"> </i>
                                    <span> <?php echo $city; ?>  </span>
                                    <span>West Bengal, India</span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Age </div>
                                  
<?php
date_default_timezone_set("Asia/Kolkata");
$today       = date("Y-m-d");
$dateOfBirth = $birthday;
$diff        = date_diff(date_create($dateOfBirth), date_create($today));
$DOB         = date('j-F-Y', strtotime($birthday));
?>
                                  <div class="profile-info-value">
                                    <span><?php echo $diff->format('%y'); ?><?php echo ' '.'(DOB : '.$DOB.')'; ?></span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Gender </div>
                                  <div class="profile-info-value">
                                    <span>

<?php
$sqlG = "SELECT * FROM gender WHERE id = '$gender'";
$resultG = query($sqlG);
confirm($resultG);
$rowG = fetch_array($resultG);
echo ucwords($rowG['gender']);
?>
                                    </span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Joined </div>
                                  <div class="profile-info-value">
                                    <span><?php echo $apply_date_time; ?></span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Mobile </div>
                                  <div class="profile-info-value">
                                    <span>+91 <?php echo $mobile_no; ?></span>
                                  </div>
                                </div>
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Email </div>
                                  <div class="profile-info-value">
                                    <span><?php echo $email; ?></span>
                                  </div>
                                </div>
                              </div>
                              <div class="hr hr-8 dotted"></div>
                              </div><!-- /.col -->
                              </div><!-- /.row -->
                              <div class="space-20"></div>
                              <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                  <div class="widget-box transparent">
                                    <div class="widget-header widget-header-small">
                                      <h4 class="widget-title smaller">
                                      <i class="ace-icon fa fa-check-square-o bigger-110"></i>
                                      Little About Me
                                      </h4>
                                    </div>
                                    <div class="widget-body">
                                      <div class="widget-main">
                                        <p>
                                          <?php echo $about; ?>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </div><!-- /#home -->
                              <!-- Picture 1 -->
                              <div id="pictures1" class="tab-pane">
                                <div class="row">
                                  <div class="col-md-4">
                                  </div>
                                  <div class="col-md-4">
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> Qualification </div>
                                      <div class="profile-info-value">
                                        <span>
<?php
$sqlQ    = "SELECT * FROM qualification WHERE id = '$qualification'";
$resultQ = query($sqlQ);
confirm($resultQ);
$rowQ = fetch_array($resultQ);
echo ucwords($rowQ['q_name']);
?>
                                    </span>
                                      </div>
                                    </div>
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> Reg. No </div>
                                      <div class="profile-info-value">
                                        <span><?php echo $reg_no; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                  </div>
                                  <div class="col-md-6" >
                                    <ul class="ace-thumbnails" style="margin-top:50px;">
                                      <li>
                                        <a href="#" target="_blank" data-rel="colorbox">
                                          <img alt="150x150" src="../k-professional/uploads/<?php echo $q_img_f; ?>">
                                          <div class="text">
                                            <div class="inner">View</div>
                                          </div>
                                        </a>
                                      </li>
                                      <li>
                                        <a href="http://lorempixel.com/200/200/nature/1/" data-rel="colorbox">
                                          <img alt="150x150" src="../k-professional/uploads/<?php echo $q_img_b; ?>" >
                                          <div class="text">
                                            <div class="inner">View</div>
                                          </div>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-md-3">
                                  </div>
                                </div>
                              </div>
                              <div id="pictures2" class="tab-pane">
                                <div class="row">
                                  <div class="col-md-4">
                                  </div>
                                  <div class="col-md-4">
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> Identity proof: </div>
                                      <div class="profile-info-value">
                                        <span>
<?php
echo $card_name;
$sqlI    = "SELECT * FROM identity WHERE id = '$identity_id'";
$resultI = query($sqlI);
confirm($resultI);
$rowI = fetch_array($resultI);
echo ucwords($rowI['card_name']);
?>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> Card. No </div>
                                      <div class="profile-info-value">
                                        <span><?php echo $card_no; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                  </div>
                                  <div class="col-md-6">
                                    <ul class="ace-thumbnails" style="margin-top:50px;">
                                      <li>
                                        <a href="#" target="_blank" data-rel="colorbox">
                                          <img alt="150x150" src="../k-professional/uploads/<?php echo $card_img_f; ?>">
                                          <div class="text">
                                            <div class="inner">View</div>
                                          </div>
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#" data-rel="colorbox">
                                          <img alt="150x150" src="../k-professional/uploads/<?php echo $card_img_b; ?>">
                                          <div class="text">
                                            <div class="inner">View</div>
                                          </div>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col-md-3">
                                  </div>
                                </div>
                              </div>
                              <!-- End picture 2 -->
                              <!-- Picture 3 -->
                              <div id="pictures3" class="tab-pane">
                                <center>
                                <h3>
                                Past Working Pictures
                                </h3>
                                </center>
                                <ul class="ace-thumbnails">
                                  <li>
                                    <a href="#" data-rel="colorbox">
                                      <img alt="150x150" src="../k-professional/uploads/<?php echo $p_img_1; ?>">
                                      <div class="text">
                                        <div class="inner">Sample Caption on Hover</div>
                                      </div>
                                    </a>
                                    <div class="tools tools-bottom">
                                      <a href="#">
                                        <i class="ace-icon fa fa-link"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-paperclip"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-pencil"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-times red"></i>
                                      </a>
                                    </div>
                                  </li>
                                  <li>
                                    <a href="#" data-rel="colorbox">
                                      <img alt="150x150" src="../k-professional/uploads/<?php echo $p_img_2; ?>">
                                      <div class="text">
                                        <div class="inner">Sample Caption on Hover</div>
                                      </div>
                                    </a>
                                    <div class="tools tools-bottom">
                                      <a href="#">
                                        <i class="ace-icon fa fa-link"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-paperclip"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-pencil"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-times red"></i>
                                      </a>
                                    </div>
                                  </li>
                                  <li>
                                    <a href="#" data-rel="colorbox">
                                      <img alt="150x150" src="../k-professional/uploads/<?php echo $p_img_3; ?>">
                                      <div class="text">
                                        <div class="inner">Sample Caption on Hover</div>
                                      </div>
                                    </a>
                                    <div class="tools tools-bottom">
                                      <a href="#">
                                        <i class="ace-icon fa fa-link"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-paperclip"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-pencil"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-times red"></i>
                                      </a>
                                    </div>
                                  </li>
                                  <li>
                                    <a href="#" data-rel="colorbox">
                                      <img alt="150x150" src="../k-professional/uploads/<?php echo $p_img_4; ?>">
                                      <div class="text">
                                        <div class="inner">Sample Caption on Hover</div>
                                      </div>
                                    </a>
                                    <div class="tools tools-bottom">
                                      <a href="#">
                                        <i class="ace-icon fa fa-link"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-paperclip"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-pencil"></i>
                                      </a>
                                      <a href="#">
                                        <i class="ace-icon fa fa-times red"></i>
                                      </a>
                                    </div>
                                  </li>
                                </ul>
                                </div><!-- /#pictures -->
                                <!-- End picture 3  -->
                                <div id="pictures4" class="tab-pane">
                                  <ul class="ace-thumbnails">
                                    <li>
                                      <a href="#" data-rel="colorbox">
                                        <img alt="150x150" src="http://lorempixel.com/200/200/nature/5/">
                                        <div class="text">
                                          <div class="inner">Sample Caption on Hover</div>
                                        </div>
                                      </a>
                                      <div class="tools tools-bottom">
                                        <a href="#">
                                          <i class="ace-icon fa fa-link"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-paperclip"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-pencil"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-times red"></i>
                                        </a>
                                      </div>
                                    </li>
                                    <li>
                                      <a href="#" data-rel="colorbox">
                                        <img alt="150x150" src="http://lorempixel.com/200/200/nature/6/">
                                        <div class="text">
                                          <div class="inner">Sample Caption on Hover</div>
                                        </div>
                                      </a>
                                      <div class="tools tools-bottom">
                                        <a href="#">
                                          <i class="ace-icon fa fa-link"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-paperclip"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-pencil"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-times red"></i>
                                        </a>
                                      </div>
                                    </li>
                                    <li>
                                      <a href="#" data-rel="colorbox">
                                        <img alt="150x150" src="http://lorempixel.com/200/200/nature/7/">
                                        <div class="text">
                                          <div class="inner">Sample Caption on Hover</div>
                                        </div>
                                      </a>
                                      <div class="tools tools-bottom">
                                        <a href="#">
                                          <i class="ace-icon fa fa-link"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-paperclip"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-pencil"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-times red"></i>
                                        </a>
                                      </div>
                                    </li>
                                    <li>
                                      <a href="#" data-rel="colorbox">
                                        <img alt="150x150" src="http://lorempixel.com/200/200/nature/1/">
                                        <div class="text">
                                          <div class="inner">Sample Caption on Hover</div>
                                        </div>
                                      </a>
                                      <div class="tools tools-bottom">
                                        <a href="#">
                                          <i class="ace-icon fa fa-link"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-paperclip"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-pencil"></i>
                                        </a>
                                        <a href="#">
                                          <i class="ace-icon fa fa-times red"></i>
                                        </a>
                                      </div>
                                    </li>
                                  </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div> 
                      </div> 
                      </div> 
                      <footer class="footer">
                        <center>
                        2019 © Kalpataru.
                        </center>
                      </footer>
                    </div>
                  </div>
                  <!-- Modal -->
                  <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="custom-modal-title">New Message</h4>
                    <div class="custom-modal-text">
                      <form method="POST" autocomplete="off">
                        <div class="form-group row">
                          <label class="col-md-2 control-label">To</label>
                          <div class="col-md-10">
                            <input type="text" name="email" class="form-control" value="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 control-label">Cc / Bcc</label>
                          <div class="col-md-10">
                            <input type="text" name="ccbcc" class="form-control" value="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 control-label">Subject</label>
                          <div class="col-md-10">
                            <input type="email" name="subject" class="form-control" value="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 control-label">Message</label>
                          <div class="col-md-10">
                            <textarea rows="10" cols="30" class="form-control" id="" name="message"></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary waves-effect waves-light"> Send </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <script>
                  var resizefunc = [];
                  </script>
                  <!-- jQuery  -->
                  <script src="assets/js/jquery.min.js"></script>
                  <script src="assets/js/bootstrap.bundle.min.js"></script>
                  <script src="assets/js/metisMenu.min.js"></script>
                  <script src="assets/js/waves.js"></script>
                  <script src="assets/js/jquery.slimscroll.js"></script>
                  <script src="plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
                  <!-- Modal-Effect -->
                  <script src="plugins/custombox/js/custombox.min.js"></script>
                  <script src="plugins/custombox/js/legacy.min.js"></script>
                  <!-- App js -->
                  <script src="assets/js/jquery.core.js"></script>
                  <script src="assets/js/jquery.app.js"></script>
                </body>
              </html>