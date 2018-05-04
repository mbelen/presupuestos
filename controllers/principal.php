<?php 
	class Principal{

		function Principal(){
			
		spl_autoload_register(function ($nombre_clase) {
			    include './models/'.strtolower($nombre_clase). '.php';
			});

		}


		function Login($username,$pass){
			
			$user = new User();

			$loginData = $user->checkUser($username,$pass);

			if( $loginData == 0) { 

				return false; 

			}else{  return $loginData; }

			
		}

		function Logout(){
			
			session_destroy();

		}

		/**
		*	Returns latest orders
		*   @params 
		*   Return Orders array
		**/

		function LoadOrders($filters = null){
			
			$order = new Order();

			return $order->getOrders($filters);

		}

		function LoadLastOrders($limit){
			
			$order = new Order();

			return $order->getLastOrders($limit);

		}

	}

	
	
	