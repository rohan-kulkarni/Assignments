<!DOCTYPE html>
<html>
<head>
	<title>Edit Content</title>
</head>
<body>
	<form name="modify" method="post" action="delete.php">
		<?php
			session_start();
			if(!isset($_SESSION['username'])){
				@header("location:loginScreen.html");
			}
			$username=$_SESSION['username'];
			try{
				include("PostgreSQL.php");
				$databaseConn=new PostgreSQL;
				$db=$databaseConn->connectDB();
				$results=$db->query("select * from books where username='".$username."'",PDO::FETCH_ASSOC);

				foreach ($results as $result) {
					echo "<input type= 'submit' id='bookName' name='bookName' value='".trim($result['bookName'])."'></br>";
				}

				echo "</br></br><a href='landingPage.php'>Home</a>";
			}
			catch(Exception $e){
				echo $e->getMessage();
			}
		?>
	</form>
</body>
</html>

