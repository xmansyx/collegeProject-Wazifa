 <?php session_start(); 
        if (!isset($_SESSION['username'])) {
      header('Location: log in.php');
      }?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="UTF-8">
    <title>wazifa</title>
    
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

    <style>

.content-wrapper{height: 3200px;
margin-top: -100px;}


            .post
          {top: 70px;
            left :310px;
            margin-top: 100px;
            margin-left: 100px;
            width: 600px;
            height:180px;
            -webkit-box-shadow: 0 3px 8px rgba (0,0,0,.25);
            background-color: white;}
            .text{ top:50px;
              left: 0px;
              width: 590px;
              height: 60px;
              background-color: #e9f0f2;
              font-size: 25px;
              margin-left: -5px;
              margin-top: -25px;
            

            }
               #hed
          {
            left: 0px;
            top: 0px;
            background-color:white;
            width: 600px;
            height: 30px;
            border-radius: 3px/3px;
            font-size: 20px;
            color: #1b6192;
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;

          }
           #pos{
            width:600px;
            height: 70px;
            margin-left: 40px;
            border-color: blue;

          }
         #subpost{
            width: 85px;
            height: 30px;
            border-radius: 4px/4px;
            background-color: #142170;
            font-size: 15px;
            color: white;
            margin-left: 300px;

          }
              .one
      {

        height: 700px;
        width: 580px;
        background-color: #f9f9f9;
       margin-top: 10px;
        margin-left: 100px;
      }

         .two{
          height: 80px;
          width:  90px;
          margin-left: 10px;
          margin-top: 50px;
          border-radius: 50%;
          background-color: white;
          border-style: solid;
          border-color:#d7d7ec;
          }
          .img1{ height: 70px;
            width: 80px;
            border-radius: 50%
}
         .three{
           height: 50px;
           width: 200px;
           background-color: #f9f9f9;
           margin-left: 110px;
           border:3px solid #f9f9f9;
           margin-top: -70px;

         }
         .four{
          height: 20px;
           width: 80px;
           background-color:#f9f9f9;
           margin-left: 120px;
          border:3px solid #f9f9f9;
           margin-top: -25px;
           }
           .five{
            height: 230px;
           width: 550px;
           background-color:#f9f9f9;
           margin-left: 20px;
           border-style:solid;
           border-color: #fff;
           margin-top: 40px;
           border:5px solid  #fff;
           }
           .img2
           {
            height: 220px;
            width: 540px;
           }

           .six
            {
            height: 330px;
           width: 550px;
           background-color:#ebebf9;
           margin-left: 20px;
           border-style:solid;
           border-color: #fff;
           margin-top:0px;
           border:4px solid  #f9f9f9;
           }  
           #but1
           {width: 150px;
            height:30px;
            display: inline;
            margin-left: 20px;
            margin-top: 5px;}
         #but2
           {width: 150px;
            height: 30px;
            display: inline; margin-top: 5px;}
         #but3
           {width: 150px;
            height: 30px;
            display: inline;
            margin-top: 5px;}
            .siven 
            {
            height:270px;
           width: 530px;
           background-color:#f9f9f9 ;
           margin-left: 0px;
           
           margin-top: -30px;
           
           margin-left: 5px;
           } 
.eight
{
  height: 70px;
  width: 440px;
  background-color: #f9f9f9;
  margin-left: 80px;
  margin-top: -75px;
  border: 2px solid ##f9f9f9;
}
.eight1{
        height: 40px;
          width:  70px;
          margin-left: 0px;
          margin-top: 5px;
          border-radius: 50%;
          background-color:#f9f9f9;
          border-style: solid;
          border-color:#f9f9f9;

          
}
.img3{
  height: 40px;
  width: 60px;
  border-radius: 50%;
}
.eight2{
        height: 40px;
          width:  50px;
          margin-left: 0px;
          margin-top: -50px;
          border-radius: 50%;
          background-color: #f9f9f9;
          border-style: solid;
          border-color:#f9f9f9;
          
}
.img4
{
  height: 40px;
  width: 50px;
  border-radius: 50%;
}
.ten{height:40px;
  width:435px;
  margin-left:60px;
  margin-top:-5px;
  

}
#al2{

  margin-left: 30px;

}
#al3{
  
  margin-left: 110px;
  margin-top: -20px;
}
.hr1{margin-top: -0px;}
b{
font-size: 20px;

}
p{
  font-size: 15px;


}
h4{margin-top: 35px;}
    </style>
  
  
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
          <?php if ($_SESSION['username']=='admin'): ?>
            
          
          <hr>
            <div class="">
              <ul>
                <li><a href="admin panel.php" class="btn btn-primary">admin panel</a></li>
              </ul>
            </div>
            <?php endif ?>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->
      <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6 col-md-offset-2">
         <div class="box box-primary" style="margin-bottom:2%;">
                <div class="box-header">
                  <h3 class="box-title">Add new Post</h3>
                </div><!-- /.box-header -->
             
                  
                  <form method="post" action="controllers/postpublish.php">
                   <div class="box-body">
                    <textarea class="form-control" placeholder="Place some text here" name="post"></textarea>
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit" class="btn btn-primary " value="post"></input>
                  </div>
                  </form>
                 
               
              </div>

      <!-- =============================================== --> 
 <?php include 'model/database.php';
 $db = new database();
 $posts = $db->showhomeposts(3);
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



    










        </div>
 <!-- =============================================== -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2017-2018 >.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script>
function myFunction(elmnt,clr) {
    elmnt.style.color = clr;
}
</script>

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