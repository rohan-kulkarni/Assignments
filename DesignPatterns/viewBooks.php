<?php		
	function convertedCurrency($price)
	{
		require_once("Euro.php");
		require_once("USDollar.php");
		require_once("priceCalculator.php");
		$poundPrice=new Euro($price);
		$dollarPrice=new USDollar($price);
		$priceSim=new PriceCalculator;
		$priceSim->addCurrency($poundPrice);
		$priceSim->addCurrency($dollarPrice);
		$priceSim->getCurrency();
	}
	session_start();
	if(!isset($_SESSION['username'])){
		@header("location:LoginScreen.html");
	}
	$username=$_SESSION['username'];
	try{
		include("PostgreSQL.php");
		$databaseConn=new PostgreSQL;
		$db=$databaseConn->connectDB();
		$results=$db->query("select * from books where username='".$username."'",PDO::FETCH_ASSOC);
		echo "<b><h1 align ='center'>Your Books ".$username." Are :-</h1></b><br/>";
		foreach ($results as $result) {
			echo "<form method='GET' action='viewBooks.php'>";
			$file=fopen("books/".trim($result['bookName']).".txt", "r");
			echo "<br/><b>Name of the Book is :- </b>".trim($result['bookName']);
			echo "<br/><b>It contains:-</b>";
			if($file){
				while(!feof($file)){
					echo "<br/>".fgets($file);
				}
			}
			echo "<br/><b>Price (INR):- </b>".$result['price']." &#8377;";
				$price=$result['price'];
			convertedCurrency($price);
			echo "</br><input type='hidden' name='bookName' value='".trim($result['bookName'])."'>";
			echo "</br><input type='hidden' name='price' value='".$price."'>";
			echo "</br><input type='submit' value='Add'>";
			echo "</form>";	
		}
		echo "</br></br><a href='landingPage.php'>Home</a>";
	}
	catch(Exception $e){
		echo $e->getMessage();
	}
?>