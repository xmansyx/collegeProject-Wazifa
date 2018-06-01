<?php


include_once 'database.php';
//include_once 'post.php';
//include_once 'profile.php';
include_once 'Email_config.php';
//include_once 'message.php';
class member  {


Public Function set_age($age){
	$this->age=$age;
}
Public Function get_age($age){
	return $this->age;
}

Public Function Addpost($member_id,$content){
  $db=new database();

	$return_value=$db->addpost($member_id,$content);
    if($return_value){
        return true;
    }
 

 else {
        return false;  
    }

}
Public Function like($post_object,$member){
  
    $p_id=$post->post_id;
    $user_id=$member->$user_id;
    $type='like';
    $owner=$post->p_owner;
    $retuen_value=$DB_object->addliketoDB($user_id,$p_id);
if(isset($retuen_value))
    
addnotification($type,$user_id,$owner);

return $retuen_value; 
}
Public Function removeLike($post_object,$member){
  $p_id=$post->post_id;
    $retuen_value=$DB_object->removelikefromDB($member->user_id,$p_id);
return $retuen_value;
}


Public function comment($post_object,$member_object,$text){
 $added=false;
 $type='comment';

     $comment_author = $member->user_id;
     $content = $text;
 $added=$DB_object->addcommenttoDB($comment_author,$p_id,$content);
if(isset($added)){
  addnotification($type,$user_id,$owner);
}

 return $added;
}

Public Function share($post_object,$member_object){
    
    $p_id=$post_object->post_id;
    $user_id=$member_object->user_id;
   $type='share';
        $retuen_value=$DB_object->addsharetoDB($user_id,$p_id);
    
if(isset($retuen_value)){
   addnotification($type,$user_id,$owner);
}
return $retuen_value;

}
Public Function retrievpassword($member_mail){
   $db=new database();
    $data=$db->getuserinfobyemail($member_mail);
    if (count($data)!=0) {
       foreach ($data as $one => $value) {
     $member_password=$one['password'];
     $member_name= $one['username'];
    }
     $email_body="Welcome :".$member_name."<br>"."your password is"."<h5>".$member_password."</h5>";
  $email_body.="<br><center><font color='blue'><font face='Times New Roman' size='2'><i>© All Copyrights Reserved For <a href='' title=''>Wazifa</i></font></a></font></center>";
  $subject="Password recovery";
  $returntype=SendEmail($member_mail, $subject, $email_body);
return $returntype;
     } 
    
else{
  return false;
}
}
Public Function viewhisprofile($member_object){

 $member_id=$member_object->$user_id;
$return_value=$Db_object->getuserinfobyid($member_id);
   
    
}
Public function sendMessage($m_requeste,$m_selected,$content){
  $sender=$m_requeste;
  $reciver=$m_selected;
 sendmessage($sender,$reciver,$content);

}
Public Function viewMessage($messageid){
  $db = new database();  
 $re = $db-> get2usermessages($messageid);
 return $re;
}
Public Function viewMessages($member_id){
  $db = new database();
  $re =$db->getallusermessages($member_id);
  return $re;

}

Public Function Follow($m_requested,$m_selected){

 $requsted_id=$m_requested->user_id;
 $selcted_id=$m_selected->user_id;
  $retuen_value=$Db_object->addfollow($requsted_id,$selcted_id);
  if(isset($return_value)){
    addnotification($type,$user_id,$owner);
  }
  return $retuen_value;

}


Public Function Addfriend($m_request,$m_selected){
  $requsted_id=$m_request->user_id;
 $selcted_id=$m_selected->user_id;
 $return_value=$Db_object->addfriend( $selcted_id,$requsted_id);
 return return_value;
}

Public Function viewfollowers($member_object){
  
  
  $output=$Db_object->showfollowlist($member_object->user_id);
//  $followers_num=count($output);
  return $output;
  
}
Public Function Acceptfriend($m_request,$m_selected){
  $requsted_id=$m_request->user_id;
 $selcted_id=$m_selected->user_id;

$return_value=$Db_object->Acceptfriend($selcted_id,$requsted_id);
 return return_value;
}
public function viewfriends($member_object){
  $output=$Db_object->showfriendlist($member_object->user_id);
  $friends_num=count($output);
return $output;
}
public function viewnotification($userid){
  $Db_object = new database();
   $output=$Db_object->viewnotification($userid);
  //$notifications_num=count($output);
   return $output;

}
Public function updateprofile($user_id,$arr){
  $m_img=$arr['img'];
  $username=$arr['username'];
  $Mail=$arr['mail'];
  $age=$arr['age'];
  $intersts=$arr['intersts'];
  $jobs=$arr['jobs'];
  $education=$arr['education'];
  $skills=$arr['skills'];
 $retuen_value=$Db_object->updateprofile($user_id, $m_img,$username,$Mail,$age,$intersts,$education,$jobs);
return $return_value;
}
public function search($name){
  $db =new database();
  $resaults = $db->searchuser($name);
  return $resaults;
}
}
?>