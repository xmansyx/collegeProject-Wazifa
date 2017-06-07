<?php
public class message{

include_once('dataBase.php');
include_once('member.php');
public $sender;
public $reciver;
public $content;

public void function sendmessage($senderid,$recieverid,$content)
{
if(isset($_SESSION['username']))
{
	if(isset($_post['go']) && $_post['go'] =='send')
	{
		if( empty($_post['content']))
		{
				echo "message not sent";
		}
		else
		{
		database->addmessage($senderid,$reciverid,$content);
		}
	}
}

}

public  function viewmessage($senderid,$recieverid)
{

$viewmessageArray=database->get2usermessages($senderid,$recieverid);

	for ($i=0; $i <count($viewmessageArray); $i++) { 
		$content=$viewmessageArray['content'];
	}
	return $content;
}
public  function viewmessages($userid)
{

$viewmessagesArray=database->getallusermessages($userid);
for($i=0;$i<count($viewmessagesArray);$i++)
{

	$content=$viewmessagesArray['content'];
}

return $content;

?>