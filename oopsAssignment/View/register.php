<?php
		$firstName=$_POST['first_name'];
		$lastName=$_POST['last_name'];
		$email=$_POST['email'];
		$user_name=$_POST['username'];
		$password=$_POST['password'];
		$gender=$_POST['gender'];
		$profile=$_POST['profile'];
		$dateOfBirth=$_POST['date_of_birth'];



		include("../Config/database.php");

		$query = mysql_query("SELECT username FROM users WHERE username='".$user_name."'") or die("Database error".mysql_error());

  		if (mysql_num_rows($query) != 0)
		{
		    echo "Username already exists";
		}
		else
		{
		   $insertValues="INSERT IGNORE INTO users VALUES('".$user_name."','".md5($password)."','".$email."','".$firstName."','".$lastName."','".$gender."','".$dateOfBirth."',".$profile.")";
			if(mysql_query($insertValues))
			{
				@header("location:Login.html");
			} 
			else
			{
				die("Error ".mysql_error());
			}
		}

		
?>