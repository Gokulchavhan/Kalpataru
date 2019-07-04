

<?php
if (isset($_SESSION['email']) || isset($_COOKIE['email'])) {
    $email  = $_SESSION['email'];
    $email  = $_COOKIE['email'];
    $sql    = "SELECT * FROM admin WHERE email ='$email'";
    $result = query($sql);
    confirm($result);
    $row      = fetch_array($result);
    $admin_id = $row['id'];
    $dp       = $row['profile_picture'];
}
?>
 
<body>
  <div id="wrapper">
    <div class="topbar">
      <div class="topbar-left">
      </div>
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <ul class="nav navbar-left">
            <li>
              <button type="button" class="button-menu-mobile open-left waves-effect">
              <i class="dripicons-menu"></i>
              </button>
            </li>
          </ul>
          <ul class="nav navbar-right list-inline">
       <!--      <li class="list-inline-item">
              <div class="dropdown">
                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                  <i class="dripicons-bell"></i>
                  <span class="badge badge-pill badge-pink">4</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-lg user-list notify-list">
                  <li class="list-group notification-list m-b-0">
                    <div class="slimscroll">
                      <a href="javascript:void(0);" class="list-group-item">
                        <div class="media">
                          <div class="media-left p-r-10">
                            <em class="fa fa-diamond bg-primary"></em>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                            <p class="m-0">
                              There are new settings available
                            </p>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0);" class="list-group-item">
                        <div class="media">
                          <div class="media-left p-r-10">
                            <em class="fa fa-cog bg-warning"></em>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">New settings</h5>
                            <p class="m-0">
                              There are new settings available
                            </p>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0);" class="list-group-item">
                        <div class="media">
                          <div class="media-left p-r-10">
                            <em class="fa fa-bell-o bg-custom"></em>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">Updates</h5>
                            <p class="m-0">
                              There are <span class="text-primary font-600">2</span> new updates available
                            </p>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0);" class="list-group-item">
                        <div class="media">
                          <div class="media-left p-r-10">
                            <em class="fa fa-user-plus bg-danger"></em>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">New user registered</h5>
                            <p class="m-0">
                              You have 10 unread messages
                            </p>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0);" class="list-group-item">
                        <div class="media">
                          <div class="media-left p-r-10">
                            <em class="fa fa-diamond bg-primary"></em>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                            <p class="m-0">
                              There are new settings available
                            </p>
                          </div>
                        </div>
                      </a>
                      <a href="javascript:void(0);" class="list-group-item">
                        <div class="media">
                          <div class="media-left p-r-10">
                            <em class="fa fa-cog bg-warning"></em>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">New settings</h5>
                            <p class="m-0">
                              There are new settings available
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </li> -->
            <li class="dropdown user-box list-inline-item">
              <a href="#" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                <img src="images/admin_image/<?php echo $dp; ?>" alt="user-img" class="rounded-circle user-img">
              </a>
              <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                <li><a href="page-profile.php" class="dropdown-item">Profile</a></li>
                <li><a href="page-password-change.php" class="dropdown-item">Settings</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="page-logout.php" class="dropdown-item">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    

    <div class="left side-menu">
      <div class="slimscroll-menu" id="remove-scroll">
        
        <div id="sidebar-menu">
          
          <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Navigation</li>
            <li>
              <a href="index.php"><i class="fi-air-play"></i><span>Dashboard</span></a>
            </li>
<?php if($admin_id == 1){ ?>
            <li><a href="page-city.php"><i class="mdi mdi-city"></i><span>City</span></a></li>
            <li><a href="page-service-time.php"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Time</span></a></li>
            <li><a href="page-service-price.php"><i class="fa fa-money" aria-hidden="true"></i><span>Price</span></a></li>
            <li><a href="page-gender.php"><i class="fa fa-transgender" aria-hidden="true"></i><span>Gender</span></a></li>
            <li>
              <a href="javascript: void(0);"><i class="fi-briefcase"></i><span>Services</span> <span class="menu-arrow"></span></a>
              <ul class="nav-second-level nav" aria-expanded="false">
                <li><a href="page-service.php">Services</a></li>
                <li><a href="page-assign-service.php">Assign Service</a></li>
                <li><a href="page-service-category.php">Service Category</a></li>
              </ul>
            </li>
<?php } ?>
            <li>
              <a href="javascript: void(0);"><i class="mdi mdi-worker"></i><span>Employee</span><span class="menu-arrow"></span></a>
              <ul class="nav-second-level nav" aria-expanded="false">
                <li><a href="page-employee.php">Employee</a></li>
                <li><a href="page-employee-request.php">Employee Request</a></li>
              </ul>
            </li>
<?php if($admin_id == 1){ ?>
            <li><a href="page-identity-card.php"><i class="fa fa-id-card"></i><span>E-Identity Card</span></a></li>
            <li><a href="page-qualification.php"><i class="fa fa-graduation-cap"></i><span>E-Qualification</span></a></li>
            <li><a href="page-admin.php"><i class="fa fa-user-plus"></i><span>Admin</span></a></li>
             <li><a href="page-testimonials.php"><i class="fa fa-trophy" aria-hidden="true"></i><span>Testimonials</span></a></li>
<?php } ?>
            <li><a href="contact-info.php"><i class="mdi mdi-contact-mail"></i><span>Contact Info</span></a></li>
          </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>


