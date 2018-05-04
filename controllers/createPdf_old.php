
<?php 
require('../fpdf181/fpdf.php');
require_once('../models/db.php');
require_once('../models/order.php');
class PDF extends FPDF {

	function createHeader($orderData){

		$header = array('name'=>'Cliente','date'=>'Fecha','address'=>'Direccion','city'=>'Ciudad','phone_home'=>'Tel Particular','phone_cell'=>'Tel Celular','phone_work'=>'Tel Comercial','phone_work_int'=>'Interno','description' => 'Tipo de trabajo','mail' => 'Email');

		$i = 1;

		foreach($orderData[0] as $key => $value){

			if(isset($header[$key])){

		//		echo($header[$key].":".$value);

			if($key == "date") { $value = date_format(date_create($value),'d-m-Y'); }	
			
			$this->Cell(90,7,$header[$key].":".$value);
        	
        	if($key == "description"){

        		$this->Ln();
        		$this->Cell(90,7,$header[$key].":".$value);
        	}

        	if($i%2 == 0){$this->Ln();}
        		$i++;
			}
		}
	}

}

$order = new Order();

$orderData = $order->getOrderById($_GET['order-id']);

//print_r($orderData);

$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,'Lonera Santa Fe  - Presupuesto','C');
$pdf->Ln();
$pdf->SetFont('Times','',12);

$pdf->createHeader($orderData);

/*
$pdf->SetLineWidth(0);
$i = 1;
    foreach($header as $col){

        $pdf->Cell(60,7,$col.":");
        if($i%2 == 0){$pdf->Ln();}
        $i++;
}
*/
//$pdf->Ln();

$pdf->Output();

