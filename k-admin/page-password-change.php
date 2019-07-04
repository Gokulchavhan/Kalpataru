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
                        <h4 class="page-title">Change Password</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Kalpataru</a>
                            </li>
                            <li>
                                Setting
                            </li>
                            <li class="active">
                                Change Password
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="header-title m-t-0" >
                            <center>
                            Change Your Password
                            </center>
                            </h3>
                            <?php display_message(); ?>
                            <?php validate_changePassword(); ?>
                            <form method="post" action="?" style="margin-top:50px;">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-sm-4 form-control-label">Current Password:<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input id="hori-pass1" name="current_password" type="password" placeholder="Current Password" required
                                        class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-sm-4 form-control-label">Password:<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input id="hori-pass1" name="password" type="password" placeholder="Password" required
                                        class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-sm-4 form-control-label">Confirm Password:
                                        <span class="text-danger">*</span></label>
                                        <div class="col-sm-7">
                                            <input data-parsley-equalto="#hori-pass1" name="confirm_password" type="password" required
                                            placeholder="Retype new password" class="form-control" id="hori-pass2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Update
                                            </button>
                                            <button type="reset"
                                            class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="visible-lg" style="height: 79px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/k_a_footer.php"); ?>