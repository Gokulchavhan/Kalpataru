<?php include("includes/k_a_header.php"); ?>
<?php 

    if(logged_admin()) {
        redirect("page-404.php");
    }

 ?>

 <?php password_reset();  ?>
 <?php display_message(); ?>
    <body class="bg-transparent">
        <section>
            <div class="container">
                <div class="row" style="margin-top: -30px; margin-bottom: -90px;">
                    <div class="col-sm-12">
                        <div class="wrapper-page">
                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                <a href="page-login.php" class="text-success">
                                    <span><img src="assets/images/logo_k-admin.png" alt="Logo" height="100"></span>
                                </a>
                                </h2>
                                </div>
                                <div class="account-content">
                                    <div class="text-center m-b-20">
                                        <p class="text-muted m-b-0"><strong>Reset your password</strong><br>
                                        Please choose a new password to finish signing in.</p>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="#">
                                        <div class="form-group">
                                            <div class="col-12">
                                                <label for="emailaddress">New password</label>
                                                <input class="form-control" name="password" type="password" id="emailaddress"  placeholder="**********" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-12">
                                                <label for="emailaddress">Re-enter new password</label>
                                                <input class="form-control" name="confirm_password" type="password" id="emailaddress" placeholder="**********" >
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn w-lg btn-rounded btn-lg btn-primary waves-effect waves-light" type="submit">Change Password</button>
                                            </div>
                                        </div>
                                        <input type="hidden" class="hide" name="token" id="token" value="<?php echo token_generator(); ?>">
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
             
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <script>
        var resizefunc = [];
        </script>
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>