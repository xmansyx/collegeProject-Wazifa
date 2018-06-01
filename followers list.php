<?php 
session_start();
if (!isset($_SISSION['username'])) {
  //header('Location: log in.php');
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>wazifa | followers</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/blue.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="css/_all-skins.min.css" rel="stylesheet" type="text/css" />

<style >
img {height: 50px;
width: 50px;
display: inline;}  
p{font-size: 20px;}
.three{height: 60px;
width: 100px;}
.one {margin-left: 180px;}
.six{margin-left: 80px;
margin-top: -40px;}
.five
{
  width: 600px;
  height: 90px;
  background-color: white;
}
.img1{margin-left: 190px;}
.div1{height: 600px;
width: 370px;
background-color:white;
border:50px;
border-color:black;}
.div2{height: 600px;
width: 300px;
margin-left: 400px;
margin-top: -600px;
background-color: white;
}
.p1{margin-top: -30px;
margin-left: 60px;
font-size: 25px;
margin-top: -50px;
margin-bottom: 50px;}
.table-responsive{
height: 700px;
width: 730px;
border: 50px;
border-color:black; 
}
</style>



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
        <section class="content-header no-margin">
          <h1 class="text-center">
            Followers List
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- MAILBOX BEGIN -->
          <div class="mailbox row">
            <div class="col-xs-12">
              <div class="box box-solid">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-3 col-sm-4">
                      <!-- BOXES are complex enough to move the .box-header around.
                                This is an example of having the box header within the box body -->
                      <div class="box-header">
                        <i class="fa fa-inbox"></i>
                        <h3 class="box-title">followers</h3>
                      </div>
                      <!-- compose message btn -->
                      <a class="btn btn-block btn-primary" href="Profile.php"><i class="fa fa-pencil"></i> Back to profile</a>
                      <!-- Navigation - folders-->
                      <div style="margin-top: 15px;">
                        <ul class="nav nav-pills nav-stacked">
                          <li class="header">Folders</li>
                          <li class="active"><a href="#"><i class="fa fa-inbox"></i> followers (<?php  include 'model/profile.php'; $profile = new profile(); echo count($profile->showfollowlist($_SESSION['id']))?>)</a></li>
                          
                        </ul>
                      </div>
                    </div><!-- /.col (LEFT) -->
                    <div class="col-md-9 col-sm-8" id="">
                      <div class="row pad">
                        
                        <div class="col-sm-6 search-form">
                          <form action="#" class="text-right">
                            <div class="input-group">
                              <input type="text" class="form-control input-sm" placeholder="Search">
                              <div class="input-group-btn">
                                <button type="submit" name="q" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <br>

                    
                     
                <div class="table-responsive">
                      <?php
                     // include 'model/profile.php';
                     // $profile = new profile();
                      $followerlist = $profile -> showfollowlist($_SESSION['id']);
                       foreach ( $followerlist as $follower) : ?>
                          <div class="div1">  
                            <ul>  
                                  <li>
                                      <img src="<?php echo $follower['img'];?>" class="friend-image"> 
                                    <a href="<?php echo "profile.php?id=".$follower['iduser'];?>"><?php echo $follower['firstname']." ".$follower['lastname'];?></a></li>
                              </ul>
                          </div>  
                        <?php endforeach;?>

                       </div>

                        
                     
                    

                      </div><!-- /.table-responsive -->
                    </div><!-- /.col (RIGHT) -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <div class="pull-right">
                    <small>Showing 1-12/1,240</small>
                    <button class="btn btn-xs btn-primary"><i class="fa fa-caret-left"></i></button>
                    <button class="btn btn-xs btn-primary"><i class="fa fa-caret-right"></i></button>
                  </div>
                </div><!-- box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col (MAIN) -->
          </div>
          <!-- MAILBOX END -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2017-2018.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Compose New Message</h4>
          </div>
          <form action="#" method="post">
            <div class="modal-body">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">TO:</span>
                  <input name="email_to" type="email" class="form-control" placeholder="Email TO">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">CC:</span>
                  <input name="email_to" type="email" class="form-control" placeholder="Email CC">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">BCC:</span>
                  <input name="email_to" type="email" class="form-control" placeholder="Email BCC">
                </div>
              </div>
              <div class="form-group">
                <textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-success btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment"/>
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>

            </div>
            <div class="modal-footer clearfix">

              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>

              <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Send Message</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
    <!-- Bootstrap WYSIHTML5 -->
    <script src="js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="js/icheck.min.js" type="text/javascript"></script>
    <!-- Page script -->
    <script type="text/javascript">
      $(function () {

        "use strict";

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });


        //When unchecking the checkbox
        $("#check-all").on('ifUnchecked', function (event) {
          //Uncheck all checkboxes
          $("input[type='checkbox']", ".table-mailbox").iCheck("uncheck");
        });
        //When checking the checkbox
        $("#check-all").on('ifChecked', function (event) {
          //Check all checkboxes
          $("input[type='checkbox']", ".table-mailbox").iCheck("check");
        });
        //Handle starring for glyphicon and font awesome
        $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function (e) {
          e.preventDefault();
          //detect type
          var glyph = $(this).hasClass("glyphicon");
          var fa = $(this).hasClass("fa");

          //Switch states
          if (glyph) {
            $(this).toggleClass("glyphicon-star");
            $(this).toggleClass("glyphicon-star-empty");
          }

          if (fa) {
            $(this).toggleClass("fa-star");
            $(this).toggleClass("fa-star-o");
          }
        });

        //Initialize WYSIHTML5 - text editor
        $("#email_message").wysihtml5();
      });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js" type="text/javascript"></script>
  </body>
</html>
