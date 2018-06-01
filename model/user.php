<?php
include_once 'DataBase.php';
//include_once 'post.php';
 class user { 

	public  $username;
  public  $name;
	private $password;
	private  $email;
  private $userid;
 

 public function set_password($password){
        $this->password=$password;
    }
  public function get_password(){
        return $this->password;
    }
  public function set_id($id){
        $this->id=$id;
    }
  public function get_id(){
        return $this->id;
    }
     public function set_email($email){
        $this->email=$email;
    }
  public function get_email(){
        return $this->email;
    }



 Public function Login($username,$password)
   {    
    $DB_object=new DataBase();
    $resaults=$DB_object->loginbyusername($username,$password);

	return $resaults;

	 }
   public function setsession($userid,$username,$fname,$lname,$type,$img){
    if(session_start()){
    $_SESSION['username'] = $username;
    $_SESSION['id']   = $userid;
    $_SESSION['firstname'] = $fname;
    $_SESSION['lastname'] = $lname;
    $_SESSION['type']=$type;
    $_SESSION['img']=$img;

    return true;
    }
   }


  Public function Logout() {
session_start();
unset($_SESSION['username']);
unset($_SESSION['id']);
session_destroy();
header('Location: ../log in.php');
}



Public function search ($fname,$lname)
{//check search ***
  $DB_object=new DataBase();

               



 } 


Public function remove_post ($post_object,$userid)
{       $postid=$post_object->$post_id;
	$DB_object->removepost($postid,$userid);

}


Public function remove_comment ($userid,$post_object)

{    

   $commentid=$post_object->$comment_id;
   $DB_object->removecomment($userid,$post_object);

}


}

?>