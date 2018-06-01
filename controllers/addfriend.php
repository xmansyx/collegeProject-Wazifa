<?php 
include '../model/database.php';
session_start();
if (!isset($_SESSION['username']) {
	header('Location: ../log in.php');
}

if (isset($_POST['addfriend'])) {
	$db->addfriend($_GET['id'],$_SESSION['id']);
}
else{
	header('Location: ../profile.php');
}


?>