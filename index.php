<?php include("includes/header.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#city').on('change', function() {
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxData.php',
                data: 'country_id=' + countryID,
                success: function(html) {
                    $('#service').html(html);
                }
            });
        } else {
            $('#service').html('<option value="">Select country first</option>');
        }
    });
});
</script>

<?php include("includes/nav.php"); ?>
<?php search_services(); ?>
<?php display_message(); ?>
<section id="banner" class="home-one">
  <div class="container text-center parallax-section">
    <div class="row text-center">
      <div class="col-md-12">
        <h1 class="panel-heading">Your Service Expert</h1>
        <p class="caption">Book Expert home cleaners and handymen at a moment's notice. just pick a<br/>
        time and we'll do the rest</p>
        <div class="s003">
          <form action="?" method="POST" autocomplete="off">
            <div class="inner-form">
              <div class="input-field first-wrap">
                <div class="input-select">
                  <select name="city" id="city" data-trigger="" name="choices-single-defaul">
                    <option placeholder="" selected="" value="0" disabled="">Select city</option>
                    
<?php

$sql = "SELECT * FROM city WHERE status = 0 ORDER by city_name ASC";
$result = (query($sql));

if (row_count($result) > 0)
  {
  while ($row = mysqli_fetch_array($result))
    {
    echo '<option value="' . $row['id'] . '">' . $row['city_name'] . '</option>';
    }
  }
  else
  {
  echo '<option value="">City not available</option>';
  }

?>


                  </select>
                </div>
              </div>
              <div class="input-field second-wrap">
                <input id="city" type="text" list="service" name="search" placeholder="Search for a service" autocomplete="off" required="" />
                <datalist name="service" id="service"  style="">
                </datalist>
              </div>
              <div class="input-field third-wrap">
                <button class="btn-search" id="mySubmit" type="submit" name="submit" disabled>
                <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
      <p>E.g. Salon at Home, Plumber, Wedding Photographer</p>
    </div>
  </div>
</div>
</section>
<section id="howitwork">
<div class="container text-center">
  <h1 class="panel-heading">How it works</h1>
  <div class="row">
    <div class="col-md-3 col-xs-offset-0 step-one"> <img  src="images/Book.png" alt="Book" class="img-circle htw" />
      <h4>Book</h4>
      <p>Select the date and time like<br />
      your perofessional to show up</p>
    </div>
    <div class="col-md-1 hidden-xs hidden-sm"> </div>
    <div class="col-md-3 step-two"> <img  src="images/Schedule.png" alt="Schedule" class="img-circle" />
      <h4>Schedule</h4>
      <p>Certified Taskers comes over<br/>
      and done your task</p>
    </div>
    <div class="col-md-1 hidden-xs hidden-sm"> </div>
    <div class="col-md-3"> <img  src="images/Relax.png" alt="Relax" class="img-circle" />
      <h4>Relax</h4>
      <p>your task is completed to your<br/>
      satisfaction - guranteed</p>
    </div>
  </div>
</div>
</section>
<section id="services">
<div class="container text-center">
  <h1 class="panel-heading">Our services</h1>
  <ul class="services-list">
    
<?php

$sql = "SELECT * FROM services WHERE status = 0 ORDER by name ASC";
$result = (query($sql));

if (row_count($result) > 0)
  {
  while ($row = mysqli_fetch_array($result))
    {
    $id = $row['id'];
    $name = $row['name'];
    $about = $row['about'];
    $image = $row['img2'];
    $ID = encode($id);
    echo "  <li><a href='service-details.php?id=$ID'><img src='k-admin/images/service_icon/" . $image . "' alt='$name' /><br />$name</a></li>";
    }
  }
  else
  {
  echo '<option value="">Service not available</option>';
  }

?>

  </ul>
</div>
</section>
<section id="trust-security">
<div class="container text-center">
  <h1 class="panel-heading">Your Trust and Security</h1>
  <div class="row text-left">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="icon_box_one">
        <div class="icons"><img src="images/time.png" alt="SAVES" /></div>
        <div class="box_content">
          <h4>SAVES YOU TIME</h4>
          <p>We helps you live smarter, giving you time to focus on what's most important.</p>
          <a href="term-and-conditions.php" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="icon_box_one">
          <div class="icons"><img src="images/Safety.png" alt="Safety" /></div>
          <div class="box_content">
            <h4>For Your Safety</h4>
            <p>All of our Helpers undergo rigorous identity checks and personal interviews. Your safety is even our concern too.</p>
            <a href="term-and-conditions.php" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="icon_box_one">
            <div class="icons"><img src="images/best.png" alt="Best"  /></div>
            <div class="box_content">
              <h4>Best-Rated Professionals</h4>
              <p>Our experienced taskers perform their tasks with dedication and perfection. We appreciate your reviews about the service.</p>
              <a href="term-and-conditions.php" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="icon_box_one">
              <div class="icons"><img src="images/Equipped.png" alt="Equipped" /></div>
              <div class="box_content">
                <h4>We Are Well Equipped</h4>
                <p>Let us know if you have any specific equirement, otherwise our guys carry their own supplies.</p>
                <a href="term-and-conditions.php" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="icon_box_one">
                <div class="icons"><img src="images/touch.png" alt="Always" /></div>
                <div class="box_content">
                  <h4>Always In Touch</h4>
                  <p>Book your service online on one tap, keep a track of your service status and also keep in touch with your Helper.</p>
                  <a href="term-and-conditions.php" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="icon_box_one">
                  <div class="icons"><img src="images/cash.png" alt="cash" /></div>
                  <div class="box_content">
                    <h4>Cash-Free Facility</h4>
                    <p>Pay through secure online mode only after your job is done.</p>
                    <a href="term-and-conditions.php" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section id="numbers">
            <div class="container text-center">
              <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                  
                  <div class="counter_box text-center">
                    <div class="counter_icon"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></div>
                    <div class="counter_number counter"><span >100</span>%</div>
                    <h4 class="counter_name">Quality</h4>
                  </div>
                  
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  
                  <div class="counter_box text-center">
                    <div class="counter_icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <div class="counter_number counter"><span >250</span>+</div>
                    <h4 class="counter_name">People Working</h4>
                  </div>
                  
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  
                  <div class="counter_box text-center">
                    <div class="counter_icon"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                    <div class="counter_number counter"><span >1</span> Years</div>
                    <h4 class="counter_name">Years Experience</h4>
                  </div>
                  
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                  
                  <div class="counter_box text-center">
                    <div class="counter_icon"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
                    <div class="counter_number counter"><span >900</span>+</div>
                    <h4 class="counter_name">Happy Smiles</h4>
                  </div>
                  
                </div>
              </div>
            </div>
          </section>





<section id="testimonails">
            <div class="container text-center">
              <h1 class="panel-heading">Expand your service business with Kalpataru</h1>
              <div class="row">
                <div class="col-md-12">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel ">
 <?php 
 $sql = "SELECT * FROM testimonials ORDER BY id DESC";
                $result=(query($sql));
                if(row_count($result)<=0)
                {
                  echo "Not found";
 } else {
  $count = 0;
                  while($row =fetch_array($result)) {
                  $count++;
                  
                  $emp_id=$row["employee_id"];

?>

                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic<<?php  ?>" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                     <div class="carousel-inner text-center">








<?php

$sqlD    = "SELECT * FROM employee WHERE id = '$emp_id'";
          $resultD = (query($sqlD));
          $countD  = 1;
          while ($rowD = fetch_array($resultD)) {
             
              $first_name      = $rowD["first_name"];
              $last_name       = $rowD["last_name"];
              $service_id       = $rowD["service_id"];
              $profile_picture  = $rowD["profile_picture"];
              $about       = $rowD["about"];
              $id = $rowD["id"];
              if($id % 2 == 0){
              ?>
                  <div class="item active">
                        <div class="avatar">
                          <?php $profile_picture; ?>

                          <img class="img-circle" src="k-professional/uploads/profilePicture/<?php echo $profile_picture; ?>" alt="Profile picture" width="75" height="75" /></div>
                        <h3><?php echo $first_name." ".$last_name; ?></h3>
                        <strong>
                      <?php 

                          $s_id    = $rowD["service_id"];
                          $sqlS    = "SELECT * FROM services WHERE id = '$s_id'";
                          $resultS = query($sqlS);
                          confirm($resultS);
                          $rowS = fetch_array($resultS);
                          echo ucwords($rowS['name']);

                      ?>
                        </strong>
                        <p><?php echo $about; ?></p>
                      </div>
                
              <?php
            }else{
              ?>
              <div class="item">
                        <div class="avatar">
                          <?php $profile_picture; ?>

                          <img class="img-circle" src="k-professional/uploads/profilePicture/<?php echo $profile_picture; ?>" alt="Profile picture" width="75" height="75" /></div>
                        <h3><?php echo $first_name." ".$last_name; ?></h3>
                        <strong>
                      <?php 

                          $s_id    = $rowD["service_id"];
                          $sqlS    = "SELECT * FROM services WHERE id = '$s_id'";
                          $resultS = query($sqlS);
                          confirm($resultS);
                          $rowS = fetch_array($resultS);
                          echo ucwords($rowS['name']);

                      ?>
                        </strong>
                        <p><?php echo $about; ?></p>
                      </div>
              <?php
            }
        }
      }
    }

 ?>


</div>
       </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="fa fa-angle-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="fa fa-angle-right"></span> </a> </div>
                  </div>
                </div>
              </div>
            </section>










          
         <!--  <section id="testimonails">
            <div class="container text-center">
              <h1 class="panel-heading">Expand your service business with Kalpataru</h1>
              <div class="row">
                <div class="col-md-12">
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel ">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner text-center">
                      <div class="item active">
                        <div class="avatar"><img class="img-circle" src="images/clinte1.png" alt="clinte1" /></div>
                        <h3>Sitaram Das</h3>
                        <strong>Wedding Photographer</strong>
                        <p>From earning 10K a month to being totally booked from November till February -- My Kalpataru Journey.</p>
                      </div>
                      <div class="item">
                        <div class="avatar"><img class="img-circle" src="images/testimonails2.png" alt="clinte2" /></div>
                        <h3>Sulekha Rana</h3>
                        <strong>Make-up Artist</strong>
                        <p>Kalpataru has given me an opportunity to showcase my work through a convenient platform. It’s all One CLICK away.</p>
                      </div>
                      <div class="item">
                        <div class="avatar"><img class="img-circle" src="images/testimonails3.png" alt="clinte3" /></div>
                        <h3>Santu Jana</h3>
                        <strong>Fitness Trainer</strong>
                        <p>In the past one year UrbanClap has given me business worth Rs. 4.5Lakh+ and has enabled me in quitting my MNC job and follow my passion.</p>
                      </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="fa fa-angle-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="fa fa-angle-right"></span> </a> </div>
                  </div>
                </div>
              </div>
            </section> -->
            
            <section id="call-to-action">
              <div class="container free_consultation">
                <div class="row">
                  <div class="col-md-10 col-sm-10 col-xs-12 text-left">
                    <h2>Are you a professional looking to grow your service business?</h2>
                    <p>we are always ready to welcome you!</p>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-12 m-text-center text-right"> <a href="http://localhost/kalpataru/k-professional/index.php" target="_blank" class="btn btn-primary btn-outline">Join Now </a> </div>
                </div>
              </div>
            </section>
            
<script src="search/js/extention/choices.js"></script>
<script type="text/javascript">
const choices = new Choices('[data-trigger]', {
  searchEnabled: false,
  itemSelectText: '',
});
</script>
            
<script type="text/javascript">
$(document).ready(function() {
    $("#city").val("active");
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#city').val("0");

    $('#city').change(function() {
        selectVal = $('#city').val();

        if (selectVal == 0) {
            $('#mySubmit').prop("disabled", true);
        } else {
            $('#mySubmit').prop("disabled", false);
        }
    })

});
</script>
<?php include("includes/footer.php"); ?>