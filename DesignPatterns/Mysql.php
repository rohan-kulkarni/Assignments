<?php
public class MySql implements DBConnection
{
	function connectDB()
	{
		$db=new PDO('mysql:host=localhost;port=3306;dbname=BooksDetails','root','root');
		return $db;
	}
}

?>