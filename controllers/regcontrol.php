<?php 
include '../model/validation.php';
include '../model/visitor.php';
include_once '../model/database.php';

$validate =new validation();
$visitor= new visitor();
$db = new database();
$state = 1 ;
/* Form Required Field Validation */
foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	header( 'Location: ../register.php?err=emptyfield');
	$state = 0;
	break;
	}
}
/* Password Matching Validation */
if($state){
	if($_POST['password'] != $_POST['repassword'] ){ 
		header( 'Location: ../register.php?err=passmatch');
		$state = 0;
	}

	/* Email Validation */
	elseif( !$validate->validate_email($_POST['email'])){
		header( 'Location: ../register.php?err=emailerr');
		$state = 0;
	}
}


if ($state) {
	$info2=$db->getuserinfobyusername($_POST['username']);
	$info=$db->getuserinfobyemail($_POST['email']);
	if (count($info)==0 && count($info2)==0) {
		if ($visitor->checkinfo($_POST['username'],$_POST['email'],12,$_POST['password'],$_POST['fname'],$_POST['lname'])) {
			header( 'Location: ../log in.php?reg=done');
			//echo count($info);
		}
		else{
			header( 'Location: ../register.php?err=wrong');

		}	
	}
	else{
		header( 'Location: ../register.php?err=userexist');
	}
}


?> 