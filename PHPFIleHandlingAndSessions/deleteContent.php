<!DOCTYPE html>
<html>
<head>
	<title>Edit Content</title>
</head>
<body>
	<form name="modify" method="post" action="delete.php">
		<?php
			session_start();
			if(!isset($_SESSION['username']))
			{
				@header("location:loginScreen.html");
			}
			$username=$_SESSION['username'];
			try
			{
				include("database.php");
				$res=$db->query("select * from books where username='".$username."'",PDO::FETCH_ASSOC);

				foreach ($res as $result) 
				{
					echo "<input type= 'submit' id='bookName' name='bookName' value='".$result['bookName']."'></br>";
				}

				echo "</br></br><a href='landingPage.php'>Home</a>"
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		?>
	</form>
</body>
</html>

