<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<?php
if(!loggedIn()){
  redirect("errors.php");
} 
?>


<div id="page_title">
  <div class="container text-center">
    <div class="panel-heading">book now</div>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Book Now</li>
    </ol>
  </div>
</div>
<section id="contact_information">
  <div class="container">

    <?php confirm_order(); ?>
    <?php display_message(); ?>

    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="contact_information_left ">
          <div class="booking_form">
            <div class="container-fluid">
              <div class="row">

                <form method="POST" action="?" autocomplete="off">
                  <h2>Contact Information</h2>
                  <p>This information will be used to contact you about your service</p>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control" id="name" name="fname" placeholder="First Name" type="text"/>
                  </div>
<?php if(isset($_GET['expert'])) {
$expert =  $_GET['expert'];
}
?>
<input type="hidden" name="expert" value="<?php echo $expert;  $_SESSION['expert'] = $expert; ?>">
<?php
?>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12 padding-r">
                    <input class="form-control" id="name1" name="lname" placeholder="Last Name" type="text"/>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control" id="email" name="email" placeholder="Email*" type="text"/>
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12 padding-r">
                    <input class="form-control" id="tel" name="tel" placeholder="Alternative contact number*" type="text"/>
                  </div>
                  <div class="clearfix"></div>
                  <hr />
                  <h2>Service Address</h2>
                  <p>Where would you like us to clean?</p>
                  <div class="form-group col-md-8 col-sm-8 col-xs-12 ">
                    <input class="form-control" id="address" name="address" placeholder="Address*" type="text"/>
                  </div>
                  <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-r">
                    <input class="form-control" id="apt_suite" name="city" placeholder="City*" type="text"/>
                  </div>
                  <div class="form-group col-md-8 col-sm-8 col-xs-12 ">
                    <input class="form-control" id="address" name="landmark" placeholder="Landmark*" type="text"/>
                  </div>
                  <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-r">
                    <input class="form-control" id="postcode" name="postcode" placeholder="Postcode*" type="text"/>
                  </div>
                  <div class="clearfix"></div>
                  <hr />
                  
                  <div class="clearfix"></div>
                  
                  <h2>Choose Your Service</h2>
                  <p>Enter your card information below. You will be charged after service has been rendered.</p>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control" id="card_number" name="card_number" placeholder="card number" type="text" />
                  </div>
                  <div class="form-group col-md-3 col-sm-3 col-xs-12 ">
                    <input class="form-control" id="month" name="month" placeholder="MM/YYYY" type="text" />
                  </div>
                  <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-r">
                    <input class="form-control" id="cvc" name="cvc" placeholder="CVC" type="text" />
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <p class="help-block"><img src="images/booking/cards.png" alt="booking" /></p>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <p class="help-block"><i class="fa fa-lock" aria-hidden="true"></i> <span>Safe and secure 256-BIT<br />
                    SSL encrypted payment.</span></p>
                  </div>
                  <div class="clearfix"></div>
                  <hr />
                  <p>By clicking the Book Now button you are agreeing to our Terms of Service and Privacy Policy.</p>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <button type="submit" class="btn btn-primary btn-skin" name="submit" > BOOK NOW</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      
    <!--   <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="contact_information_right text-center">
          <div class="booking_summary hidden-xs">
            <h1>Booking Summary</h1>
            <ul>
              <li><i class="fa fa-home" aria-hidden="true"></i>Home Cleaning</li>
            </ul>
            <div class="price_totle">
              <div class="subtotal">
                <div class="heading text-left">SUBTOTAL</div>
                <div class="price text-right">119.00</div>
              </div>
              <div class="subtotal">
                <div class="heading text-left">DISCOUNT</div>
                <div class="price text-right">17.85</div>
              </div>
              <div class="subtotal">
                <div class="heading text-left">TOTAL:</div>
                <div class="price text-right">101.15</div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>


<script type="application/javascript">
$(document).ready(function(){

$(function () {
$('#datetimepicker1').datetimepicker();
});

$(function () {
$('#datetimepicker3').datetimepicker({
format: 'LT'
});
});

});
</script>
<?php include("includes/footer.php"); ?>