<?php	
	$username=$_POST['username'];
	$password=$_POST['password'];
	try
	{
		$db=new PDO('mysql:host=localhost;port=3306;dbname=BooksDetails','root','root');
		$sql="insert into users(username,password) values(:username,:password)";
		$query=$db->prepare($sql);
		$query->execute(array(':username'=>$username,':password'=>$password));
			@header("location:LoginScreen.html");
	}
	
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
?>