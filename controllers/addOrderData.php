<?php
	require_once('../models/db.php');
	require_once('../models/order.php');

	print_r($_POST);

	$order = new Order();

	$response = $order->addOrderData($_POST);

	echo($response);