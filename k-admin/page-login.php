<?php include("includes/k_a_header.php"); ?>

<?php 

    if(logged_admin()) {
        redirect("page-404.php");
    }

 ?>

<body class="bg-transparent" >
    <section>
        <div class="container" style="margin-top: -65px; margin-bottom: -65px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-page">
                        <div class="m-t-40 account-pages" >
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                <a href="page-login.php" class="text-success">
                                    <span><img src="assets/images/logo_k-admin.png" alt="Logo" height="100"></span>
                                </a>
                                </h2>
                             <h4 class="text-uppercase font-bold m-b-0">Login to your account!</h4>
                            </div>
                            <div class="account-content">
                            <center>
                                <?php display_message(); ?>
                                <?php admin_login(); ?>
                            </center>
                                <form enctype="multipart/form-data" class="form-horizontal" action="?" method="post" autocomplete="off">
                                    <div class="form-group m-b-25">
                                        <div class="col-12">
                                            <label for="emailaddress">Email address</label>
                                            <input name="email" class="form-control input-lg" type="email" id="emailaddress" required="" placeholder="john@deo.com">
                                        </div>
                                    </div>
                                    <div class="form-group m-b-25">
                                        <div class="col-12">
                                            <a href="page-recoverpw.php" class="text-muted float-right">Forgot your password?</a>
                                            <label for="password">Password</label>
                                            <input name="password" class="form-control input-lg" type="password" required="" id="password" placeholder="Enter your password">
                                        </div>
                                    </div>
                                    <div class="form-group m-b-20">
                                        <div class="col-12">
                                            <div class="checkbox checkbox-custom">
                                                <label>
                                                    <input name="remember" type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn w-lg btn-rounded btn-lg btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                        </div>
                                    </div>
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