<?php
	include("connection.php");
	if(isset($_POST['text']) and isset($_POST['key']))
	{
		$key=$_POST['key'];
			if(is_numeric($key) and $key>0 and $key<10)
			{
				$message = $_POST['text'].".".$_POST['key'];
				$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket");
				$result = socket_connect($socket, $host, $port) or die("Could not connect to server");  
				socket_write($socket, $message, strlen($message)) or die("Could not send data to server");
				$result = socket_read ($socket, 1024) or die("Could not read server response");
				echo "</br>Encrypted From Server  :<b>".$result."</b>";
				socket_close($socket);
			}
			else
			{
				echo "Key should be a number and should be between 1-10 the input";
			}
		
	}
	else
	{
		echo "Text or key cannot be empty";
	}
	//$message = $_POST['text'].".".$_POST['key'];
	
?>