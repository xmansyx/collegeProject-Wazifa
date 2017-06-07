<?php
session_start();
if (isset($_SESSION['username'])) {
	header('Location: ../home.php');
}
require_once '../model/member.php';
//require_once '../libs/phpmailer/phpmailer.php';
//require_once '../model/database.php';

$user=new member();
if(!empty($_POST['email'])){
	$mail=$_POST['email'];
	if(!$user->retrievpassword($mail)){
		header('Location:../Reset password.php?err=not');
	}
	//echo $mail;
}


else{
header('Location:../Reset password.php?err=empty');

}

?>