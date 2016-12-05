<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		echo "not poss";
		@header("location:LoginScreen.html");
	}

	echo "Welcome ".$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<form method="post" action="homePageActions.php">

		<input type="submit" name="create" value="create">
		<input type="submit" name="view" value="view">
		<input type="submit" name="append" value="append">
		<input type="submit" name="delete" value="delete">
		</br>
		</br>
		</br>
		</br>

		<input type="submit" name="logout" value="logout">
	</form>
</body>
</html>