<?php
include("PostgreSQL.php");
$databaseConn=new PostgreSQL;
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	

	try
	{
		$db=$databaseConn->connectDB();
		$res=$db->query("select * from users where username='".$username."' and password='".$password."'",PDO::FETCH_ASSOC);
		$count=0;
		foreach ($res as $res) 
		{
			$count++;
		}
		if($count==1)
		{
			if(!isset($_SESSION['username']))
			{
				session_start();
				$_SESSION['username']=$username;
				setcookie('db',$databaseConn);
			}
			
			@header("location:landingPage.php");
		}
		else
		{
			echo "Enter Correct Username and password";
		}

	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
}
else
{
	@header("location:registerDetails.html");
}
?>