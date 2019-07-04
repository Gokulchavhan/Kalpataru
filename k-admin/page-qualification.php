<?php include("functions/k_a_init.php"); ?>
<?php
if (!logged_admin()) {
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
  <div class="content-page">
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="page-title-box">
              <h4 class="page-title">Qualification</h4>
              <ol class="breadcrumb p-0 m-0">
                <li>
                  <a href="#">Kalpataru</a>
                </li>
                <li class="active">
                  Qualification
                </li>
              </ol>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        
        <?php add_qualification(); ?>
        <?php display_message(); ?>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <a href="#custom-modal" class="btn btn-primary waves-effect w-md m-r-5 m-b-10" data-animation="door" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a"><i class="fa fa-plus-circle"></i> Add Qualification</a>
               <?php
$sql    = "SELECT * FROM qualification ORDER BY id DESC";
$result = (query($sql));
if (row_count($result) <= 0) {
    echo "<div class='alert alert-danger text-center'><strong>Not Found !</strong></div>";
} else {

?>
                <table class="table table-striped add-edit-table table-bordered dt-responsive nowrap" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Degree</th>
                     <!--  <th>Degree ID</th> -->
                      <th>No of Workers</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                 <?php
$i = 0;
while ($row = fetch_array($result)) {
    $i++;
    $id     = $row["id"];
    $status = $row["status"];

?>
                  <tbody>
                    <?php
                    if($i%2 == 0){
                    ?>
                    <tr class="gradeX" style="background-color: white">
                      <td>
                        <?php echo $i;?>
                      </td>
                      <td>
                        <?php echo $row["q_name"]; ?>
                      </td>
                     <!--  <td>
                        <?php echo $row["q_id"]; ?>
                      </td> -->
                      <td>
                        <span class="badge badge-pill badge-info">
<?php
$sqlI    = "SELECT * FROM employee WHERE qualification_id = $id ";
$resultI = query($sqlI);
confirm($resultI);
$iI = 0;
while ($rowI = fetch_array($resultI)) {
    $iI++;
}
echo $iI;
?>
                        </span>
                      </td>
                      <td>
                       <?php
if ($status == 0) {
    echo "<span class='badge badge-success'>Active</span>";
} else {
    echo "<span class='badge badge-danger'>Inavtive</span>";
}
?>
                      </td>
                      <td class="actions">
                        <?php if($status == 0){ ?>
                        <a href="page-qualification.php?block=<?php echo $id?>" onclick="return confirm('Are you sure ?')" title="Block" class="hidden on-editing save-row"><i class="fa fa-ban" style="color: red;"></i></a>
                        <?php } ?>
                        <?php if($status == 1){ ?>
                        <a href="page-qualification.php?accept=<?php echo $id?>" onclick="return confirm('Are you sure ?')" title="Approve"  class="hidden on-editing cancel-row"><i class="fa fa-check"></i></a>
                        <a href="page-qualification.php?delete=<?php echo $id?>" onclick="return confirm('Are you sure ?')" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                    }else{
                    ?>
                    <tr class="gradeC">
                      <td>
                        <?php echo $i;?>
                      </td>
                      <td>
                        <?php echo $row["q_name"]; ?>
                      </td>
                      <!-- <td>  <?php echo $row["q_id"]; ?>
                      </td> -->
                      <td>
                        <span class="badge badge-pill badge-primary">
<?php
$sqlI    = "SELECT * FROM employee WHERE qualification_id = $id ";
$resultI = query($sqlI);
confirm($resultI);
$iI = 0;
while ($rowI = fetch_array($resultI)) {
    $iI++;
}
echo $iI;
?>
                        </span>
                      </td>
                      <td>
                        <?php if ($status == 0) { ?>
                        <span class="badge badge-success">Active</span>
                        <?php } else { ?>
                        <span class="badge badge-danger">Inavtive</span>
                        <?php } ?>
                      </td>
                      <td class="actions">
                        <?php if($status == 0){ ?>
                        <a href="page-qualification.php?block=<?php echo $id?>" onclick="return confirm('Are you sure ?')" title="Block" class="hidden on-editing save-row"><i class="fa fa-ban" style="color: red;"></i></a>
                        <?php } ?>
                        <?php if($status == 1){ ?>
                        <a href="page-qualification.php?accept=<?php echo $id?>" onclick="return confirm('Are you sure ?')" title="Approve"  class="hidden on-editing cancel-row"><i class="fa fa-check"></i></a>
                        <a href="page-qualification.php?delete=<?php echo $id?>" onclick="return confirm('Are you sure ?')" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <?php
                  }
                  }
                echo "</table>";
                ?>
                <?php
if (isset($_GET['block'])) {
    $block_id = $_GET['block'];
    $quer     = "UPDATE qualification SET status = 1 WHERE id = '$block_id'";
    query($quer);
    header("location: page-qualification.php");
    set_message("<div class='alert alert-danger'>
                <strong>Blocked</strong> successfully.</div>
                <script type='text/javascript'>
                window.setTimeout(function() {
                $('.alert').fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                }, 2000);
                </script>
                ");
}
?>
               <?php
if (isset($_GET['accept'])) {
    $accept_id = $_GET['accept'];
    $quer      = "UPDATE qualification SET status = 0 WHERE id = '$accept_id'";
    query($quer);
    header("location: page-qualification.php");
    set_message("<div class='alert alert-info'>
                <strong>Approved</strong> successfully.</div>
                <script type='text/javascript'>
                window.setTimeout(function() {
                $('.alert').fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                }, 2000);
                </script>
                ");
}
?>
               <?php
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $sql1      = "SELECT * FROM answers WHERE a_no='$delete_id'";
    $result1   = query($sql1);
    $res1      = mysqli_fetch_array($result1);
    $sql       = "DELETE FROM qualification WHERE id ='$delete_id'";
    query($sql);
    header("location: page-qualification.php");
    set_message("<div class='alert alert-danger'>
                  <strong>Delete</strong> successfull.
                </div>
                <script type='text/javascript'>
                window.setTimeout(function() {
                $('.alert').fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
                }, 2000);
                </script>
                ");
}
?>
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
<div id="custom-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
  <span>&times;</span><span class="sr-only">Close</span>
  </button>
  <h4 class="custom-modal-title">Add new Service</h4>
  <div class="custom-modal-text">
    <form method="POST" autocomplete="off">
      <div class="form-group row">
        <label class="col-md-2 control-label">Name</label>
        <div class="col-md-10">
          <input type="text" name="qualification" class="form-control" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect waves-light"> Save </button>
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