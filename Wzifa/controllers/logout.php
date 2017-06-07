

<?php
include '../model/user.php';
$user =new user();

session_start();
if (!isset($_SESSION['username'])) {
   header('Location: ../log in.php');
}
if (isset($_POST['logout'])) {
  $user->Logout();
}
?>