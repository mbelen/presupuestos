<?php 

	require_once('../models/db.php');
	require_once('../models/customer.php');

	$customer = new Customer();

	//print_r($_POST);
	if(isset($_POST['search'])) {

		$list = $customer->getClients($_POST['search']);

	}else{

		if(!isset($_POST['customer'])){

			$list = $customer->getClients(" ");
		}else{

			$list = $customer->getClientById($_POST['customer']);
		}
	}	
	

	$listArray = array();


	foreach ($list as $key => $value) {
		
		$listArray[$key] = $value;
	}

	print(json_encode($list));

	