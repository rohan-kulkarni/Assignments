<?php 
	require_once("Currency.php");
	class USDollar implements Currency {
		const RATE_OF_CONVERSION = 60; 
	    private $price; 

	    public function __construct($price) {
	        $this->price = $price;
	    }     

	    public function getPrice() {
	        echo "</br><b>Price (USD):- </b>". round($this->price/self::RATE_OF_CONVERSION,2). " $";
	    }     
	}
?>