<?php include("includes/k_a_header.php"); ?>
<?php 

    if(logged_admin()) {
        redirect("page-404.php");
    }

 ?>
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
                                        <p class="text-muted m-b-0"><strong>Enter a verification code</strong><br>
                                        A text message with a varification code was send to subratadas@gmail.com</p>
                                    </div>
                                    <?php display_message(); ?>
                                    <?php validate_code(); ?>
                                    <form class="form-horizontal" action="#" method="POST">
                                        <div class="form-group">
                                            <div class="col-12">
                                                <label for="emailaddress">Enter One-time password</label>
                                                <input class="form-control" type="password" id="emailaddress" name="code" placeholder="**********" style="text-align: center;">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">

                                            <input type="hidden" class="hide" name="token" id="token" value="">
                                            <div class="col-12">
                                                <button class="btn w-lg btn-rounded btn-lg btn-primary waves-effect waves-light" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Back to <a href="page-login.php" class="text-dark m-l-5">Sign In</a></p>
                                </div>
                            </div> -->
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