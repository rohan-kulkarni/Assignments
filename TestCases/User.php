<?php
	require_once("AppModel.php");
	// include("../Config/database.php");
	class User extends AppModel
	{
		function edit($user_name)
		{
			// require_once("../Controller/AppController.php");
			$result=$this->index($user_name);

			$jsonEncoded=json_encode($result);
			$file=fopen("jsonarray.txt","w") or die("file not created");
			fwrite($file, $jsonEncoded) or die("contents not written");
			fclose($file);
			@header("location:EditDetails.php");
		}
		
		function save($user_name,$editFields)
		{
			include("../Config/database.php");
			if(mysql_query("UPDATE users set email='".$editFields['email']."',first_name='".$editFields['first_name']."',last_name='".$editFields['last_name']."',gender='".$editFields['gender']."',date_of_birth='".$editFields['date_of_birth']."',profile_id=".$editFields['profile']." where username='".$user_name."'"))
			{
				@header("location:dashboard.php");
			}
			else
			{
				die("Database error".mysql_error());
			}
		}

		function delete($user_name)
		{
	
			if($result = mysql_query("DELETE from users WHERE username='".$user_name."'"))
			{
				echo "deleted";
				@header("location:../View/SignUp.php");
			}
			else
			{
				die("Database error".mysql_error());
			}
		}
		
		function index($user_name)
		{
			include('/var/www/html/oopsAssignment/Config/database.php');
			$userArray=array();
			if($result = mysql_query("SELECT u.username,u.email,u.first_name,u.last_name,u.gender,u.date_of_birth,p.name FROM users u,profiles p WHERE u.profile_id = p.id and username='".$user_name."'"))
			{
				$userArray=mysql_fetch_assoc($result);
				return $userArray;
			}
			else
			{
				die("Database error".mysql_error());
			}
		}
	}
?>