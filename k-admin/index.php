<?php include("includes/k_a_header.php") ?>
<?php include("includes/k_a_nav.php") ?>
<?php
if (!logged_admin()) {
redirect("page-login.php");
}
?>
<?php
if (isset($_COOKIE['email'])) {
    $_SESSION['email'] = $_COOKIE['email'];
    $sql               = "SELECT * FROM admin WHERE email ='$_COOKIE[email]'";
    $result            = query($sql);
    confirm($result);
    $row = fetch_array($result);
} else if (isset($_SESSION['email'])) {
    $sql    = "SELECT * FROM admin WHERE email ='$_SESSION[email]'";
    $result = query($sql);
    confirm($result);
    $row = fetch_array($result);
}
?>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Welcome <?php echo ucwords($row['first_name']); ?> !</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Kalpataru</a>
                            </li>
                            <li class="active">
                                Dashboard
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

<?php
$sql1    = "SELECT id FROM city WHERE status = 0 ";
$result1 = query($sql1);
confirm($result1);
$i1 = 0;
while ($row1 = fetch_array($result1)) {
    $i1++;
}
?>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card widget-box-two widget-two-purple">
                        <div class="card-body">
                            <i class="mdi mdi-chart-line widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-uppercase text-white font-600 font-secondary text-overflow" title="Statistics">City</p>
                                <h2 class="text-white"><span data-plugin="counterup"><?php echo $i1; ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                            </div>
                        </div>
                    </div>
                </div>

<?php
$sql2    = "SELECT id FROM services WHERE status = 0 AND city_status = 0";
$result2 = query($sql2);
confirm($result2);
$i2 = 0;
while ($row2 = fetch_array($result2)) {
    $i2++;
}
?>
                <div class="col-xl-3 col-md-6">
                    <div class="card widget-box-two widget-two-info">
                        <div class="card-body">
                            <i class="mdi mdi-access-point-network widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-white text-uppercase font-600 font-secondary text-overflow" title="User Today">Services</p>
                                <h2 class="text-white"><span data-plugin="counterup"><?php echo $i2; ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                            </div>
                        </div>
                    </div>
                </div>
<?php
$sql3    = "SELECT id FROM assign_service_category WHERE status = 0 AND city_status = 0 AND assign_service_status = 0";
$result3 = query($sql3);
confirm($result3);
$i3 = 0;
while ($row3 = fetch_array($result3)) {
    $i3++;
}
?>
                <div class="col-xl-3 col-md-6">
                    <div class="card widget-box-two widget-two-pink">
                        <div class="card-body">
                            <i class="mdi mdi-timetable widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-uppercase text-white font-600 font-secondary text-overflow" title="Request Per Minute">Service Category</p>
                                <h2 class="text-white"><span data-plugin="counterup"><?php echo $i3; ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                            </div>
                        </div>
                    </div>
                </div>
<?php
$sql4    = "SELECT id FROM employee WHERE approve = 0 ";
$result4 = query($sql4);
confirm($result4);
$i4 = 0;
while ($row4 = fetch_array($result4)) {
    $i4++;
}
?>
                
                <div class="col-xl-3 col-md-6">
                    <div class="card widget-box-two widget-two-success">
                        <div class="card-body">
                            <i class="mdi mdi-cloud-download widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-white text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Employee</p>
                                <h2 class="text-white"><span data-plugin="counterup"><?php echo $i4; ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/k_a_footer.php"); ?>