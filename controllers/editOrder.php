<?php
	require_once('../models/db.php');
	require_once('../models/order.php');


	$order = new Order();
	$datos = array();

	//print_r($_POST);

	$datos = array();

	//print_r($_POST);

	

	foreach ($_POST as $key => $value) {
		
		if($key != "order-id"){

			$datos[$key] = $value; 
		}

	}

	$data = serialize($datos);

	$response = $order->updateOrder($_POST['order-id'],$data);
	
	echo($response);

