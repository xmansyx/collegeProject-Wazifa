<DOCTYPE! html>

<head>
 <?php session_start(); 
        if (isset($_SESSION['username'])) {
       header('Location: home.php');
      }?>
    <meta charset="UTF-8">
    <title>wazifa | Log in</title>
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
<body class="login-page">
     
    <div class="login-box">
      <div class="login-logo">
        <a href="home.php"><b>waz</b>ifa</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?php if (isset($_GET['reg'])) { ?>
          <div class="alert alert-success" role="alert">
          <?php
              if ($_GET['reg']=='done') {
                echo "<span class='glyphicon glyphicon-ok-sign'></span><strong>well done!</strong> thank you for registration ";
              }
              elseif ($_GET['reg']=='email') {
               echo "<span class='glyphicon glyphicon-ok-sign'></span>an email have been sent to you with your password ";
              }?>
               </div>
              <?php
              }?>
              <?php if (isset($_GET['err'])) { ?>
          <div class="alert alert-danger" role="alert">
          <?php
              if ($_GET['err']=='emptyfield') {
                echo "<span class='glyphicon glyphicon-ok-sign'> please enter your username and password</span>";
              }
             
              elseif ($_GET['err']=='loginwrong') {
                echo "<span class='glyphicon glyphicon-ok-sign'>wrong username or password</span>";
              }?>
               </div>
              <?php
              }?>
     
        <p class="login-box-msg">Sign in</p>
        <form action="controllers/logincontrol.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="username" name="username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
                                 
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">log In</button>
            </div><!-- /.col -->
          </div>
        </form>
                 <a href="Reset password.php"> <button type="submit" class="btn btn-link btn-block ">Reset password </button></a>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="register.php" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

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
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  
</body>
</html>