<?php 
	require_once("Currency.php");
	class Euro implements Currency {
	    private $price;     
	    public function __construct($price) {
	        $this->price = $price;
	    }     
	    public function getPrice() {
	        echo "</br> <b>Price (Euro):- </b>". round($this->price/70,2) ." &euro; ";
	    }     
	}
?>