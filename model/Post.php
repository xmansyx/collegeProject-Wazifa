<?php


include_once 'database.php'

class Post 
{
 $db= new database();

 public function CalcLikes ($postid)
 {
 	return count(db->showpostlikes($postid));
    
 }

 public function CalcComments ($postid)
 {
 	return count(db->showpostcomments($postid));
 	
 }

 public function CalcShares ($postid)
 {
    return count(db->showpostshare($postid));
    
 }

public function showpostlikes ($postid)
{
	$likes=db->showpostlikes($postid);
	for ($i=0; $i <count($likes) ; $i++) { 
		$fnames=$likes['fname'];
		$lnames=$likes['lname'];
		$usernames=$likes['username'];
		$userimages=$likes['img'];
	}
	return $fnames,$lnames,$usernames,$userimages;
} //search about array marge in php

public function showpostcomments ($postid)
{
	$likes=db->showpostcooment($postid);
	for ($i=0; $i <count($comments) ; $i++) { 
		$fnames=$comments['fname'];
		$lnames=$comments['lname'];
		$usernames=$comments['username'];
		$userimages=$comments['img'];
	}
	return $fnames,$lnames,$usernames,$userimages; 
}

public function showpostshares ($postid)
{
	   $likes=db->showpostshare($postid);
	for ($i=0; $i <count($shares) ; $i++) { 
		$fnames=$shares['fname'];
		$lnames=$shares['lname'];
		$usernames=$shares['username'];
		$userimages=$shares['img'];
	}
	return $fnames,$lnames,$usernames,$userimages;
}
}