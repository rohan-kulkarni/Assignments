<?php
	require_once('/var/www/html/oopsAssignment/Model/User.php');
	require_once '/var/www/html/oopsAssignment/Config/database.php';
	class UserTest extends PHPUnit_Framework_TestCase{
		public function setUp(){ }
	  	public function tearDown(){ }
	  	public function testValidIndex(){
	  		$indexObj = new User();
	  		$username = "Rohan";
	  		$this->assertNotTrue($indexObj->index($username) !== false);
	  		$this->assertFileExists('/var/www/html/oopsAssignment/Config/database.php');
	  		$this->assertGreaterThan(0,strlen($username));
	  	}
	  	public function testValidEdit(){
	  		$editObj = new User();
	  		$username = "saurav";
	  		$this->assertTrue($editObj->edit($username) !== false);
	  		$this->assertFileNotExists('/var/www/html/oopsAssignment/View/jsonarray.txt');
	  		$this->assertGreaterThan(0,strlen($username)); 
	  	}
	  	public function testValidSave(){
	  		$saveObj = new User();
	  		$username = "saurav";
	  		
	  		$userDetails=array("username" => "Sauravs","password" => "Sauravs","email" => "saurav@gmail.com","first_name" => "Saurav","last_name" => "Mazumder","gender" => "Male","date_of_birth"=>"1994-10-22","profile_id" => "1");
	 		$validDate="/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
	 		$this->assertRegExp($validDate, $userDetails['date_of_birth']);
	 		$validEmail="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	  		$this->assertNotTrue($saveObj->save($username,$userDetails) != false);
	  		$this->assertRegExp($validEmail, $userDetails['email']);
	  		$this->assertFileExists('/var/www/html/oopsAssignment/Config/database.php');
	  		$this->assertArrayHasKey("username",$userDetails);
	  		$this->assertArrayHasKey("profile_id",$userDetails);
	  		$this->assertNotNull($username);
	  	}
	  	public function testValidDelete(){
	  		$deleteObj = new User();
	  		$username = "Saurav";
	  		$this->assertFileExists('/var/www/html/oopsAssignment/Config/database.php');
	  		$this->assertTrue($deleteObj->delete($username) !== false);
	  		$this->assertNotEmpty($username);
	  	}
	}
?>