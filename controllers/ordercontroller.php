<?php 

	class OrderController{
		
		private $order;

		function OrderController(){
			
		spl_autoload_register(function ($nombre_clase) {
			    include './models/'.strtolower($nombre_clase). '.php';
			});

			$this->order = new Order();
			
		}

		function LoadOrders($page){
			
			return $this->order->getOrders("",$page);
		}
	
		function getOrderById($id){
	
			return $this->order->getOrderById($id);

		}

		function getDataOrder($id){

			return $this->order->getDataOrder($id);
		}
		
		function getImagesById($id){

			return $this->order->getImagesById($id);
		}

		function getOrderCenefa($id){
			
			return $this->order->getOrderCenefaDetails($id);
			
		}

		function getOrderCortina($id){

			return $this->order->getOrderCurtainsDetails($id);
		}

	}	