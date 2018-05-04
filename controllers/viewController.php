<?php 
	
	class viewController{

		function viewController(){
			
		spl_autoload_register(function ($nombre_clase) {
			    include './models/'.strtolower($nombre_clase). '.php';
			});

		}

	
		function loadPairValues($datos,$grupo){

			$pairs = array();

			$view = new View();

			$labels = $view->getLabelsByGroup($grupo);

			if($labels){
		
				foreach ($labels as $key => $value) {
					
					if(!empty($datos[$value['dataKey']])){

						if(!empty($value['extra'])) {

							$pairs[$value['label']] = $datos[$value['dataKey']]." ".$value['unit']." ".$datos[$value['extra']];

						}else{

							$pairs[$value['label']] = $datos[$value['dataKey']]." ".$value['unit'];

						}
					} 
				}
			}	

			return $pairs;
		}


		function loadView($type,$order){

			$html= '<table><tr>
					<td>
						<b>Tipo de Toldo:</b>'.$order['type'].'
					</td>
					<td>
						<b>Cantidad:</b>'.$order['qty'].'
					</td>
					</tr></table>		
					<hr/>';
				

						
			$datos = unserialize($order['data']);

			for($i=1;$i<=12;$i++) {

				$labels = $this->loadPairValues($datos,$i);

				//print_r($labels);

				if(count($labels) > 0){

					switch ($i) {
						case 1:
							$html.= '<p>Tela:</p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;
						
						case 2:
							$html.= '<p>Unión de paños:</p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;

						case 3:
							$html.= '<p>Guarda:</p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;

						case 4:
							$html.= '<p>Cubretoldos:</p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;

						case 5:
							$html.= '<p>Contrapeso:</p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;

						case 6:
							$html.= '<p><b>Máquina:</b></p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;
							
						case 7:
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;
						
						case 8:
							$html.= '<p><b>Rollo:</b></p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;
						
						case 9:
							$html.= '<p><b>Ganchos:</b></p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;
						
						case 10:
							$html.= '<p><b>Frente Al:</b></p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;

						case 10:
							$html.= '<p><b>Frente Al:</b></p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;

						case 12:
							$html.= '<p><b>Faja con toldo:</b></p>';
							$html.= $this->buildTable($labels);
							$html.= '<hr/>';
						break;
					
						default:
							# code...
							break;
					}

				}		
			
					
			}		
		
			if(!empty($datos['comment'])) {

				$html .= '<p>Observaciones:'.$datos['comment'].'</p>';
			}
				
			return $html;
		}

		function buildTable($labels){

			$cont = 1;

			$html = '';


			if(count($labels) == 1) { 

				foreach ($labels as $key => $value) {

					$html.= '<table><tr><td>'.utf8_encode($key).' '.$value.'</td></tr></table>';

				}

			}else{
					
					$html.= '<table>';	

					foreach ($labels as $key => $value) {

							if($key != "" && $key != "x") {

								if($cont == 1) { $html.= '<tr>'; }

								$html .= '<td>'.utf8_encode($key).' '.$value.'</td>';

								$cont++;

								if($cont == 3) { $html.='</tr>'; $cont = 1; }
							}	
									
					}

					if($cont == 2) { $html.='</tr>'; }

				$html .= '</table>';

			}	
			
			return $html;		

		}

	}