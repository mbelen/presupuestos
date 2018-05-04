<?php
	require_once('../models/db.php');
	require_once('../models/order.php');


	$order = new Order();
	$datos = array();

	//print_r($_POST);

	

	foreach ($_POST as $key => $value) {
		
		if($key != "cliente-val" && $key != "workType" && $key != "total_price" && $key != "change" && $key != "bill_number" && $key != "change" && $key != "issuers_id" && $key != "type" && $key != "cantidad" && $key != "new")
		{
			$datos[$key] = $value; 
		}

	}

	$data = serialize($datos);

	$response = $order->addOrder($_POST['cliente-val'],$_POST['workType']," ",$_POST['type'],$_POST['cantidad'],
				$_POST['new'],$_POST['change'],$_POST['bill_number'],$_POST['total_price'],$data);
	
	echo($response);

	