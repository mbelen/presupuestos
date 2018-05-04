<?php 

	require_once('../models/db.php');
	require_once('../models/customer.php');


	$customer = new Customer();

	if($_POST['id'] == 0){

		$response = $customer->addCustomer($_POST['nombre'],$_POST['direccion'],$_POST['ciudad'],$_POST['telefono'],
									   $_POST['tel_comercial'],$_POST['interno'],$_POST['email'],$_POST['mobile'],
									   $_POST['c1n'],$_POST['c1p'],$_POST['c1i'],$_POST['c1e'],
									   $_POST['c2n'],$_POST['c2p'],$_POST['c2i'],$_POST['c2e'],
									   $_POST['c3n'],$_POST['c3p'],$_POST['c3i'],$_POST['c3e']);
	
	}else{

		$response = $customer->updateCustomer($_POST['nombre'],$_POST['direccion'],$_POST['ciudad'],$_POST['telefono'],
									   $_POST['tel_comercial'],$_POST['interno'],$_POST['email'],$_POST['mobile'],
									   $_POST['c1n'],$_POST['c1p'],$_POST['c1i'],$_POST['c1e'],
									   $_POST['c2n'],$_POST['c2p'],$_POST['c2i'],$_POST['c2e'],
									   $_POST['c3n'],$_POST['c3p'],$_POST['c3i'],$_POST['c3e'],$_POST['id']);


	}
	
	echo($response);


//	print_r($_POST);

	