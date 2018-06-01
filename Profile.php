 <?php session_start(); 
 $hisprofile = 1;
 include 'model/database.php';
        if (!isset($_SESSION['username'])) {
            header('Location: log in.php');
          }
             
          elseif(isset($_GET['id']))  { 
            if ($_GET['id']==$_SESSION['id']) {
                        $hisprofile=1;
                       }
                       else{
                        $hisprofile=0;
                       }
                     }
      
      $db=new database();
      if($hisprofile){
              $image = $_SESSION['img'];
              $name = $_SESSION['firstname']." ".$_SESSION['lastname'];
              $username = $_SESSION['username'];
              $id = $_SESSION['id'];
              } 
      else{
               $profiles = $db->getuserprofilebyid($_GET['id']);
               if (count($profiles)!=0) {
                 foreach ($profiles as $profile ) {
                  $image = $profile['img'];
                }
               }
                
                $users = $db->getuserinfobyid($_GET['id']);
                if(count($users)!=0){
                foreach ($users as $user ) {
                  $name = $user['firstname']." ".$user['lastname'];
                  $username = $user['username'];
                  $email = $user['email'];
                  $id = $user['iduser'];
                }}
                }
      ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Wazifa-Profile</title>
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
            Profile
            <small>wazifa</small>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              

              <!-- Form Element sizes -->
              
                   <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Friends</h3>
              
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="display: block;">
                  <ul class="users-list clearfix">
                    <?php 

                      $resaults =$db->showfriendlist($id);
                 //     echo count($resaults);
                      if (count($resaults)!=0){
                      foreach ($resaults as $resault) { ?>
                        <li>
                      <img src="<?php echo $resault['img']?>" alt="User Image">
                      <a class="users-list-name" href="profile.php?id=<?php echo $resault['iduser']?>"><?php echo $resault['firstname'];?></a>
                    </li>
                      <?php }}
                    ?>
                    
                    
                  </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
                <!-- /.box-body -->
                <div class="box-footer text-center" style="display: block;margin-bottom:2%;">
                  <a href="friendslist.php" class="uppercase">View All Friends</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->

              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Followers</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="display: block;">
                  <ul class="users-list clearfix">
                    <?php 

                      $resaults2 =$db->showfollowlist($id);
                     //echo count($resaults2);
                      if (count($resaults2)!=0){
                      foreach ($resaults2 as $resault1) { ?>
                        <li>
                      <img src="<?php echo $resault1['img']?>" alt="User Image">
                      <a class="users-list-name" href="profile.php?id=<?php echo $resault1['iduser']?>"><?php echo $resault1['firstname'];?></a>
                    </li>
                      <?php }}
                    ?>
                    
                    
                  </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
                <!-- /.box-body -->
                <div class="box-footer text-center" style="display: block;margin-bottom:2%;">
                  <a href="followers list.php" class="uppercase">View All Followers</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->

           <div class="box box-primary"style="margin-bottom:2%;">
                <div class="box-header">
                  <h3 class="box-title">Add new Post</h3>
                </div><!-- /.box-header -->
              <div class="box-body">
                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Upload Photo</button>
                    <button type="submit" class="btn btn-primary" style="margin-left:5%;">Post</button>
                  </div>
               
              </div><!-- /.box -->
              <!-- Input addon -->
             <?php 
 $posts = $db->showhomeposts($id);
         $i=0;
foreach ($posts as $post) :?>
 <div class="panel panel-primary">
        <div class="panel-heading">
        <?php echo $post['id'];

        $i++;?>
        </div>
          <div class="pane-body">
            <?php echo $post['postcontent'];?>
          </div>
          <div class="panel-footer  text-center">
            <div class="btn-group btn-block" role="group" aria-label="...">
              <a type="button" class="btn btn-default" onclick="myFunction(this,'blue') href="#"">like</a>
              <a type="button" class="btn btn-default" href="#num<?php echo $i;?>">comment</a>
              <a type="button" class="btn btn-default" href="#">share</a>
            </div>
            </div>
            <div class="panel-footer  text-center">
              <form>
                <div class="box-body">
                      <textarea class="form-control " placeholder="add your comment" name="post" id="num<?php echo $i;?>"></textarea>
                      <input type="submit" value="comment" class="btn btn-default" >
                </div>
              </form>
            </div>
           
        </div>

<?php endforeach; ?>

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Personal information</h3>
                  <?php if (!$hisprofile): ?>
                  <form action="controllers/addfriend.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <input type="submit" name="add friend" value="addfriend" class="btn btn-default inline">
                      
                    
                  </form>
                  <form action="controllers/addfollow.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <input type="submit" name="addfollow" value="follow" class="btn btn-default inline">
                      
                    
                  </form>
                  <?php endif ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">
                  </form>
                    <!-- text input -->
                    <div class="form-group">
                      <div class="box">
            <div class="box-header with-border" id="welcome">
              <h3 class="box-title">Welcome....<?php echo $name; ?></h3>
              <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body" style="background:#ecf0f5;">

              <img src="<?php echo $image?>" class="img-circle"style="margin-left:30%;" id="wel-img">
            
            </div>
            <button class="btn btn-info btn-lg""><a href="updateprofile.php" >Update Profile</a></button>
            <form action="controllers/uploaaaaaaaaaaaaaaaaaaaad.php" method="post" enctype="multipart/form-data"> 
              <label class="btn btn-file btn-link pull-right"> browse 
                <input type="file" name="fileToUpload" id="fileToUpload">
              </label>
              <input type="submit" value="Upload" name="submit" class="btn btn-primary pull-right">
            </form>
            <!-- /.box-body -->
            <div class="box-footer" style="display: block;">
              
            </div><!-- /.box-footer-->
          </div>
                    </div>
                    <div class="form-group">
                      
                    </div>

                    <!-- input states -->
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">General</label>
                      <table>
                      <tbody><tr>
                    <td><h4>Name: <?php echo $name; ?><h4></td>
                    <td></td>
                    </tr>
                    <tr>
                      <td><h4>Nic-name: <?php echo $username; ?><h4></td>
                      <td></td>
                    </tr>
                    <?php if (!$hisprofile) { ?>
                      <tr>
                      <td><h4>E-mail: <?php echo $email ?></h4></td>
                      <td></td>
                    </tr>
                   <?php }?>
                    
                  </tbody></table>
                    </div>
                    <div class="box-footer" style="display: block;">
              
            </div><!-- /.box-footer-->
                    <div class="form-group has-warning">
                      <label class="control-label" for="inputWarning">Education</label>
                      
                    </div>
                    <div class="box-footer" style="display: block;">
              
            </div><!-- /.box-footer-->
                    <div class="form-group has-error">
                      <label class="control-label" for="inputError"> Last Jobs </label>
                      
                    </div>
                    <div class="box-footer" style="display: block;">
              
            </div><!-- /.box-footer-->
            
            <div class="form-group has-warning">
                      <label class="control-label" for="inputWarning">Education</label>
                      
                    </div>
                    <div class="box-footer" style="display: block;">

                    <!-- checkbox -->
                   <div class="form-group has-error">
                      <label class="control-label" for="inputError"> Intersts </label>
                      
                    </div>
                    <div class="box-footer" style="display: block;">
              
            </div><!-- /.box-footer-->

                   
                      <div class="checkbox">
                        
                      </div>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        
                      </div>
                      <div class="radio">
                        
                      </div>
                      <div class="radio">
                        
                      </div>
                    </div>

                    <!-- select -->
                    <div class="form-group">
                      
                    </div>
                    <div class="form-group">
                      
                    </div>
                    <div class="form-group">
                     
                    </div>

                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

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
