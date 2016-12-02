<?php 
require_once("Currency.php");
class USDollar implements Currency {
    private $price;     
    public function __construct($price) {
        $this->price = $price;
    }     

    public function getPrice() {
        echo "</br><b>Price (USD):- </b>". round($this->price/60,2). " $";
    }     
}
?>