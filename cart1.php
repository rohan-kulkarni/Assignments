<?php
	$cart = array("Apple"=>70000,"Nexus"=>20000,"Microsoft"=>15000);
	$total=0;
	$json=json_encode($cart);
	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		var_dump($json);
		$total=array_sum($cart);
		echo $total;
	}
	else if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$json=json_encode($_POST);
		$merge = array_merge($cart, $_POST); 
		echo json_encode($merge);
		$total=array_sum($merge);
		echo $total;
	}
	else if($_SERVER['REQUEST_METHOD'] == 'PUT')
	{
		$arr=$_REQUEST;
		$newArray=array_replace_recursive($cart, $arr);
		echo json_encode($newArray);
		$total=array_sum($newArray);
		echo $total;
		
	}
	else if($_SERVER['REQUEST_METHOD'] == 'DELETE')
	{
		$delete_arr=$_REQUEST;
		unset($cart[$delete_arr['id']]);
		echo json_encode($cart);
		$total=array_sum($cart);
		echo $total;
	}
?>
