<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>
<div id="page_title">
  <div class="container text-center">
    <div class="panel-heading">services</div>
    <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Services</li>
    </ol>
  </div>
  </div>
  <section id="service_page">
    <div class="container text-center">
      <div class="row">

<?php
$sql = "SELECT * FROM services WHERE status = 0 ORDER by name ASC";
$result = (query($sql));

if (row_count($result) > 0)
  {
  $count = 0;
  while ($row = mysqli_fetch_array($result))
    {
    $count++;
    $id = $row['id'];
    $name = $row['name'];
    $about = $row['about'];
    $image = $row['img1'];
    $ID = encode($id);
    if ($count == 2)
      {
      echo <<<END
<div class="col-md-4 col-sm-6 col-xs-12 srevice_img active"> <a href="service-details.php?id=$ID"><img src="k-admin/images/service_image/$image" class="img-circle htw" alt="$name" /></a>
<h4><a href="service-details.php?id=$ID">$name</a></h4><p style="text-align: justify;">$about</p>
</div>
END;
      }
      else
      {
      echo <<<END
<div class="col-md-4 col-sm-6 col-xs-12 srevice_img"> <a href="service-details.php?id=$ID"><img src="k-admin/images/service_image/$image" class="img-circle htw" alt="$name" /></a>
<h4><a href="service-details.php?id=$ID">$name</a></h4><p style="text-align: justify;">$about</p>
</div>
END;
      }
    }
  }
  else
  {
  echo '<option value="">Service not available</option>';
  }

?>


      </div>
    </div>
  </section>
<section id="service_provider">
  <div class="container text-center">
    <h1 class="panel-heading">Worldwide largest home service provider</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="counter_box">
          <div class="counter_number_right">
            <div class="counter_number counter"><span class="stat-count">20000</span>+</div>
            <h4 class="counter_name">HAPPY CUSTOMERS</h4>
          </div>
        </div>
        <div class="counter_box">
          <div class="counter_number_right">
            <div class="counter_number counter"><span class="stat-count">10000</span>+</div>
            <h4 class="counter_name">SERVICE PROVIDERS</h4>
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
              <div class="avatar"><img class="img-circle" src="images/demo1.jpg" width="76" height="76" alt="clinte1" /></div>
              <h3>SUBHASISH NEOGI</h3>
              <strong>Appliances</strong>
              <p>A meeting was convened: no one denied my talents, but no one could gainsay my defects. In a kindly but firm way, my bosses said to me, “Sacks, you are a menace in the lab. Why don’t you go and see patients—you’ll do less harm.” Such was the ignoble beginning of a clinical career.</p>
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



<!-- <section id="testimonails">
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
<?php include("includes/footer.php");?>
