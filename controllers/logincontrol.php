<?php 
include '../model/user.php';
$user = new user();
$state=1;	


	foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	header( 'Location: ../log in.php?err=emptyfield');
	$state = 0;
	break;
	}}
	


$info=$user->login($_POST['username'],$_POST['password']);

foreach ($info as $key ) {
	$username =$key['username'];
	$password =$key['password'];
	$userid =$key['iduser'];
	$fname=$key['firstname'];
	$lname=$key['lastname'];
	$type=$key['type'];
	$img=$key['img'];
}
if ($username!=$_POST['username'] && $password!=$_POST['password']) {
	header( 'Location: ../log in.php?err=loginwrong');
	//echo $username;
	$state = 0;
}
if($state){
	if ($user->setsession($userid,$username,$fname,$lname,$type,$img)) {
		header( 'Location: ../profile.php?id='.$userid);
	}
	
}
?>