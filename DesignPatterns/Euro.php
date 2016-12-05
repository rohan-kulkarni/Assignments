<?php 
	require_once("Currency.php");

	class Euro implements Currency {
		const RATE_OF_CONVERSION = 70;
	    private $price;
	        
	    public function __construct($price) {
	        $this->price = $price;
	    }     
	    public function getPrice() {
	        echo "</br> <b>Price (Euro):- </b>". round($this->price/self::RATE_OF_CONVERSION,2) ." &euro; ";
	    }     
	}
?>