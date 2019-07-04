<?php
include("includes/k_a_header.php");
?>
<?php
if (!logged_admin()) {
    redirect("page-login.php");
}
?>
<?php
include("includes/k_a_nav.php");
?>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Contact Details</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Kalpataru</a>
                            </li>
                            <li>
                                <a href="#">Contact Info</a>
                            </li>
                            <li class="active">
                                Contact Details
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
           <?php
if (isset($_GET['con_id'])) {
    $con_id = $_GET['con_id'];
    
    $quer = "UPDATE messages SET status = 1 WHERE message_id = '$con_id' ";
    query($quer);
    
    $qry    = "SELECT * FROM messages WHERE message_id = '$con_id'";
    $result = query($qry);
    confirm($result);
    $row  = fetch_array($result);
    $date = $row["date_time"];
    $date = date("F d, Y", strtotime($date));
}
?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="clearfix">
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-sm-8 offset-sm-2">
                                    <div class="float-left m-t-30">
                                        <p><b>To,</b></p>
                                        <p style="margin-top: -20px;"><b>Kalpataru</b></p>
                                        <center>
                                        <h5>Subject: <?php echo $row['subject']; ?></h3>
                                        </center>
                                        <p><b>Dear Sir/Madam,</b></p>
                                        <p class="text-muted"style="text-align:justify;">
                                            <?php echo htmlspecialchars_decode($row["message"]); ?>
                                        </p>
                                        <div class="text-right">
                                            <h5 style="margin-top: 50px;"><b>Thanking you so much.</b></h5>
                                            <p class="text-left"><?php echo $date; ?></p>
                                            <h5 style="margin-top: -50px;"><b>Yours Truly,</b></h5>
                                            <p style="margin-top: -10px;"><b><?php echo $row['fullname']; ?></b></p>
                                            <p style="margin-top: -20px;"><i class="fa fa-mobile" aria-hidden="true"></i><b> Mob: <?php echo $row['mobile']; ?></b></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="d-print-none m-t-30 m-b-30">
                                <div class="text-left">
                                    <a href="contact-info.php" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <?php include("includes/k_a_footer.php") ?>