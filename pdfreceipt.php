<?php
	require_once "includes/sessionstart.php";
	require_once "fpdf.php";

class PDF extends FPDF{
	function Table($header, $data)
	{
	    // Column widths
   		$w = array(75, 40, 30, 45);
    	for($i=0;$i<count($header);$i++)
        	$this->Cell($w[$i],7,$header[$i],1,0,'C');
    	$this->Ln();
	   
		for($i=0; $i<count($data); $i++){
			$this->Cell($w[0],6,$data[$i][0],'LR',0,'C');
	        $this->Cell($w[1],6,$data[$i][1],'LR',0,'R');
    	    $this->Cell($w[2],6,$data[$i][2],'LR',0, 'C');
        	$this->Cell($w[3],6,$data[$i][3],'LR',0,'R');
        	$this->Ln();
		}
    	// Closing line
    	$this->Cell(array_sum($w),0,'','T');
	}
}

$data = $_SESSION['data'];
$msg1 = "OPM's General Merchandising";
$msg2 = "KM 16 Ortigas Ave. Extension,";
$msg3 = "Brgy. Sta. Lucia, Pasig City";
$msg4 = "Telephone No: 227-8475";
$tid = $_POST['tid'];
$tid1 = "Transaction no: " . $tid;
$date = date("M d, Y");
$date1 = "Date: " . $date;
$name = $_SESSION['client_name'];
$name1 = "Client: " . $name;
$thxmsg = "Thank you for your business!";

$pdf = new PDF();
$header = array('Parts and Services', 'Unit Price', 'Quantity', 'Amount');
$pdf->SetFont('Arial','B',15);
$pdf->AddPage();

$pdf->Cell(110, '', $msg1, 0, 0, 'L');
$pdf->Cell(1000, '', 'Tax Invoice', 0, 0, 'L');
$pdf->Ln(8);

$pdf->Cell(110, '', 'and Services', 0, 0, 'L');
$pdf->Cell(110, '', $tid1, 0, 0, 'L');
$pdf->Ln(8);

$pdf->SetFont('Arial','',13);
$pdf->Cell(110, '', $msg2, 0, 0, 'L');
$pdf->Ln(8);

$pdf->Cell(110, '', $msg3, 0, 0, 'L');
$pdf->SetFont('Arial','B',13);
$pdf->Cell(110, '', $date1, 0, 0, 'L');
$pdf->Ln(8);

$pdf->SetFont('Arial','',13);
$pdf->Cell(110, '', $msg4, 0, 0, 'L');
$pdf->Ln(15);

$pdf->SetFont('Arial','',11);
$pdf->Table($header, $data);
$pdf->Ln(15);

$pdf->SetFont('Arial','',13);
$pdf->Cell(110, '', $name1, 0, 0, 'L');
$pdf->Ln(8);

$pdf->Cell(110, '', $thxmsg, 0, 0, 'L');
$pdf->Output();
?>