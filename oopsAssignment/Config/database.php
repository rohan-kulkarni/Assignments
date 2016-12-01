<?php  
	$host="localhost";
	$username="root";
	$password="root";
	$db="oops_assignment";
	$connection=mysql_connect($host,$username,$password);
	if(!$connection)
	{
		die("could not connect to Mysql ".mysql_error());
	}
	mysql_select_db($db,$connection) or die("Could not connect to Database ".mysql_error());
?>