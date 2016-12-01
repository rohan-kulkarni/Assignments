<?php	
		include("database.php");	
		$insertValues="INSERT IGNORE INTO profiles VALUES(1,'BA')";
		mysql_query($insertValues) or die("Error ".mysql_error());

		$insertValues="INSERT IGNORE INTO profiles VALUES(2,'Intern')";
		mysql_query($insertValues) or die("Error ".mysql_error());

		$insertValues="INSERT IGNORE INTO profiles VALUES(3,'Junoir Developer')";
		mysql_query($insertValues) or die("Error ".mysql_error());

		$insertValues="INSERT IGNORE INTO profiles VALUES(4,'Senoir Developer')";
		mysql_query($insertValues) or die("Error ".mysql_error());

		echo "</br>value inserted sucessfully";
?>