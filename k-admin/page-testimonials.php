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
    <style type="text/css">
    </style>
  </head>
<?php include("includes/k_a_nav.php") ?>
  <div class="content-page">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="page-title-box">
              <h4 class="page-title">Services</h4>
              <ol class="breadcrumb p-0 m-0">
                <li>
                  <a href="#">Kalpataru</a>
                </li>
                <li>
                  <a href="#">Services</a>
                </li>
                <li class="active">
                  Services
                </li>
              </ol>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>

<?php add_testimonials(); ?>
<?php display_message(); ?>
        <!-- Custom Modals -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <a href="#custom-modal" class="btn btn-primary waves-effect w-md m-r-5 m-b-10" data-animation="door" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a"><i class="fa fa-plus-circle"></i> Add Testimonials</a>
        

      
        
 



            <table class="table table-striped add-edit-table table-bordered dt-responsive nowrap" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Name</th>
                      <th>Service Name</th>
                     <!--  <th>City</th> -->
                      <th>Ratting</th>
                       <th>Comment</th>
                      <th>Actions</th>
                    </tr>
                  </thead>

 <?php 
 $sql = "SELECT * FROM testimonials ORDER BY id DESC";
                $result=(query($sql));
                if(row_count($result)<=0)
                {
                  echo "<div class='alert alert-danger text-center'><strong>Not Found !</strong></div>";
 } else {
  $count = 0;
                  while($row =fetch_array($result)) {
                  $count++;
                  
                  $emp_id=$row["employee_id"];

?>  



      <?php

$sqlD    = "SELECT * FROM employee WHERE id = '$emp_id'";
          $resultD = (query($sqlD));
         
          while ($rowD = fetch_array($resultD)) {
             
             $emp_id = $rowD["id"];
              $first_name      = $rowD["first_name"];
              $last_name       = $rowD["last_name"];
              $service_id       = $rowD["service_id"];
              $profile_picture  = $rowD["profile_picture"];
              $about       = $rowD["about"];
 ?>              
                
                  <tbody>
                
                    <tr class="gradeX" style="background-color: white">
                      <td>
                          <?php echo $count; ?>
                      </td>
                      <td>
                       
                  <?php echo $first_name." ".$last_name ; ?>

                      </td>
                      <td> 
 <?php 

                          $s_id    = $rowD["service_id"];
                          $sqlS    = "SELECT * FROM services WHERE id = '$s_id'";
                          $resultS = query($sqlS);
                          confirm($resultS);
                          $rowS = fetch_array($resultS);
                          echo ucwords($rowS['name']);

                      ?>


                      </td>
                      <td>
<?php 
     $sqlRcount="SELECT * FROM orders WHERE emp_id = '$emp_id' AND ratting = 1";
        $resultRcount =(query($sqlRcount));
        if(row_count($resultRcount) > 0){
        $rc = 0;
        while($rowR5 =fetch_array($resultRcount))
        {
         $rc++;
        }
      }else{
        $rc = 0;
      }
echo $rc;
?>
                      </td>
                      <td>


                       <?php 
        $sql1 ="SELECT * FROM ratting WHERE emp_id = '$emp_id' AND comment <> '0'";
        $result1=(query($sql1));
        if(row_count($result1) > 0){
        $count1=0;
        while($row1 =fetch_array($result1))
        {
         $count1++;
        }
      }else{
        $count1 = 0;
      }
echo $count1;
?>


                      </td>
                      <td class="actions">
                      
        <a href="page-testimonials.php?delete=<?php echo $emp_id?>" title="Delete" onclick="return confirm('Are you sure ?')"  class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                       

                     
                      </td>
                    </tr>
                 
              
                  
                  </tbody>
        
              <?php
            }
                 
        }
        echo "</table>";
      }

 ?>
     



 <?php
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $sql       = "DELETE FROM testimonials WHERE employee_id = '$delete_id'";
    query($sql);
    header("location: page-testimonials.php");
    set_message("<div class='alert alert-danger'>
                  <strong>Danger!</strong> Delete successfull.
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
            </div><!-- end col -->
          </div>
          <!-- End row -->
          </div> <!-- container -->
          </div> <!-- content -->
          <footer class="footer">
            <center>
            2019 © Kalpataru.
            </center>
          </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
        
      </div> 
   
<div id="custom-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
  <span>&times;</span><span class="sr-only">Close</span>
  </button>
  <h4 class="custom-modal-title">Add new testimonials</h4>
  <div class="custom-modal-text">
    <form method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="form-group row">
        <label class="col-md-2 control-label">Employee</label>
        <div class="col-md-10">
          <div class="col-md-10">
            <select name="employee" class=" md-form"  style="border: none; border-bottom: 1px solid #ced4da; width:100%;background-color: white;">
              <option value=" " selected disabled>Select Name</option>
              <?php
              $sql    = "SELECT MIN(employee.id) AS id, first_name, last_name
              FROM  employee
              JOIN  ratting
              ON  employee.id = ratting.emp_id WHERE employee.approve = 0  GROUP BY first_name, last_name";
              $result = (query($sql));
              while ($row = mysqli_fetch_array($result)) {
              $id        = $row["id"];
              $first_name = $row["first_name"];
              $last_name = $row["last_name"];
              echo "<option value='$id'> $first_name $last_name</option></a></li>";
              
              }
              ?>
            </select>
          </div>
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