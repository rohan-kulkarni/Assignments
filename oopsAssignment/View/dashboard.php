<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="Style/dashBoardStyle.css">
</head>
<body>

	<form action="../Controller/UserController.php" method="POST">

		<?php 
		session_start();
		if(isset($_SESSION['username']))
		{
			echo "<h1>WELCOME ".$_SESSION['username']."</h1>";
		}
		else
		{
			@header("location:Login.html");
		}
		?>
		<ul>
			<li><a href="Edit.php">Edit</a></li>
			<li><a href="delete.php">Delete</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<table border="1" width=700px>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gender</th>
			<th>Date of Birth</th>
			<th>Position</th>
		</tr>
		<tr>
		<?php
			require_once("../Controller/UserController.php");
			$userController=new UserController;
			//echo $_SESSION['username'];
			$fields=$userController->index($_SESSION['username']);
			foreach($fields as $key=>$field) 
			{
				echo "<td>".$field."</td>";
			}
		?>
		</tr>


		</table>

	</form>
</body>
</html>