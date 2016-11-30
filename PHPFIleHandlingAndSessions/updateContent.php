<?php
			session_start();
			if(!isset($_SESSION['username']))
			{
				@header("location:loginScreen.html");
			}
			$bookname=$_POST['bookname'];
			$file=fopen("books/".$bookName.".txt","w");
			$content=$_POST['content'];
			fwrite($file, $content);
			fclose($file);
			@header("location:appendContent.php");
?>