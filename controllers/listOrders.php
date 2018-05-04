<?php 

	require_once('../models/db.php');
	require_once('../models/order.php');

	$order = new Order();

	//print_r($_POST);
	if(isset($_POST['search'])) {

		$list = $order->getOrders($_POST['search'],$_POST['page']);

	}else{

		$list = $customer->getOrders("",$_POST['page']);
	}	


	for($i=0;$i<count($list);$i++){

		$list[$i]['description'] = utf8_encode($list[$i]['description']);
	}
	
	print(json_encode($list));


	