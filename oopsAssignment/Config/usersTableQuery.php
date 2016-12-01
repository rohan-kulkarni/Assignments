<?php
	$userTableQuery="CREATE TABLE IF NOT EXISTS users(id int PRIMARY KEY AUTO_INCREMENT,username varchar(20) PRIMARY KEY,password varchar(40),email varchar(20),first_name varchar(20),last_name varchar(20),gender varchar(6),date_of_birth date,profile_id int(20),CONSTRAINT fk_profile_id FOREIGN KEY(profile_id) REFERENCES profiles(id))";
	if(mysql_query($userTableQuery))
	{
		echo "<br/>users table Created sucessfully";
	}
	else
	{
		die("Could not Create table plese check error ".mysql_error());
	}
?>
