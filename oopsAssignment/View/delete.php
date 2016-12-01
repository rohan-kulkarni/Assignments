<?php
	require_once("../Controller/UserController.php");
	session_start();
	$user_name=$_SESSION['username'];
	$userController=new UserController;
	$userController->delete($user_name);
	session_unset();
?>