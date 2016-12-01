<?php
	$user_name=$_POST['username'];
	$password=$_POST['password'];
	include("../Config/database.php");
		$result=mysql_query("SELECT * FROM users WHERE username='".$user_name."' and password='".md5($password)."'");
		$userArray=mysql_fetch_assoc($result);
		
		if(!empty($userArray))
		{
			session_start();
			$_SESSION['username']=$userArray['username'];
			@header("location:dashboard.php");
		}
		else
		{
			@header("location:Login.html");
		}
	
?>