<?php /*
 * ////pdf
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(40,10,$data);
    $fpdf->Output();
 */


 function Footer()
			{
			$this->SetY(-25);
			//Arial italic 8
			$this->SetFont('Arial','I',8);
			//N�mero de p�gina
			//$this->Cell(170,3,'T�lefonos: 02128754561/78/78  Email lhasjkhas@eldrcito.com',0,0,'C');
			$this->Ln(10);
			$this->SetFont('Arial','B',8);
			$this->Cell(65,3,'Pagina '.$this->PageNo().'/{nb}',0,0,'L');
			//$this->Cell(62,3,'Impreso por: '.str_replace('<br />',' ',$_SESSION[usuario]),0,0,'C');
			$this->Cell(120,3,date("d/m/Y H:i:s"),0,0,'R');					
			$this->Ln();
			$this->SetFillColor(0);
			//$this->Code128(88,285,strtoupper($_SESSION['usuario']),40,6);
			}

?>
