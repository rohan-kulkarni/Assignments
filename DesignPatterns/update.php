<?php
	$bookName=$_POST['bookName'];
	$file=fopen($bookName.".txt","w");
	$content=$_POST['content'];
	fwrite($file, $content);
	fclose($file);
	@header("location:appendContent.php");
?>