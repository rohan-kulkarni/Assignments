<?php
	function fileExtension($inputFile)
	{
		$ext = pathinfo($inputFile, PATHINFO_EXTENSION);
		return $ext;
	}
	function dateTimeUS($inputDateTime)
	{
		$usTime = date('Y-m-d H:i', strtotime('-10 hours -30 minutes',strtotime($inputDateTime)));
		echo "<br/>US time is :- ".$usTime;
	}
	function dateTimeUK($inputDateTime)
	{
		$ukTime = date('Y-m-d H:i', strtotime('-5 hours -30 minutes',strtotime($inputDateTime)));
		echo "<br/>UK time is :- ".$ukTime;
	}
	function dateDifference($firstDate,$secondDate)
	{
		$firstDateToTime=strtotime($firstDate);
		$secondDateToTime=strtotime($secondDate);
		$dateDifference = $firstDateToTime - $secondDateToTime;
		echo "<br/>Date Difference : ".floor($dateDifference / (60 * 60 * 24));	
	}
	function stringUniqueAndReverse($inputString)
	{
		$arrayString=str_split($inputString);
		$uniqueArray=array_unique($arrayString);
		$uniqueString=implode('', $uniqueArray);
		$reverseString=strrev($uniqueString);
		echo "<br/>Unique And Reversed String : ".$reverseString;
	}
	$firstDate = "12-5-2011";
	$secondDate = "12-4-2010";
	echo "First Date : ".$firstDate;
	echo "<br/>Second Date : ".$secondDate;	
	dateDifference($firstDate,$secondDate);
	dateTimeUS("2000-4-1 1:30");
	dateTimeUK("2000-4-1 1:30");
	stringUniqueAndReverse("aabdceaaabbbcd");
?>