<?php
	require_once("../Controller/UserController.php");
	session_start();
	$editFields=array();
	$editFields=$_POST;
	$user_name=$_SESSION['username'];
	$userController=new UserController;
	$userController->save($user_name,$editFields);
?>