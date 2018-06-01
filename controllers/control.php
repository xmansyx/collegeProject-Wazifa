<?php
include '../model/database.php';
$db = new database();
{$to=$_POST['to'];
$subject=$_POST['subject'];
$messege=$_POST['message'];

//$username=$_session['username'];
if (isset($_POST['send']) && !empty($_POST['to']) && 
	!empty($_POST['subject']) && !empty($_POST['messege'])) 
{ $db=new database();
 $userinfo= $db-> getuserinfobyusername($to);
 if(count($userinfo) !=0)
{ 
}$db->sendMessage($username,$to,$messege);
}
}
?>  