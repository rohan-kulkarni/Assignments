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
		try
		{
			include("database.php");
			$sql="insert into books(book_name,username) values(:book_name,:username)";
			$query=$db->prepare($sql);
			$query->execute(array(':book_name'=>$bookName,':username'=>$username));
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
