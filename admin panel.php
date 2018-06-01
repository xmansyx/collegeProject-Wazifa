 <?php session_start(); 
      if (!isset($_SESSION['username'])) {
      header('Location: log in.php');
    }
    else{
    	if ($_SESSION['type']!='admin') {
    		header('Location: home.php');
    	}
    	}

    	      	include 'model/database.php'; 
      	$db=new database();?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="UTF-8">
    <title>Wazifa Admin Panel</title>
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
          Admin Panel
            
          </h1>
           
        </section>


        <section class="content">
        	<h2>website control panel</h2>
  <p>here you can view all website data and remove from them</p>
  <div class="panel-group">
  <div class="btn-group pull-right" role="group" aria-label="...">
  <a href="model/GeneratePdf.php?kind=comment"><button type="button" class="btn btn-primary">get comment full report ? </button></a>

</div>
    <div class="panel panel-default">
      <div class="panel-heading">All Site Comments <span class="badge badge-default badge-pill"><?php echo count($db->showallcomments())?></span></div>
      <div class="panel-body">
      	<?php 

      	$comments=$db->showallcomments();
      	foreach ($comments as $comment) : ?>
      		<div class="list-group">
				  <a href="profile.php?id=<?php echo $comment['id'];?>" class=" "><?php echo $comment['firstname']." ".$comment['lastname']?></a> commented in a post
			</div>
      	
      	<?php endforeach ?>
      </div>
    </div>
    <div class="btn-group pull-right" role="group" aria-label="...">
  <a href="model/GeneratePdf.php?kind=likes"><button type="button" class="btn btn-primary">get likes full report ? </button></a>

</div>
    <div class="panel panel-default">
      <div class="panel-heading">All Site Likes <span class="badge badge-default badge-pill"><?php echo count($db->showalllikes())?></span></div>
      <div class="panel-body">
      <?php
      	$likes=$db->showalllikes();
	      	foreach ($likes as $like) : ?>
	      		<div class="list-group">
					  <a href="profile.php?id=<?php echo $like['id'];?>" class=""><?php echo $like['firstname']." ".$like['lastname']?> </a>liked a post
				</div>
      	
      	<?php endforeach ?>

      </div>
    </div>
    <div class="btn-group pull-right" role="group" aria-label="...">
  <a href="model/GeneratePdf.php?kind=user"><button type="button" class="btn btn-primary">get users full report ? </button></a>

</div>
    <div class="panel panel-default">
      <div class="panel-heading">All Site Users <span class="badge badge-default badge-pill"><?php echo count($db->showallusers())?></span></div>
      <div class="panel-body">
      	<?php
      		$users=$db->showallusers();
		      	foreach ($users as $user) : ?>
		      		<div class="list-group">
						  <a href="profile.php?id=<?php echo $user['id'];?>" class=""><?php echo $user['firstname']." ".$user['lastname']?> </a>is a member in Wazifa
					</div>
      	
      			<?php endforeach ?>

      </div>
    </div>

  </div>
        </section>
  

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
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

  </body>
</html>
