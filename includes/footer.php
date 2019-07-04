
<style type="text/css">
  footer ul {
    list-style: none;
    margin: 0px;
    padding: 0px;
    display: inline-block;
     margin-right: 0px;
    vertical-align: top;
}


</style>
<footer>
  <div class="container-fluid footerbg">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> <h4>Kalpataru</h4><a href="#" class="footer-logo"></a>
        <p>Kalpataru is the fastest growing early stage startup in India right now. We are solving a huge problem helping customers discover, vet and buy trusted local services on the internet.</p>
        <div class="about_info">
          <p><i class="fa fa-map-marker" aria-hidden="true"></i> Fuljhore Road, Fuljhore, Durgapur, West Bengal 713206, India</p>
          <p><i class="fa fa-envelope" aria-hidden="true"></i> sub7ata@gmail.com</p>
          <p><i class="fa fa-phone" aria-hidden="true"></i> +91 9932259291</p>
        </div>
      </div>
      <div class="col-md-3">
        <h4>Services</h4> 
<div class="row">
  <div class="col-md-6">
    <ul>
<?php
$sql    = "SELECT *
        FROM services
        WHERE status = 0
        GROUP BY name
        ORDER BY name";
$result = (query($sql));
while ($row = mysqli_fetch_array($result)) {
    $id = $row["id"];
    if ($id % 2 == 0) {
        $SID  = encode($id);
        $name = $row['name'];
        echo "<li><a href='service-details.php?id=$SID'><i class='fa fa-caret-right' aria-hidden='true'></i>$name</li>";
        
    }
}
?> 
    </ul> 
  </div>
  <div class="col-md-6">
              <ul>
        <?php
$sql = "SELECT *
        FROM services
        WHERE status = 0
        GROUP BY name
        ORDER BY name" ;
$result=(query($sql));
  while($row = mysqli_fetch_array($result)) {
    $id = $row["id"];
   
    if($id%2!=0){

    ?>
 
        <li><a href="service-details.php?id=<?php echo encode($id); ?>"><i class="fa fa-caret-right" aria-hidden="true"></i><?php echo $row['name']; ?></a></li>

    <?php
  }
  }
?> 
    </ul> 
  </div>
  
</div>

      </div>
      <div class="col-md-2">
        <h4>About Us</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About us</a></li>
          <li><a href="service.php">Services</a></li>
          <li><a href="contacts.php">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h4>Singn up Newsletter</h4>
        <form action="#" method="post" class="newsletter">
          <div class="input-group">
            <input type="text" class="form-control" name="email" placeholder="Enter Email Address">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="email_registration"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
            </span> </div>
           
          </form>

          <p>Expand your service business with Kalpataru. <br>Join a community of 65,000+ professionals who have successfully grown their business with Kalpataru.</p>
     
        </div>
      </div>
      <div class="top_awro pull-right" id="back-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i> </div>
    </div>
  </div>

  <div class="container-fluid bottom-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="copyright pull-left">&copy; Kalpataru 2019 All Right Reserved</p>
          <ul class="footer-scoails pull-right">
            <li><a href="https://www.facebook.com/Hi.I.am.Subrata"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/subratadasbca"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://plus.google.com/106444073183665484815"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="https://in.pinterest.com/subratadasbca/"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCmRfwZ_SAI01xWZPpE5Q4SQ?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

</div>

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/owlcarousel/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
  (function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-106074231-1', 'auto');
ga('send', 'pageview');
</script>

</body>
</html>