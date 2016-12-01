<?php
require_once("AppController.php");
require_once("../Model/User.php");
class UserController extends AppController
{ 
		function edit($user_name)
		{
			$user=new User;
			$user->edit($user_name);
		}
		function save($user_name,$editFields)
		{
			$user=new User;
			$result=$user->save($user_name,$editFields);
		}
		function delete($user_name)
		{
			$user=new User;
			$user->delete($user_name);
		}
		function index($user_name)
		{
			$user=new User;
			$result=$user->index($user_name);
			return $result;
		}
}
	
?>