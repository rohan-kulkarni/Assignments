<?php
	function checkSession(){
		session_start();
		if(!isset($_SESSION['username']) or !isset($_COOKIE['username'])){
			return false;
		}
		return true;
	}
	function createBook(){
		if(!checkSession()){
			@header("location:loginScreen.html");
		}
		@header("location:createBookData.html");
	}
	function append(){
		if(!checkSession()){
			@header("location:loginScreen.html");
		}
		@header("location:modifyContent.php");
	}
	function delete(){
		if(!checkSession()){
			@header("location:loginScreen.html");
		}
		@header("location:deleteContent.php");
	}
	function view(){
		if(!checkSession()){
			@header("location:loginScreen.html");
		}
		@header("location:viewBooks.php");
	}
	if(isset($_POST['create'])){
		createBook();
	}elseif(isset($_POST['append'])){
		append();	
	}elseif(isset($_POST['delete'])){
		delete();	
	}elseif(isset($_POST['logout'])){
		session_start();
		unset($_SESSION['username']);
		session_destroy($_SESSION['username']);
		@header("location:LoginScreen.html");
	}else{
		view();
	}
?>