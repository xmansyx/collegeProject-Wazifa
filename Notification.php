<?php
    include 'model/member.php';
                  
     session_start(); 
        if (!isset($_SESSION['username'])) {
       header('Location: log in.php');
      }?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <title>Wazifa/All Notification</title>
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
    <!-- Site wrapper -->
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

      <!-- =============================================== -->


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            All Notification
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
              <div class="box box-primary">
                <div class="box-header with-border">
                  
                  <div class="box-tools pull-right">
                  </div><!-- /.box-tools -->
                  <div class="col-sm-6 search-form">
                          <form action="#" class="text-right">
                            <div class="input-group">
                              <input type="text" class="form-control input-sm" placeholder="Search Notifcation">
                              <div class="input-group-btn">
                                <button type="submit" name="q" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </form>
                        </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->

                <div class="table-responsive mailbox-messages">
                  <table class="table table-hover table-striped">
                      <tbody>
                        <?php 
                   
                  //if(isset( $_SESSION['username'])&&isset( $_SESSION['password'])){}
                     $member=new member();
                   $arr=$member->viewnotification($_SESSION['id']);
                   //$userid= $arr['user_iduser']; 
                   //$out=getuserinfobyid($userid); 
                   //$username=$arr['username'];

                 foreach ($arr as $resault ) : ?>
                        <tr>
                          <td class='mailbox-star'><a href="#"><i class='fa fa-star-o text-yellow'></i></a></td>
                          <td class='mailbox-name'><lable name='person_name'><?php echo$resault['type'];?></lable></td>
                          <td class='mailbox-subject'><lable name='subject'><b> <?php echo $resault['firstname']." ".$resault['lastname'];?></b> </lable></td>
                          <td class='mailbox-date'>
                        </tr>  
                         <?php endforeach;?>                   
                     </tbody>
                    </table>
                  </div>
                 </div>
               
               



            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

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
    <!--page script-->
    <script>
      $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $("input[type='checkbox']", ".mailbox-messages").iCheck("uncheck");
          } else {
            //Check all checkboxes
            $("input[type='checkbox']", ".mailbox-messages").iCheck("check");
          }
          $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
          e.preventDefault();
          //detect type
          var $this = $(this).find("a > i");
          var glyph = $this.hasClass("glyphicon");
          var fa = $this.hasClass("fa");          

          //Switch states
          if (glyph) {
            $this.toggleClass("glyphicon-star");
            $this.toggleClass("glyphicon-star-empty");
          }

          if (fa) {
            $this.toggleClass("fa-star");
            $this.toggleClass("fa-star-o");
          }
        });
      });
    </script>
  </body>
</html>