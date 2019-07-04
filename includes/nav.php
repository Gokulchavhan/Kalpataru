<?php
if (isset($_COOKIE['mobile'])) {
    $_SESSION['mobile'] = $_COOKIE['mobile'];
    $sql                = "SELECT * FROM users WHERE mobile_no ='$_COOKIE[mobile]'";
    $result             = query($sql);
    confirm($result);
    $row = fetch_array($result);
    
} else if (isset($_SESSION['mobile'])) {
    $sql    = "SELECT * FROM users WHERE mobile_no ='$_SESSION[mobile]'";
    $result = query($sql);
    confirm($result);
    $row = fetch_array($result);
}
?>


<style type="text/css">
   #header{
border-bottom: 1px solid;
border-color: #CECECE;
}

#banner {
    padding: 60px 0 80px;
    color: #FFF;
    position: relative;
}

.navbar-brand .logo-dark {
   margin-top: -7px;
}
</style>


<body>
  <div id="wrapper" >
    <header id= "header" data-spy="affix" data-offset-top="60" data-offset-bottom="60">
      <div class="container">
        <div class="row">
          <div class="col-md-12  col-sm-12 col-xs-12 col-sm-12">
            <nav class="navbar">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="index.php"><img class="logo-dark hidden-xs"  src="images/logo.png" alt="" /> <img class="logo-dark hidden-lg hidden-md hidden-sm"  src="images/mobile_logo.png" alt="" /></a> </div>
                <div class="main-menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="service.php">Service</a></li>

                    <?php if(loggedIn()): ?>
                      <li><a href="mybooking.php">My Bookings</a></li>
                    <?php endif; ?>

                    <li><a href="contacts.php">Contact Us</a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                    <?php if(!loggedIn()): ?>
                    <li ><a href="login.php">Login / Sign Up</a></li>
                    <?php endif; ?>

                    <?php if(loggedIn()): ?>
                    <li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

                    <?php
                      echo ucwords($row['fullname']);
                    ?>

                    <span class="caret"></span>
                    </a>
                      <ul class="dropdown-menu">
                        <li><a href="edit-profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                      </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>

