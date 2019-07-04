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
            <h4 class="page-title">Employee Request</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="#">Kalpataru</a>
              </li>
              <li>
                <a href="#">Employee</a>
              </li>
              <li class="active">
                Employee Request
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
              $sql = "SELECT * FROM employee_request WHERE approve = 0 ORDER BY id DESC";
              $result=(query($sql));
              if(row_count($result)<=0)
              {
              ?>
              <div class='alert alert-danger text-center'><strong>Not Found !</strong></div>
              <?php
              } else {
              ?>
              <table class="table table-striped add-edit-table table-bordered dt-responsive nowrap" id="datatable-editable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Service</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <?php
                $i = 0;
                while($row =fetch_array($result)) {
                $i++;
                $id=$row["id"];
                ?>
                <tbody>
                  <tr class="gradeX">
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
                    <td class="actions">
                      <a href="page-employee-request.php?accept=<?php echo $id?>" onclick="return confirm('Are you sure ?')" title="Approve" class="hidden on-editing save-row"><i class="fa fa-check"></i></a>
                      <a href="page-employee-request-details.php?e_id=<?php echo encode($id); ?>" title="View" class="hidden on-editing cancel-row"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                </tbody>
                <?php
                }
                }
              echo "</table>";
              ?>



              <?php
/************** Username Genetator ***************/
function employee_ID($service_id)
{
    $sqlSr    = "SELECT *  FROM services WHERE id = $service_id";
    $resultSr = query($sqlSr);
    confirm($resultSr);
    $rowSr   = fetch_array($resultSr);
    $service = $rowSr['name'];
    $ser     = mb_substr($service, 0, 3);
    $service = strtoupper($ser);
    date_default_timezone_set("Asia/Kolkata");
    $to_day = date("Y-m-d");
    $today  = date("dmy");
    $d      = $today;
    $date   = "KT" . $d . "$service";
    $sql    = "SELECT *  FROM employee ORDER BY id DESC";
    $result = query($sql);
    confirm($result);
    $row      = fetch_array($result);
    $db_Date  = $row['date_time'];
    $db_useID = $row['emp_id'];
    $userID   = substr($db_useID, 11);
    if ($db_Date == $to_day) {
        $u_ID     = $userID + 1;
        $u_ID     = sprintf("%'.03d\n", $u_ID);
        $username = $date . $u_ID;
        return $username;
    } else {
        $n        = 1;
        $num      = sprintf("%'.03d\n", $n);
        $username = $date . $num;
        return $username;
    }
}
/*function end*/
/*---------------------------------------------------*/
?>
              <?php
if (isset($_GET['accept'])) {
    $accept_id = $_GET['accept'];
    // Fetch data
    $sql       = "SELECT * FROM employee_request  WHERE id = '$accept_id'";
    $result    = query($sql);
    confirm($result);
    $row           = fetch_array($result);
    $service       = $row['service_id'];
    $city          = $row['city_id'];
    $gender        = $row['gender_id'];
    $qualification = $row['qualification_id'];
    $identity_id   = $row['identity_id'];
    $first_name    = $row['first_name'];
    $last_name     = $row['last_name'];
    $birthday      = $row['birthday'];
    $mobile_no     = $row['mobile_no'];
    $email         = $row['email'];
    $card_name     = $row['card_name'];
    $card_no       = $row['card_no'];
    $card_img_f    = $row['card_img_f'];
    $card_img_b    = $row['card_img_b'];
    $reg_no        = $row['reg_no'];
    $q_img_f       = $row['q_img_f'];
    $q_img_b       = $row['q_img_b'];
    $p_img_1       = $row['p_img_1'];
    $p_img_2       = $row['p_img_2'];
    $p_img_3       = $row['p_img_3'];
    $p_img_4       = $row['p_img_4'];
    $about         = $row['about'];
    $password      = $row['password'];
    $employee_id   = employee_ID($service);
    $emp_id        = preg_replace('/\s+/', ' ', $employee_id);
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');
    date_default_timezone_set("Asia/Kolkata");
    $today = date("Y-m-d");
    $sql   = "INSERT INTO employee(service_id, city_id, gender_id, qualification_id, identity_id, emp_id, first_name, last_name, birthday, mobile_no, email, card_no, card_img_f, card_img_b, reg_no, q_img_f, q_img_b, p_img_1, p_img_2, p_img_3, p_img_4, about, approve, apply_date_time, date_time, password)";
    $sql .= "VALUES('$service','$city','$gender','$qualification','$identity_id','$emp_id','$first_name','$last_name','$birthday','$mobile_no','$email','$card_no','$card_img_f','$card_img_b','$reg_no','$q_img_f','$q_img_b','$p_img_1','$p_img_2','$p_img_3','$p_img_4','$about','0','$date','$today','$password')";
    $result1 = query($sql);
    confirm($result1);
    // Delete old data
    $sqlDelete = "DELETE FROM employee_request WHERE id = '$accept_id'";
    query($sqlDelete);
    header("location: page-employee-request.php");
    set_message("<div class='alert alert-info'>
              <strong>Approved</strong> successfull.</div>
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