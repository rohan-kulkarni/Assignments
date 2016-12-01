<?php
abstract class AppModel
{
	public abstract function save($user_name,$editFields);
	public abstract function edit($user_name);
	public abstract function delete($user_name);
	public abstract function index($user_name);
}
?>