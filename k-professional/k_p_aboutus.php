<?php include("includes/k_p_header.php"); ?>
<?php include("includes/k_p_nav.php"); ?>

<?php 
if (logged_in_KP()) {
   redirect("k_p_task_list.php");
}
 ?>


<style type="text/css">
  .c{
    text-align: justify;
    font-size: 20px;
  }
</style>
<div id="page_title">
  <div class="container text-center">
    <div class="panel-heading">About Us</div>
    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">About Us</li>
    </ol>
  </div>
</div>
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 about_l"> <img src="images/about/desk.png" alt="desk" /> </div>
      <div class="col-md-6 col-sm-6">
        <p class="c">Kalpataru is recognized as the fastest-growing startup in India. We are a mobile marketplace for local services. We help customers hire trusted professionals for all their service needs. We are staffed with young, passionate people working tirelessly to make a difference in the lives of people by catering to their service needs at their doorsteps. We provide housekeeping services which consist of Plumbers, Electricians, Carpenters, Cleaning and Pest Control. We also provide personal services like beauty, spa, mobile and other appliance repairs etc. Be it getting a plumbing job done, improving your fitness through yoga, learning to play the guitar, decorating your home or getting candid photos of your wedding clicked, we are a sure shot destination for your service needs.</p>
        <p class="c">We base on the latest and most modern technology to create and provide you a perfect  blog theme WordPress. Cleaning is also compatible with many utility tools which help you to use Cleaning WordPress theme easily. Some of them are: </p>
      </div>
    </div>
  </div>
</div>
<section class="team-area">
  <div class="container">
    <h1 class="panel-heading text-center">Meet the visionaries</h1>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="single-team-member text-center">
          <div class="img-holder"> <img src="images/about/Team1.png" class="img-circle" alt="Awesome Image"> </div>
          <div class="text-holder text-center">
            <h3>Subrata Das</h3>
            <p>Co-Founder</p>
            <ul class="social-links">
              <li><a href="https://www.facebook.com/Hi.I.am.Subrata"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="https://twitter.com/subratadasbca"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="https://www.instagram.com/subrata_das_/"><i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
              <li><a href="https://plus.google.com/106444073183665484815"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="single-team-member text-center">
          <div class="img-holder"> <img src="images/about/Team2.png" class="img-circle" alt="Awesome Image"> </div>
          <div class="text-holder text-center">
            <h3>Amiya Maity</h3>
            <p>Co-Founder</p>
            <ul class="social-links">
              <li><a href="https://www.facebook.com/iamAmiyaMaity"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="https://twitter.com/iamAmiyaMaity"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
              <li><a href="https://plus.google.com/110261723681212663183"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="single-team-member text-center">
          <div class="img-holder"> <img src="images/about/Team3.png" class="img-circle" alt="Awesome Image"> </div>
          <div class="text-holder text-center">
            <h3>Arup Panda</h3>
            <p>Co-Founder</p>
            <ul class="social-links">
              <li><a href="https://www.facebook.com/arup15"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="https://twitter.com/ArupPanda15"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="https://www.instagram.com/aruppanda15/"><i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
              <li><a href="https://plus.google.com/100733859991938362515"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="single-team-member text-center">
          <div class="img-holder"> <img src="images/about/Team4.png" class="img-circle" alt="Awesome Image"> </div>
          <div class="text-holder text-center">
            <h3>Ramanath Mandal</h3>
            <p>Co-Founder</p>
            <ul class="social-links">
              <li><a href="https://www.facebook.com/swaroj"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="https://twitter.com/iam_munna007"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
              <li><a href="https://plus.google.com/100733859991938362515"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            </ul>
          </div>
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
  </section>
  <?php include("includes/k_p_footer.php"); ?>