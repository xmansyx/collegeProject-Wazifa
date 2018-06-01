<?php
include_once 'DataBase.php';

class validation 
{  
//Public $user_object=new user();
  

	public function validate_email ($email)
{ 

        if (filter_var($email,FILTER_VALIDATE_EMAIL))
             {return true;}
        else
    	      {return false ;}

}	

public function valid_username ($username)
{ 
        if(isset($_POST['submit']))
                { if (empty($_POST['username'])) 
                      { $username=$_POST['username'];
                     if (strlen($username)< 7)
                     	{return true;}}
                     else{ return false;}
                }	 
       

} 
public function valid_name ($name)
{ 
        if(isset($_POST['submit']))
                { if (empty($_POST['name'])) 
                      { $username=$_POST['name'];
                     if (strlen($name)< 7)
                     	{return true;}}
                     else{ return false;}
                }	 
       

}


public function validate_password ($password)
{ 
   if(isset($_POST['submit']))
      { if(empty($_POST['password']== false))

                { $password= $_POST['password'];
                 if (strlen($password)<7)
      	            {return true;}}
      	        else
      	        	{ return false;}

}

}

public function validate_age ($date)
{ 
   if(isset($_POST['submit']))
      { if(empty($_POST['password']== false))

                { $password= $_POST['password'];
                 if (strlen($password)<7)
                    {return true;}}
                else
                  { return false;}

}

}

}


?>