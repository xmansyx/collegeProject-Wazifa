<?php
 include 'database.php';


 class profile
 {
    
   // $db= new database();
    
 	public function Showinfo($userid)
 	{
 		$userifo =$db->getuserinfobyid($userid);
 		$userprofile = $db->getuserprofilebyid($userid);

 	}

	public function Showfriendlist($userid)
 	{
 		$db= new database();
 	    $userfriends=$db->Showfriendlist($userid);
 	    return $userfriends;
 	}

 	public function Showfollowlist($userid)
 	{
 		$db= new database();
 	    $userfollowers= $db->Showfollowlist($userid);
 	    return $userfollowers;	  
 	}

    public function showfollowinglist($userid)
 	{
 		$db= new database();
 	    $userfollowing= $db->showfollowinglist($userid);
 	    return $userfollowing;	  
 	}
 	/* function upload profile picture */

public function uploadphoto($referance,$userid)
{
	$db= new database();
if ($db->uploadphoto($referance,$userid))
	{return 1 ;}

else{
	return 0 ;}
}

 }