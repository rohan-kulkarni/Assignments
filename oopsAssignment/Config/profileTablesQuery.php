<?php	
	include("database.php");
	$profileTableQuery="CREATE TABLE IF NOT EXISTS profiles(id int(20) PRIMARY KEY,name varchar(30))";
	if(mysql_query($profileTableQuery))
	{
		echo "Profiles table Created sucessfully";
	}
	else
	{
		die("Could not Create table plese check error ".mysql_error());
	}
?>
