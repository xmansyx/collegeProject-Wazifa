<?php
session_start();
 if (!isset($_SESSION['username'])) {
  header('Location: log in.php');
}?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Wazifa | Update Profile</title>
 <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar 2.2.5-->
    <link href="css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="css/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
    <!-- Theme style -->
    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="css/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="css/blue.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      <header class="main-header">
        <a href="home.php" class="logo"><b>Waz</b>ifa</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"> messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="newmessagses.php">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">

                    </ul>
                  </li>
                  <li class="footer"><a href="Notification.php">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $_SESSION['img'];?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">
                   <?php //echo "Omar";
                      echo($_SESSION['username']) ; ?> 
                     </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $_SESSION['img'];?>" class="img-circle" alt="User Image" />
                    <p>
                     <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; 
                     ?>
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="followers list.php">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="followinglist.php">Following</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="friendslist.php">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="Profile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <form action="controllers/logout.php" method="post">
                        <input type="submit" name="logout" value="logout" class="btn btn-default">
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $_SESSION['img'];?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>
                     <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];
                     ?>
                       
             </p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="search_resualts.php" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Profile
            <small>Here</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- Primary box -->
              <div class="box box-primary"style="margin-left:90%;">
                <form action="#" method="get">
                <div class="box-header" data-toggle="tooltip" title="" data-original-title="Header tooltip">
                  <h3 class="box-title">Change image</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body" style="display: block;">
                 <img src="<?php echo $_SESSION['img']; ?>" name="img" alt="my img" class="img-circle" style="margin-left:25%;">
                </div><!-- /.box-body -->
                <div class="box-footer" style="display: block;">
                  <button  type='submit' name='upload' style="width:40%; display:none;" class="btn btn-block btn-primary" disabled></button>
                </form>
                </div><!-- /.box-footer-->
              </div><!-- /.box -->
            </div>
            <div class="box box-primary"style="width:45%;margin-top:31%;margin-left:2%;">
                <div class="box-header">
                  <h3 class="box-title">Setting</h3>
                </div><!-- /.box-header -->
                <?php include 'model/database.php';
                $db = new database();
                $info=$db->getuserinfobyid($_SESSION['id']);
                foreach ($info as $key) {
                	$username=$key['username'];
                	$firstname=$key['firstname'];
                	$lastname=$key['lastname'];
                	$email=$key['email'];
                	$password=$key['password'];
                }

                ?>
                <!-- form start -->
                <form role="form" action="controllers/updatesettings.php" method="post">
                  <div class="box-body">
                    <div class="form-group">

                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text"  name="username"class="form-control" id="exampleInputEmail1" value="<?php echo $username; ?>">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" value="<?php echo $firstname; ?>">
                      <label for="exampleInputEmail1">Last Name</label>
                      <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" value="<?php echo $lastname; ?>">
                    <label for="exampleInputEmail1">Email adress</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>">

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $password; ?>">
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="save_setting"class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
              </section><!-- /.box -->
<div class="box box-primary"style="width:50%;margin-top:-43%;float:right;margin-right:1%;">
                <div class="box-header">
                  <h3 class="box-title">Others</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form action="#" method="post">
                  <div class="form-group">
                    <label>Education</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                      </div>
                      <input type="text" name="education" class="form-control pull-right" id="reservation" placeholder="Enter your Education">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                <label>Jobs</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                      </div>
                      <input type="text"name="jobs" class="form-control pull-right" id="reservation" placeholder="Enter your Jops">
                    </div><!-- /.input group -->
                  <!-- Date and time range -->
                  <div class="form-group">
                    <label>Intersts</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                      </div>
                      <input type="text" name="intersts"class="form-control pull-right" id="reservationtime" placeholder="Enter your interst">
                    </div><!-- /.input group -->
                   </div><!-- /.form group -->
               <div class="form-group">
                    <label>Skills</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                      </div>
                      <input type="text" name="skills"class="form-control pull-right" id="reservationtime" placeholder="Enter your Skills">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <!-- Date and time range -->
                  <div class="form-group">
                    <div class="input-group">
                     <button type="submit" name="save_others"class="btn btn-primary">Save</button>
                    </div>
                  </form>
                  </div><!-- /.form group -->

                </div><!-- /.box-body -->
              </div>
    <!-- jQuery 2.1.3 -->
     <script src="js/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='js/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="js/icheck.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  </body>
</html>
