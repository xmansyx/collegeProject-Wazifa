	ss<?php
	public class  report{
	include_once('dataBase.php');
	public $content;

	public  function generatereportlikes()
	{

		$sitelikes=database->showalllikes();
		$likesnumber=count($sitelikes);
		for ($i=0; $i <$likesnumber ; $i++) { 
			$fnames=$sitelikes['firstname'];
			$lastnames = $sitelikes['lastnames'];
			$images = $sitelikes['img'];
		}
	return $fnames,$lastnames,$images;
	}


	public function generatereportposts()
	{
		$sitepost=database->showallposts();
		$postnumber=count($sitepost);
		for ($i=0; $i <$postnumber ; $i++)
		     $fnames=$sitepost['firstname'];
		     $lastnames=$sitepost['lastnames'];
		     $images=$sitepost['img'];
		   }
		return $fnames,$lastnames,$images;
	}



	public  function generatereportcomments()
	{

		$sitecomment=database->showallcommments();
		$commentsnumber=count($sitecomment);
		$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		
	return $fnames,$lastnames,$images;
	}




	public  function generatereportusers()
	{

		$siteusers=database->showallusers();
		$usersnumber=count($siteusers);
		for ($i=0; $i <$usersnumber ; $i++) { 
			$fnames=$siteusers['firstname'];
			$lastnames = $siteuser['lastnames'];
			$images = $siteuser['img'];
		}

	return $fnames,$lastnames,$images;

	}