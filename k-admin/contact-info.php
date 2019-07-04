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
            <h4 class="page-title">Contact Information</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="#">Kalpataru</a>
              </li>
              <li>
                <a href="#">Contact information</a>
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
              $sql = "SELECT * FROM messages ORDER BY message_id DESC";
              $result=(query($sql));
              if(row_count($result)<=0)
              {
                echo "<div class='alert alert-danger text-center'><strong>Not Found !</strong></div>";
            
              } else {
              ?>
              <table class="table table-striped add-edit-table table-bordered dt-responsive nowrap" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <?php
                $i = 0;
                while($row =fetch_array($result)) {
                $i++;
                $id=$row["message_id"];
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
                      <?php echo $row["fullname"]; ?>
                    </td>
                    <td> <?php echo $row["email"]; ?>
                    </td>
                    <td>
                      <?php echo $row["mobile"]; ?>
                    </td>
                    <td class="actions">
                      
                      <?php if($status==0){ ?>
                      <a href="page-message-details.php?con_id=<?php echo $id ?>" title="View" class="hidden on-editing cancel-row"><i class="fa fa-eye"></i></a>
                      <?php }else{ ?>
                      <a href="page-message-details.php?con_id=<?php echo $id ?>" title="View" class="hidden on-editing cancel-row"><i class="fa fa-eye-slash"></i></a>
                      <?php } ?>
                      <a href="contact-info.php?delete=<?php echo $id ?>" onclick="return confirm('Are you sure ?')"  title="Delete" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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
                      <?php echo $row["fullname"]; ?>
                    </td>
                    <td> <?php echo $row["email"]; ?>
                    </td>
                    <td>
                      <?php echo $row["mobile"]; ?>
                    </td>
                    <td class="actions">
                      <?php if($status==0){ ?>
                      <a href="page-message-details.php?con_id=<?php echo $id ?>" title="View" class="hidden on-editing cancel-row"><i class="fa fa-eye"></i></a>
                      <?php }else{ ?>
                      <a href="page-message-details.php?con_id=<?php echo $id ?>" title="View" class="hidden on-editing cancel-row"><i class="fa fa-eye-slash"></i></a>
                      <?php } ?>
                      <a href="contact-info.php?delete=<?php echo $id ?>" onclick="return confirm('Are you sure ?')"  title="Delete" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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
if (isset($_GET['delete'])) {
    $del_id = $_GET['delete'];
    $sql    = "DELETE FROM messages WHERE message_id='$del_id'";
    query($sql);
    header("location: contact-info.php");
    
    set_message("<div class='alert alert-danger'>
              <strong>Danger!</strong> Delete successfull.</div>
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