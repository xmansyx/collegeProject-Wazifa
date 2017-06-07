<?php
include '../model/member.php';
$member = new member();
session_start();
if (isset($_SESSION['id'])) {
	if (isset($_POST['post'])&& !empty($_POST['post'])) {
		if($member->addpost($_SESSION['id'],$_POST['post'])){
			header('location: ../profile.php');
		}
		else{
			echo "something went wrong";
		}
}
	else{
	header('Location: ../home.php');
}
 } 


?>