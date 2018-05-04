<?php 

	function loadView($type,$oe,$datos){

		//print_r($datos); 

		$html = '<table><tr><td><b>Tipo de Toldo: </b>'.$oe['type'].'</td><td><b>Cantidad: </b>'.$oe['qty'].'</td></tr></table>';
		$html .= '<p><b>Tela:</b></p>';
		$html .= '<table><tr>';
		//if(!empty($datos['tela-tipo'])) : 
			$html .= '<td><b>Tipo :</b>'.$datos['tela-tipo'].'</td>';
		//else: $html .= '<td></td>';
		//endif; 
		$html .= '</tr></table>';
		$html .= '<table><tr>';
		if(!empty($datos['tela-ancho-T'])) : 
			$html .= '<td><b>Ancho T :</b>'.$datos['tela-ancho-T'].' m</td>';
		else : $html .= '<td></td>';
		endif;	
		if(!empty($datos['tela-ancho-panio'])) : 
			$html .= '<td><b>Ancho Paño :</b>'.$datos['tela-ancho-panio'].' m</td>';
		else : $html .= '<td></td>';
		endif;	
		if(!empty($datos['tela-dobl'])) : 
			$html .= '<td><b>Dobladillos :</b>'.$datos['tela-dobl'].' cm</td>';
		else : $html .= '<td></td>';
		endif;	
		if(isset($datos['tela-tipo-dobl']) && !empty($datos['tela-tipo-dobl'])) : 
			switch ($datos['tela-tipo-dobl']) {
				case '1':
					$tipo = "Cosido";
					break;
				case '2':
					$tipo = "Soldado";
					break;
				case '3':
					$tipo = "Postizo";
					break;	
				default:
					# code...
					break;
			}
			$html .= '<td><b>Tipo de dobladillos :</b>'.$tipo.'</td>';
		else : $html .= '<td></td>'; 
		endif;	
		$html .= '</tr></table>';
		$html .= '<p><b>Guarda:</b></p>';
		$html .= '<table><tr>';
		$html .= '<td><b>Tipo de guarda:</b></td>';
		$html .= '</tr></table>';
			


		switch ($type) {
				
				case 1:
					$html = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';
					//require('../views/verticalPrint.php');
					
				break;

				case 2:

					$html = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';
					require('../views/deslizantePrint.php');

				break;

				case 3:

					$html = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';
					$html .= '<table><tr>';
					$html .= '<td><b>Tipo de brazo</b>';
					if(isset($datos['unBrazo-arm-type'])) :
						switch($datos['unBrazo-arm-type']) {
				 		case '1': $br = "Rectos"; break;
				 		case '2': $br = "Curvados"; break;
				 		case '3': $br = "Con tensión"; break;
				 		case '4': $br = "Sacar y poner"; break;
				 		default: break;
				 	}
					endif;
					if(isset($br)){ 
						$html .= $br.'</td>';
					}else{
						$html .= ' -- </td>';
					}
					$html .='<td><b>Cantidad de brazos:</b>'.$datos['unBrazo-qty'].'</td>';
					$html .='<td><b>Fijación:</b></td>';
					if(isset($datos['unBrazo-arm-type'])) { 
				 		switch($datos['unBrazo-arm-type']) {
						 	case '1': $html.= "Frente - Roseta y pata de aluminio.</td>"; break;
						 	case '2': $html.= "Frente - Pata de aluminio.</td>"; break;
						 	case '3': $html.= "Entre muchetas - con campanita.</td>"; break;
						 	case '4': $html.= "Entre muchetas</b> con campanita.</td>"; break;
						 	case '5': $html.= "Otro."; break;
						 	default: break;
				 		}
					}else {
						$html .= ' -- </td>';
					}	
					$html .= '</tr></table>';
					$html .= '<p><b>Color:</b>'.$datos['unBrazo-color'].'</p>';
					$html .='<p><b>Observaciones:</b>'.$datos['comment'].'</p>';
					$html .='<hr style="border-top: 1px solid;">';
				break;

				case 4:

					$html = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';
					$html.='<table><tr>';

					if(isset($datos['coliza-arm-type'])) : $unidad = ($datos['coliza-arm-type']) ? "Rectos" : "Curvados"; endif;

					$html.='<td><b>Tipo de Brazo: </b>'.$unidad.'</td>';	
					$html.='<td><b>Largo: </b>'.$datos['coliza-largo'].' m</td><td><b>Color: </b>'.$datos['coliza-color'].'</td></tr>';
					$html.='</table>';
					$html.='<table><tr>';
					$html.='<td><b>Distancia Eje máquina al brazo:</b>'.$datos['coliza-dEM'].' m </td><td><b>Al piso:</b>'.$datos['coliza-alpiso'].' m</td></tr></table>';
					$html.='<table><tr><td><b>Saliente Brazos desde pared al extremo de punteras:</b>'.$datos['coliza-saliente'].' m</td></tr>';
					$html.='<tr><td><b>Diámetro de la coliza:</b>'.$datos['coliza-diam'].' m</td></tr></table>';
					$html.='<table><tr><td><b>Tipo de máquina:</b>'.$datos['coliza-maquina-tipo'].'</td><td><b>Color de máquina:</b>'.$datos['coliza-maquina-color'].'</td></tr></table>';
					
					$html.='<p><b>Observaciones:</b>'.$datos['comment'].'</p>';
					$html.='<hr style="border-top: 1px solid;">';

				break;

				case 5:

					$html = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';

				break;

				case 6:

					$html = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';
					$html .= '<table><tr><td><p><b>Ganchos:</b>'.$datos['patio-ganchos'].'</p></td>
						<td><p><b>Tensores:</b>'.$datos['patio-tensores-mm'].' mm</p></td>
						<td><p><b>Tensores Nº:</b>'.$datos['patio-tensores-num'].'</p></td>
						<td><b>Pasantes:</b>'.$datos['patio-pasantes-1'].' x '.$datos['patio-pasantes-2'].' con tuerca</td></tr></table>';

					$html .= '<p><b>Tipo de alambre:</b></p>';

					$html.= '<table><tr><td><b>Galvanizado nº:</b>'.$datos['patio-tipoalam-galv-num'].'</td><td><b>Acerado:</b>'.$datos['patio-tipoalam-acerado'].' mm</td><td width="240px"><b>Corneta para soga:</b>'.$datos['patio-corneta'].
							'</td></tr></table>';	

					$html.= '<p><b>Travesaños:</b></p>';		
					$html.= '<table><tr><td><b>Diametro:</b>'.$datos['patio-trave-diam'].' m</td><td><b>Sección:</b>'.$datos['patio-trave-seccion1'].' mm x '.$datos['patio-trave-seccion2'].' mm</td></tr></table>';

					$html.='<p><b>Columnas:</b></p>';
					$html.='<table><tr><td><b>Altura T:</b>'.$datos['patio-column-alt-t'].' m</td><td><b>Color:</b>'.$datos['patio-column-color'].'</td>
							<td><b>Fijación:</b>';
					if(isset($datos['patio-colum-fijacion'])) : $html.= $datos['patio-colum-fijacion']; endif;

					$html.= '</td></tr></table>';
					$html.='<p><b>Riendas:</b></p>';

					$html.= '<table><tr><td><b>Largo T:</b>'.$datos['patio-riendas-largoT'].' m</td>';

					if(isset($datos['patio-riendas-fijacion'])) { $html.='<td><b>Fijación:</b>'.$datos['patio-riendas-fijacion'].'</td>'; } else { $html.='<td><b>Fijación:</b> --</td>'; }

					$html.= '<td><b>Diámetro:</b>'.$datos['patio-riendas-diam'].' mm</td><td><b>Sección:</b>'.$datos['patio-riendas-seccion1'].' x '.$datos['patio-riendas-seccion2'].'  mm</td></tr>';
					$html.= '<tr><td><b>Color:</b>'.$datos['patio-riendas-color'].'</td>';
					if(isset($datos['patio-riendas-frente'])) { $html.= '<td><b>Frente:</b>'.$datos['patio-riendas-frente'].'</td></tr></table>'; } else { $html.='<td><b>Frente:</b> --</td></tr></table>'; } 

					$html.= '<table><tr><td><b>Medida:</b>'.$datos['patio-medida-seccion-1'].' mm x '.$datos['patio-medida-seccion-2'].' mm</td><td><b>Diámetro:</b>'.$datos['patio-medida-diam'].' pulgadas</td></tr>';
					$html.= '<tr><td><b>Ancho total:</b>'.$datos['patio-aT'].' m</td><td><b>Desarrollo total:</b>'.$datos['patio-des-total'].' m</td></tr></table>';
					$html.='<table><tr><td><b>Espacio inicial:</b>'.$datos['patio-esp-inicial'].' m</td><td><b>Espacio:</b>'.$datos['patio-esp'].' m </td><td><b>Espacio final:</b>'.$datos['patio-esp-final'].' m</td></tr>';
					$html.= '</table><table><tr><td><b>Ojales para desagote cada aprox.:</b>'.$datos['patio-oj-des-cm'].' cm en la mitad con guías</td></tr></table>';
					$html.='<table><tr><td><b>Ojales para desagote a:</b>'.$datos['patio-ojal-ad-vaina'].' cm adentro de la vaina frente</td></tr></table>';
					$html.='<table><tr>';
					if(isset($datos['patio-der-tela']))  $html.= '<td><b>Derecho de la tela:</b>'.$datos['patio-der-tela'].'</td>'; else $html.= '<td><b>Derecho de la tela:</b> -- </td>';
					$html.='<td><b>Argolla número:</b>'.$datos['patio-arg-num'].'</td><td><b>argolla cada:</b>'.$datos['patio-arg-cada'].' cm</td></tr>';
					$html.= '<tr><td><b>Dobladillo trasero:</b>'.$datos['patio-dobla-tra'].' cm </td>';
					if(isset($datos['patio-dobla-tipo'])) $html.='<td><b>Tipo de dobladillo:</b>'.$datos['patio-dobla-tipo'].'</td>'; else $html.='<td><b>Tipo de dobladillo:</b> -- </td>';
					$html.='<td><b>Cortar paños de:</b>'.$datos['patio-cort-panio'].' m </td></tr></table>';
					$html.='<table><tr><td><b>Pitones pasantes:</b>'.$datos['patio-pitones-pg']; 
					if(!empty($datos['patio-pitones-pg'])) : $html.= ' pulgadas'; endif;
					if(!empty($datos['patio-pitones-mm'])) : $html.= 'mm '; endif;
					$html.= '</td><td><b>Pitones para madera:</b>'.$datos['patio-pitones-madera-1'].' mm  x'.$datos['patio-pitones-madera-2']. 'mm </td></tr>';
					$html.='<tr><td><b>Pitones c/ argolla Nº:</b>'.$datos['patio-pitones-arg-num'].'</td></tr>';
					$html.='<tr>';
					if(isset($datos['patio-roldanas']))  $html.='<td><b>Roldanas:</b>'.$datos['patio-roldanas'].'</td>'; else $html.='<td><b>Roldanas:</b> --</td>'; 
					$html.='<td><b>Roldanas Nº:</b>'.$datos['patio-roldanas-num'].'</td></tr>';

					if(isset($datos['patio-mariposa'])) : $unidad = ($datos['patio-mariposa']) ? "Aluminio" : "Hierro redondo";  endif;

					$html.= '<tr><td><b>Mariposa:</b>'.$unidad.'</td>';
					$html.= '<td><b>Vaina de frente:</b>'.$datos['patio-vaina-frente'];
					if(isset($datos['patio-vaina-frente-tipo'])) $html.= '  por '.$datos['patio-vaina-frente-tipo']; 
					$html.='</td></tr>';
					$html.='<tr><td><b>Altura T faldón:</b>'.$datos['patio-alturaT-faldon'].'</td><td><b>Altura faldón:</b>'.$datos['patio-altura-faldon'].'</td></tr>';
					$html.='</table>';

				break;

				case 7:

					$html = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';

				break;

				case 8:

					$html = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';
					$html .= '<table><tr>';
					$html .= '<td><b>Ancho armazón:</b>'.$datos['aban-ancho-armazon'].' m</td>';
					$html .= '<td><b>Ancho varillas:</b>'.$datos['aban-ancho-varillas'].' m</td>';
					$html .= '</tr><tr>';
					$html .= '<td><b>Diámetro varillas:</b>'.$datos['aban-diam-varillas'].' cm</td>';
					$html .= '<td><b>Nº varillas:</b>'.$datos['aban-num-varillas'].'</td>';
					$html .= '</tr><tr>';
					$html .= '<td><b>Ancho T tela:</b>'.$datos['aban-anchoT-tela'].' m</td>';
					$html .= '<td><b>Tela:</b>'.$datos['aban-tela'].'</td>';
					$html .= '</tr><tr>';
					$derecho = $datos['aban-derecho'] ? "Interior" : "Exterior";
					$html .= '<td><b>Derecho:</b>'.$derecho.'</td>';
					$html .= '<td><b>Faldón:</b>'.$datos['aban-faldon'].' m</td>';
					$html .= '</tr><tr>';
					$html .= '<td><b>Guarda:</b>'.$datos['aban-guarda'].'</td>';
					$html .= '<td><b>Tela guarda:</b>'.$datos['aban-tela-guarda'].'</td>';
					$html .= '</tr><tr>';
					$html .= '<td><b>Color:</b>'.$datos['aban-color'].'</td>';
					$html .= '<td><b>Saliente cubretoldos:</b>'.$datos['aban-saliente-cubretoldo'].'</td>';
					$html .= '</tr><tr>';
					$html .= '<td><b>Diámetro de la soga:</b>'.$datos['aban-diam-soga'].' mm</td>';
					$html .= '<td><b>Mariposa:</b>'.$datos['aban-mariposa'].'</td>';
					$html .= '</tr></table>';
					$html .= '<p><b>Observaciones:</b>'.$datos['comment'].'</p>';	

				break;

				case 9:

					$html  = '<p><b>Tipo de Toldo:</b>'.$oe['type'].'</p><p><b>Cantidad:</b>'.$oe['qty'].'</p>';
					$html .= '<p><b>Tela:</b></p>';
					$html .= '<table><tr>';
					$html .= '<td><b>Color:</b>'.$datos['cenefa-color'].'</td>';
					$html .= '<td><b>Tipo de tela:</b>'.$datos['cenefa-TT'].'</td>';
					$html .= '<td></td>';
					$html .= '</tr><tr>';
					$html .= '<td><b>Ancho T:</b>'.$datos['cenefa-AT'].' m</td>';
					$html .= '<td><b>Ancho paño:</b>'.$datos['cenefa-AP'].' m</td>';
					$html .= '<td><b>Ancho caño:</b>'.$datos['cenefa-H-canio'].' m</td>';
					$html .= '</tr><tr>';
					$html .= '<td><b>Altura T incluyendo argolla:</b>'.$datos['cenefa-hT-argolla'].' m</td>';
					$html .= '<td></td>';
					$html .= '<td><b>Altura T argolla por atrás:</b>'.$datos['cenefa-hT-arg-atras'].' m</td>';
					$html .= '</tr><tr>';
					$html .= '<td><b>Dobladillos:</b>'.$datos['cenefa-dob'].' m</td>';
					$html .= '<td><b>Tipo de dobladillos:</b>';
					if(isset($datos['cenefa-soldado'])) {
						$html.= $datos['cenefa-hem-type'].'</td>';
					}else{
						$html .= '--</td>';
					}	
					$html .= '<td><b>Todo soldado:</b>';
					if(isset($datos['cenefa-soldado'])) { 
						$html.= $datos['cenefa-soldado'].'</td>'; 
					}else{
						$html .= '--</td>';
					}
					$html .= '</tr><tr>';
					$html .= '<td><b>Ojales de bronce nº:</b>'.$datos['cenefa-oj-num'].'</td>';
					$html .= '<td><b>Ojales cada:</b>'.$datos['cenefa-oj-c'].' cm</td>';
					$html .= '<td><b>Diámetro de la soga:</b>'.$datos['cenefa-soga-diam'].' m</td>';
					$html .= '</tr></table>';
					$html .= '<p><b>Solapa:</b></p>';
					$html .= '<table><tr>';
					$html .= '<td><b>Solapa:</b>';
					if(isset($datos['cenefa-solapa'])) { 
						$html .= $datos['cenefa-solapa'].'</td>';
					}else{
						$html .= '-- </td>';
					}
					$html .= '<td><b>Distancia borde superior a inferior de la solapa:</b>'.$datos['cenefa-solapa-dist'].' cm</td>';
					$html .= '<td><b>Altura de la solapa:</b>'.$datos['cenefa-solapa-h']. ' m</td>';	
					$html .= '</tr></table>';
					$html .= '<p><b>Observaciones:</b>'.$datos['comment'].'</p>';
				break;
		}		

	return $html;


}





