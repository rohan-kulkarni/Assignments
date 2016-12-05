<?php
	require_once("DBConnection.php");
	class PostgreSQL implements DBConnection{
		function connectDB(){
			$db = new PDO("pgsql:dbname='BookDetails';host='localhost'", "postgres", "root"); 
	      	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      	return $db;
		}
	}

?>