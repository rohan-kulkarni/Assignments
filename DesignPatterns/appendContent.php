<!DOCTYPE html>
<html>
<head>
	<title>Edit Content</title>
</head>
<body>
	<form method="post" action="appendContent.php">
		<?php
			if(isset($_POST['update']))
			{
				$bookName=$_POST['bookName'];
				if(file_exists("books/".trim($bookName).".txt"))
				{
					$file=fopen("books/".$bookName.".txt","w");
					$content=$_POST['content'];
					fwrite($file, $content);
					fclose($file);
					echo "<input type='hidden' name='bookName' value='".$bookName."'>";
					echo "</br>Data updated";
				}
				else
				{
					echo"File Not Found";
				}
			}
			session_start();
			if(!isset($_SESSION['username']))
			{
				@header("location:loginScreen.html");
			}
			$bookName = $_POST['bookName'];
			if(file_exists("books/".$bookName.".txt"))
			{
				$file=fopen("books/".$bookName.".txt","r");

				$content="";
				echo "<input type='hidden' name='bookName' value='".$bookName."'>";
				while(!feof($file))
					{
						$content=$content.fgets($file);
					}
				echo "<textarea name='content' rows='50' cols='50'>".$content."</textarea>";
				fclose($file);
			}
			else
			{
				echo "File Not Found";
			}
			echo "</br></br><a href='landingPage.php'>Home</a>";
		?>
		</br>
		<input type="submit" name="update" value="update">
	</form>
</body>
</html>



