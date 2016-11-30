<?php
	function createBook()
	{
		session_start();
		if(!isset($_SESSION['username']) or !isset($_COOKIE['username']))
		{
			@header("location:loginScreen.html");
		}
		@header("location:createBookData.html");
	}

	function append()
	{
		session_start();
		if(!isset($_SESSION['username']))
		{
			@header("location:loginScreen.html");
		}
		@header("location:modifyContent.php");
	}

	function delete()
	{
		session_start();
		if(!isset($_SESSION['username']))
		{
			@header("location:loginScreen.html");
		}
		@header("location:deleteContent.php");
	}

	function view()
	{
		session_start();
		if(!isset($_SESSION['username']))
		{
			@header("location:LoginScreen.html");
		}
		$username=$_SESSION['username'];
		try
		{
			$db=new PDO('mysql:host=localhost;port=3306;dbname=BooksDetails','root','root');
			$res=$db->query("select * from books where username='".$username."'",PDO::FETCH_ASSOC);

			echo "<b><h1 align ='center'>Your Books ".$username." Are :-</h1></b><br/>";
			
			foreach ($res as $result) 
			{
				$file=fopen("books/".$result['bookName'].".txt", "r");
				echo "<br/><b>Name of the Book is :- </b>".$result['bookName'];
				echo "<br/><b>It contains:-</b>";
				while(!feof($file))
				{
					echo "<br/>".fgets($file);
				}
			}

			echo "</br></br><a href='landingPage.php'>Home</a>";
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}


	if(isset($_POST['create']))
	{
		createBook();
	}
	elseif(isset($_POST['append']))
	{
		append();	
	}
	elseif(isset($_POST['delete']))
	{
		delete();	
	}
	elseif(isset($_POST['logout']))
	{
		session_start();
		unset($_SESSION['username']);
		session_destroy($_SESSION['username']);
		@header("location:LoginScreen.html");
	}
	else
	{
		view();
	}
?>