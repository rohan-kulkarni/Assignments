<?php
	session_start();
	$username=$_SESSION['username'];
	if(!isset($_SESSION['username']))
	{
		@header("location:loginScreen.html");
	}
	else
	{
		$content=$_POST['content'];
		$bookName=$_POST['bookName'];
		$price=$_POST['price'];
		try
		{
			include("PostgreSQL.php");
			$databaseConn=new PostgreSQL;
			$db=$databaseConn->connectDB();
			$sql="insert into books values(:bookName,:username,:price)";
			$query=$db->prepare($sql);
			$query->execute(array(':bookName'=>$bookName,':username'=>$username,':price'=>$price));
			$file=fopen("books/".$bookName.".txt", "w");

			fwrite($file, $content);

			fclose($file);
			echo "Book created";
			echo "<br><a href='landingPage.php' >Home</a>";
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		
	}
?>