<?php
//function to encrypt the input message
	function encryptMessage($text,$k)
	{
		$key=$k;
		$characterArray=str_split($text);
		$i=0;
		foreach($characterArray as $character)
		{
			if(ord($character)<97)//check if letter is capital
			{
				$characterArray[$i]=$character;
			}
			else
			{
				if((ord($character)+$key)>122)//check if encryption exceeds 122 which is ascii for z
				{
					$ascii=(ord($character)+$key)-122;
					$ascii=$ascii+96;//reset from a
					$characterArray[$i]=chr($ascii);
				}
				else
				{
					$characterArray[$i]=chr(ord($character)+$key);//encrypt character
				}
			}
			$i++;
		}
		$encryptedText=implode('',$characterArray);
		return $encryptedText;
	}
	include("connection.php");

	//create a socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket");
	echo "Socket created";
	//bind socket name
	$result = socket_bind($socket, $host, $port) or die("Could not bind to socket");
	echo"<br/>binding Socket to host";
	//accept connection to socket
	echo"<br/>listening to host";
	$result = socket_listen($socket, 3) or die("Could not set up socket listener");
	echo"<br/>waiting to accept";
	//accept connection to socket
	$acceptSocket = socket_accept($socket) or die("Could not accept incoming connection");
	echo"<br/>Reading from client";
	//read Client input max upto 1024 bytes
	$input = socket_read($acceptSocket, 1024) or die("Could not read input");
	$key=end(explode(".",$input));
	$text=chop($input,".".$key);
	echo"<br/>Recieved";
	//encrypt message
	$encryptedText=encryptMessage($text,$key);
	echo "</br>Client Message : ".$input;
	socket_write($acceptSocket, $encryptedText, strlen ($encryptedText)) or die("Could not write output\n");
	echo"<br/>Sent to Client";
	socket_close($acceptSocket);
	socket_close($socket);
?>