<?php 
include '../model/database.php';
session_start();
if (!isset($_SESSION['username']) {
	header('Location: ../log in.php');
}

if (isset($_POST['addfollow'])) {
	$db->addfollow($_GET['id'],$_SESSION['id']);
}
else{
	header('Location: ../profile.php');
}

?>