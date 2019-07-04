<?php
if (isset($_COOKIE['username'])) {
  $_SESSION['username'] = $_COOKIE['username'];
  $sql = "SELECT * FROM employee WHERE emp_id ='$_COOKIE[username]'";
  $result = query($sql);
  confirm($result);
  $row=fetch_array($result);
  $service_id = $row["service_id"];
}
else if (isset($_SESSION['username'])) {
  $sql = "SELECT * FROM employee WHERE emp_id ='$_SESSION[username]'";
  $result = query($sql);
  confirm($result);
  $row=fetch_array($result);
  $service_id = $row["service_id"];
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

#header .nav li a {
    color: #3a3a3a;
    font-size: 15px;
    text-transform: none;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    padding: 0px;
}

</style>
<body>
  <div id="wrapper" class="home_two">
    <header id= "header" data-spy="affix" data-offset-top="60" data-offset-bottom="60">
      <div class="container">
        <div class="row">
          <div class="col-md-12  col-sm-12 col-xs-12 col-sm-12">
            <nav class="navbar">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="index.php"><img class="logo-dark hidden-xs"  src="images/logo.png" alt="" /> <img class="logo-dark hidden-lg hidden-md hidden-sm"  src="images/logo.png" alt="" /></a> </div>
                <div class="main-menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  
<?php
$sql1    = "SELECT id FROM orders WHERE service_id = $service_id AND status = 0 ";
$result1 = query($sql1);
if(row_count($result1)>=0){
  $i1 = 0;
while ($row1 = fetch_array($result1)) {
    $i1++;
}
}
?>
                <ul class="nav navbar-nav navbar-right">
<?php if(!logged_in_KP()): ?>

                  <li><a href="index.php">Home</a></li>
                  <li><a href="k_p_aboutus.php">About</a></li>
<?php endif; ?>
                  
<?php if(logged_in_KP()): ?>
                  <li><a href="k_p_task_list.php" >Task List <i class="fa fa-bell" style="font-size:20px;color:black" aria-hidden="true"><span class="badge badge-success" style="color: white; background-color: red;"><?php echo $i1; ?></span></i></a></li>
<?php endif; ?>

<?php if(!logged_in_KP()): ?>
                  <li><a href="k_p_contacts.php">Contact Us</a></li>

<?php endif; ?>

<?php if(!logged_in_KP()): ?>
                  <li><a href="k_p_signup.php" >Sign Up</a></li>
<?php endif; ?>

<?php if(logged_in_KP()): ?>
               
                  <li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    
<?php
  echo ucwords($row['first_name']);
  echo " ";
  echo ucwords($row['last_name']);
?>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="k_p_edit_profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Edit Profile</a></li>
                    <li><a href="k_p_working_history.php"><i class="fa fa-tasks" aria-hidden="true"></i> Working History</a></li>
                    <li><a href="k_p_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
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