<?php
	$inventory = array("mobile"=>70,"laptop"=>50,"PC"=>15);
	$total=0;
	$json=json_encode($inventory);
	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		echo($json);
		//$total=array_sum($cart);
		//echo $total;
	}
	else if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$json=json_encode($_POST);
		$merge = array_merge($inventory, $_POST); 
		echo json_encode($merge);
		//$total=array_sum($merge);
		//echo $total;
	}
	else if($_SERVER['REQUEST_METHOD'] == 'PUT')
	{
		$arr=$_REQUEST;
		foreach($inventory as $key=>$value)
		{
			if($arr['id']==$key)
			{
				$newValue=$arr['q'];
				$rep = array(''.$key => $newValue );
				$inventory=array_replace_recursive($inventory, $rep);
			}
		}
		echo json_encode($inventory);
	}
	else if($_SERVER['REQUEST_METHOD'] == 'DELETE')
	{
		$delete_arr=$_REQUEST;
		foreach($inventory as $key=>$value)
		{
			if($delete_arr['id']==$key)
			{
				$newValue=$value-1;
				$rep = array(''.$key => $newValue );
				$inventory=array_replace_recursive($inventory, $rep);
			}
		}
		echo json_encode($inventory);
	}
?>
