<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location: ../log in.php');
}
include '../model/database.php';
$db = new database();
	if (isset($_GET['id'])) {
		if($db->accept_friend($_SESSION['id'],$_GET['id'])){
		header('location: ../profile.php');
	}
	

}
else{
	//echo "not";
	header('location: ../home.php');
}
?>