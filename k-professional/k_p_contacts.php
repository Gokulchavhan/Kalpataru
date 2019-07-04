<?php include("includes/k_p_header.php"); ?>
<?php include("includes/k_p_nav.php"); ?>
<?php 
if (logged_in_KP()) {
   redirect("k_p_task_list.php");
}
 ?>

<style type="text/css">
  #page_title {
background: url(images/contact.png);
padding: 50px 0;
}
</style>
<div id="page_title">
  <div class="container text-center">
    <div class="panel-heading">contact us</div>
    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Contact us</li>
    </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    
    <?php validate_contact(); ?>
    <?php display_message(); ?>
    
  </div>
</div>
<section id="Contact_form">
  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="booking_form">
          <div class="container-fluid">
            <div class="row">
              <form method="post">
                <h2>Contact Form</h2>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control" id="name" name="name" placeholder="Full Name" type="text"/>
                  <span>
<?php 
  if(isset($_GET['msg'])) echo $_GET['msg'];
?>
                  </span>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control" id="Email" name="email" placeholder="Email" type="text"/>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control" id="Subject" name="subject" placeholder="Subject*" type="text"/>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control" id="Phone_number" name="phone_number" placeholder="Phone Number" type="text"/>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <div class="input-group">
                    <textarea class="form-control" rows="6" name="message" placeholder="message"></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <button class="btn btn-primary btn-skin" name="submit" type="submit"> Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="about_info">
          <h2>Contact info</h2>
          <p><i class="fa fa-map-marker" aria-hidden="true"></i> Fuljhore, Durgapur, West Bengal 713206, India</p>
          <p><i class="fa fa-envelope" aria-hidden="true"></i> sub7ata@gmail.com</p>
          <p><i class="fa fa-phone" aria-hidden="true"></i> +91 9932259291, +91 9932311891</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include("includes/k_p_footer.php"); ?>