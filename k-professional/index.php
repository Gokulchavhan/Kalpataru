<?php include("includes/k_p_header.php"); ?>
<?php include("includes/k_p_nav.php"); ?>
<link rel="stylesheet" type="text/css" href="css/my_style.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">

<?php 
if (logged_in_KP()) {
   redirect("k_p_task_list.php");
}
 ?>


<?php
if (isset($_GET['alert'])) {
?>
<script>
$(window).load(function(){
swal("Congratulations!", "You have successfully signed up as a partner on Kalpataru!", "success");
});
</script>
<?php
}else{
?>
<script type="text/javascript">
Swal.fire(
'Good job!',
'You clicked the button!',
'success'
)
</script>
<?php
}
?>
<section id="banner" class="home-two">
  <div class="container text-center home_two_banner">
    <div class="row text-center">
      <div class="col-md-12">
        <h1 class="panel-heading">Expand your service business with Kalpataru</h1>
        <p class="caption">Join a community of 65,000+ professionals who have successfully <br/>
        grown their business with Kalpataru.</p>
        
        
        <div class="wrapper fadeInDown">
          <?php if(!logged_in_KP()): ?> 
          <div id="formContent">
            <?php display_message(); ?>
            <?php validate_user_login(); ?>
            <div class="fadeIn first">
              <br>
            </div>
            <form method="post" action="" autocomplete="off">
              <input type="text" id="login" class="fadeIn second" name="username" placeholder="Enter your Username">
              <input type="text" id="password" style="-webkit-text-security: square;" class="fadeIn third" name="password" placeholder="Password">
              <div class="form-group text-center">
                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                <label for="remember" style="color: black;"> Remember Me</label>
              </div>
              <input type="submit" class="fadeIn fourth" style="margin-top: -12px;" value="Log In" name="signIn">
            </form>
            <div id="formFooter">
              <a class="underlineHover" href="k_p_recover.php">Forgot Password?</a>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>







<section id="testimonails">
  <div class="container text-center">
    <h1 class="panel-heading">Testimonials</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="cmsmasters_quotes cmsmasters_quotes_grid quote_two">
          <div class="cmsmasters_quotes_list">




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

<?php

$sqlD    = "SELECT * FROM employee WHERE id = '$emp_id'";
          $resultD = (query($sqlD));
         
          while ($rowD = fetch_array($resultD)) {
             
              $first_name      = $rowD["first_name"];
              $last_name       = $rowD["last_name"];
              $service_id       = $rowD["service_id"];
              $profile_picture  = $rowD["profile_picture"];
              $about       = $rowD["about"];




              if($count == 5){
                break;
              }else{
                if($count % 2 == 0){


 ?>




    <div class="cmsmasters_quote">
              <article class="cmsmasters_quote_inner">
                <div class="cmsmasters_quote_img_info_wrap">
                  <div class="cmsmasters_quote_image" style="margin-top: -20px;">
                    <?php if(empty($rowD['profile_picture'])) {?>
                      <img src="images/demo/clinte1.png">
                    <?php }else{ ?>
                  <img src="uploads/profilePicture/<?php echo $rowD['profile_picture']; ?>" class="img-circle" alt="Cinque Terre" width="95" height="80">
                <?php } ?>
                  </div>
                  <div class="cmsmasters_quote_info_wrap">
                    <h3 class="cmsmasters_quote_title"><?php echo $first_name." ".$last_name; ?></h3>
                    <h5 class="cmsmasters_quote_subtitle">

 <?php  

                          $s_id    = $rowD["service_id"];
                          $sqlS    = "SELECT * FROM services WHERE id = '$s_id'";
                          $resultS = query($sqlS);
                          confirm($resultS);
                          $rowS = fetch_array($resultS);
                          echo ucwords($rowS['name']);

                      ?>
                    </h5>
                  </div>
                </div>
                <div class="cmsmasters_quote_content">
                  <p><?php echo $about; ?> <?php echo $countD; ?></p>
                </div>
              </article>
            </div>
  </div>
              <?php
            }else{
              ?>
        
          <div class="cmsmasters_quotes_list">
      <div class="cmsmasters_quote">
              <article class="cmsmasters_quote_inner">
                <div class="cmsmasters_quote_img_info_wrap">
                  <div class="cmsmasters_quote_image">
                    <!-- <img src="images/02home/clinte3.png" alt="Kevin" /> -->
                    <?php if(empty($rowD['profile_picture'])) {?>
                      <img src="images/demo/clinte1.png">
                    <?php }else{ ?>
                  <img src="uploads/profilePicture/<?php echo $rowD['profile_picture']; ?>" class="img-circle" alt="Cinque Terre" width="175" height="175">
                <?php } ?>
                  </div>
                  <div class="cmsmasters_quote_info_wrap">
                    <h3 class="cmsmasters_quote_title"><?php echo $first_name." ".$last_name; ?></h3>
                    <h5 class="cmsmasters_quote_subtitle">


 <?php 

                          $s_id    = $rowD["service_id"];
                          $sqlS    = "SELECT * FROM services WHERE id = '$s_id'";
                          $resultS = query($sqlS);
                          confirm($resultS);
                          $rowS = fetch_array($resultS);
                          echo ucwords($rowS['name']);

                      ?>
                    </h5>
                  </div>
                </div>
                <div class="cmsmasters_quote_content">
                  <p><?php echo $about; ?></p>
                </div>
              </article>
            </div>

              <?php
            }
            
        }
      }
    }
}
 ?>




        
      <!--       <div class="cmsmasters_quote">
              <article class="cmsmasters_quote_inner">
                <div class="cmsmasters_quote_img_info_wrap">
                  <div class="cmsmasters_quote_image"><img src="images/clinte1.png" alt="Kevin" /></div>
                  <div class="cmsmasters_quote_info_wrap">
                    <h3 class="cmsmasters_quote_title">Kevin Austin</h3>
                    <h5 class="cmsmasters_quote_subtitle">Lorem Ipsum</h5>
                  </div>
                </div>
                <div class="cmsmasters_quote_content">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's typesetting industry. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's typesetting industry.</p>
                </div>
              </article>
            </div> -->


















      
          <!--   <div class="cmsmasters_quote">
              <article class="cmsmasters_quote_inner">
                <div class="cmsmasters_quote_img_info_wrap">
                  <div class="cmsmasters_quote_image"><img src="images/02home/clinte4.png" alt="Kevin" /></div>
                  <div class="cmsmasters_quote_info_wrap">
                    <h3 class="cmsmasters_quote_title">Kevin Austin</h3>
                    <h5 class="cmsmasters_quote_subtitle">Lorem Ipsum</h5>
                  </div>
                </div>
                <div class="cmsmasters_quote_content">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's typesetting industry. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's typesetting industry.</p>
                </div>
              </article>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
           
<?php include("includes/k_p_footer.php"); ?>