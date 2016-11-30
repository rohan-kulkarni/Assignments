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
			$db=new PDO('mysql:host=localhost;port=3306;dbname=BooksDetails','root','root');
			$sql="insert into books(bookName,username) values(:bookName,:username)";
			$query=$db->prepare($sql);
			$query->execute(array(':bookName'=>$bookName,':username'=>$username));
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