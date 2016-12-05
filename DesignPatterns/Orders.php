<?php
	class Orders
	{
		private $cart=array();
		function __construct($shoppingCart){
			$cart = $shoppingCart;
		}
		function addTocart($bookName,$price){
			$book=array('bookName',$bookName,'price'=>$price);
			array_push($this->$cart,$book);
		}
		function checkout(){
			foreach ($this->$cart as $key => $value) {
				echo $key." - ".$value;
				$total=$total+$value;
			}
			echo "<b>Total is:-</b>".$total;
		}
	}
?>