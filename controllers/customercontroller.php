<?php 

	class CustomerController{

		function CustomerController(){
			
		spl_autoload_register(function ($nombre_clase) {
			    include './models/'.strtolower($nombre_clase). '.php';
			});

		}

	
		function loadCustomers(){
			
			$customer = new Customer();

			return $customer->getClients();

		}

	}	