<?php
    require_once("Currency.php");
    interface Observer {
        public function addCurrency(Currency $currency);
    } 
    class priceCalculator implements Observer {
        private $currencies;     
        public function __construct() {
            $this->currencies = array();
        }     
        public function addCurrency(Currency $currency) {
          array_push($this->currencies, $currency);
        }     
        public function getCurrency(){
            foreach ($this->currencies as $currency) {
            $currency->getPrice();
            }
        }
    }

?>