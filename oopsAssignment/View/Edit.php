<?php
	require_once("../Controller/UserController.php");
	session_start();
	$user_name=$_SESSION['username'];
	$userController=new UserController;
	$userController->edit($user_name);
?>