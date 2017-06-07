<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location: ../log in.php');
}

echo $_POST['firstname'];
include '../model/database.php';
$db = new database();
	if ($db->updatesettings($_POST['username'],$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password'],$_SESSION['id'])) {
		header('location: ../profile.php');
	}
	


else{
	//header('location: ../home.php');
}
?>