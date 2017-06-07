<?php

include_once 'database.php';
include_once 'person.php';

 
 class Visitor extends Person
 {
 	  private $fname;
 	  private $lname;
    private $username;
    private $mail;
    private $password;


function getFname()
{
	return $this->fname;
}

function getLname()
{
	return $this->lname;
}
function getUsername()
{
	return $this->usrname;
}

function getMail()
{
	return $this->mail;
}

function getPassword()
{
	return $this->password;
}


  public function setFname($fname)
    {
        $this->fname = $fname;
    }

  public function setLname($lname)
    {
        $this->lname = $lname;
    }


  public function setUsername($username)
    {
        $this->username = $username;
    }


  public function setMail($mail)
    {
        $this->mail = $mail;
    }


  public function setPassword($password)
    {
        $this->password = $password;
    }
/* check function */

public function checkinfo($username,$email,$age,$password,$fname,$lname){
    $db= new database();

		if($db-> regNewUser($username,$email,$age,$password,$fname,$lname)){
      return true;		
    }
    else{
      echo "a7aa";;
    }


}
}