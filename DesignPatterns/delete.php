<?php
	session_start();
	if(!isset($_SESSION['username'])){
		@header("location:loginScreen.html");
	}
	$bookName=$_POST['bookName'];
	$username=$_SESSION['username'];
	try{
		include("PostgreSQL.php");
		$databaseConn=new PostgreSQL;
		$db=$databaseConn->connectDB();
		$sql=("DELETE from books WHERE \"bookName\"='".$bookName."'");
		$db->query($sql);
		unlink("books/".$bookName.".txt");
		echo "record deleted";
		@header("location:deleteContent.php");

	}
	catch(Exception $e){
		echo $e->getMessage();
	}
?>