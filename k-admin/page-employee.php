<?php include("includes/k_a_header.php") ?>
<?php
if (!logged_admin()) {
    redirect("page-login.php");
}
?>
<?php include("includes/k_a_nav.php") ?>
<div class="content-page">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <h4 class="page-title">Employee</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="#">Kalpataru</a>
              </li>
              <li>
                <a href="#">Employee</a>
              </li>
              <li class="active">
                Employee
              </li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <?php display_message(); ?>
<?php
$sql    = "SELECT * FROM employee ORDER BY id DESC";
$result = (query($sql));
if (row_count($result) <= 0) {
    echo "<div class='alert alert-danger text-center'><strong>Not Found !</strong></div>";
    
} else {
?>
              <table class="table table-striped add-edit-table table-bordered dt-responsive nowrap" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <?php
                $i = 0;
                while($row =fetch_array($result)) {
                $i++;
                $id=$row["id"];
                $status = $row["approve"];
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
                      <?php echo $row["first_name"]; ?>
                      <?php echo $row["last_name"]; ?>
                    </td>
                    <td>
<?php
$c_id    = $row["city_id"];
$sqlC    = "SELECT * FROM city WHERE id = '$c_id'";
$resultC = query($sqlC);
confirm($resultC);
$rowC = fetch_array($resultC);
echo ucwords($rowC['city_name']);

?>
                    </td>
                    <td>
<?php
$s_id    = $row["service_id"];
$sqlS    = "SELECT * FROM services WHERE id = '$s_id'";
$resultS = query($sqlS);
confirm($resultS);
$rowS = fetch_array($resultS);
echo ucwords($rowS['name']);
?>
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
                      <a href="page-employee.php?block=<?php echo $id; ?>" class="hidden on-editing save-row"><i class="fa fa-ban" style="color: red;"></i></a>
                      <?php }else{ ?>
                      <a href="page-employee.php?accept=<?php echo $id; ?>" title="Accept" class="hidden on-editing save-row"><i class="fa fa-check"></i></a>
                      <?php } ?>
                      <a href="page-employee-details.php?e_id=<?php echo encode($id); ?>" class="hidden on-editing cancel-row"><i class="fa fa-eye"></i></a>
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
                      <?php echo $row["first_name"]; ?>
                      <?php echo $row["last_name"]; ?>
                    </td>
                    <td>
<?php
$c_id    = $row["city_id"];
$sqlC    = "SELECT * FROM city WHERE id = '$c_id'";
$resultC = query($sqlC);
confirm($resultC);
$rowC = fetch_array($resultC);
echo ucwords($rowC['city_name']);

?>
                    </td>
                    <td>
<?php
$s_id    = $row["service_id"];
$sqlS    = "SELECT * FROM services WHERE id = '$s_id'";
$resultS = query($sqlS);
confirm($resultS);
$rowS = fetch_array($resultS);
echo ucwords($rowS['name']);
?>
                    </td>
                    <td>
                      <?php if ($status == 0) { ?>
                      <span class="badge badge-success">Active</span>
                      <?php } else { ?>
                      <span class="badge badge-danger">Inavtive</span>
                      <?php } ?>
                    </td>
                    <td class="actions">
                      <?php if($status == 0) { ?>
                      <a href="page-employee.php?block=<?php echo $id; ?>" title="Block" class="hidden on-editing save-row"><i class="fa fa-ban" style="color: red;"></i></a>
                      <?php }else{ ?>
                      <a href="page-employee.php?accept=<?php echo $id; ?>" title="Accept" class="hidden on-editing save-row"><i class="fa fa-check"></i></a>
                      <?php } ?>
                      <a href="page-employee-details.php?e_id=<?php echo encode($id); ?>" title="View" class="hidden on-editing cancel-row"><i class="fa fa-eye"></i></a>
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
    $quer     = "UPDATE employee SET approve = 1 WHERE id = '$block_id'";
    query($quer);
    header("location: page-employee.php");
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
    $quer      = "UPDATE employee SET approve = 0 WHERE id = '$accept_id'";
    query($quer);
    
    header("location: page-employee.php");
    
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
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("includes/k_a_footer.php") ?>