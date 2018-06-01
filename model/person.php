<?php
{ include_once 'DataBase.php';


 class person {    
 	

 public function view_user_profile ($member_object){
 $DB_object=new DataBase();	

 	$member_id=$member_object->$user_id;
 	if ($_session['userid']==$member_id)
		{

			$member_object->viewhisprofile($member_id);

		}
    else
       {  
       	$profileArray=$DB_object->getuserinfobyid($member_id);
       	return $profileArray;
       }

	}  


	public function view_post ($post_object){
		 $DB_object=new DataBase();	

 $postid=$post_object->$post_id;
 $postArray=$DB_object->showuserposts($postid);
	 return $postArray;
	}
	}}