<?php

 public class Admin  extends user
{
include_once('dataBase.php');
include_once('report.php');
include_once('member.php');


public  function Removeuser($userid){
	database->removeuser($userid);

}
public function viewreport($object_report)
{
	report->generatereportlikes();
	report->generatereportcomments();
	report->generatereportusers();
	report->generatereportposts();

}

}
?>