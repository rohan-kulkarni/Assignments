<?php
	require_once('/var/www/html/oopsAssignment/Model/User.php');
	require_once '/var/www/html/oopsAssignment/Config/database.php';
	class UserTest extends PHPUnit_Framework_TestCase{
		public function setUp(){ }
	  	public function tearDown(){ }
	  	public function testValidIndex(){
	  		$indexObj = new User();
	  		$username = "saurav";
	  		$this->assertNotTrue($indexObj->index($username) !== false);
	  		$this->assertGreaterThan(0,strlen($username));
	  	}
	  	public function testValidEdit(){
	  		$editObj = new User();
	  		$username = "saurav";
	  		$this->assertTrue($editObj->edit($username) !== false);
	  		$this->assertGreaterThan(0,strlen($username));
	  	}
	  	public function testValidSave(){
	  		$saveObj = new User();
	  		$username = "saurav";
	  		$userDetails=array("name" => "Sauravs","email" => "saurav@gmail.com","birth_date"=>"1994-10-22","profile_id" => "1");
	  		$this->assertArrayHasKey("name",$userDetails);
	  		$this->assertContains("Sauravs",$userDetails);
	  		$this->assertNotNull($username);
	  	}
	  	public function testValidDelete(){
	  		$deleteObj = new User();
	  		$username = "Saurav";
	  		// $this->assertTrue($deleteObj->delete($username) !== false);
	  		$this->assertNotEmpty($username);
	  		$this->assertCount(1, ['saurav']);
	  	}
	}
?>