
<?php
header('Content-type: text/html; charset= utf-8');

    //echo debug($lista);

 
  

class PDF extends FPDF
{

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
     $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Año escolar
$ano1=date("Y");
$ano2=date("Y")+1;
$ano_escolar=$ano1."-".$ano2;

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(20);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255);
        $pdf->Image("./img/logos/bolivar_nino.png",16,11,24);
        $pdf->Image("./img/logos/republica.png",135,11,70);
        //$pdf->Image("/img/persona/foto/". $per_foto,156,30,29);
	$pdf->Ln(15);
        $pdf->Cell(50,	6,"FECHA: ".date("d")."/".date("m")."/".date("Y") ,'0',0,'L',1);
        $pdf->Ln();
        //$fpdf->Cell(50,	6,utf8_decode("AÑO ESCOLAR: ").$ano_escolar,'0',0,'L',1);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        $pdf->SetFillColor(9,131,156);
        $pdf->MultiCell(0,8,'AUTORIZADOS PARA LA TOMA Y PUBLICACION DE FOTOGRAFIAS DEL: '.$descripcion." ".$ano_escolar ,0,'C');
        $pdf->Ln(5);
        $pdf->Setx(20);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(10,8,'Nro' ,1,0,'C',true);   
        $pdf->Cell(40,8,utf8_decode('Cédula Escolar') ,1,0,'C', true);   
        $pdf->Cell(30,8,'Nombre' ,1,0,'C',true);   
        $pdf->Cell(30,8,'Apellido' ,1,0,'C', true);
        $pdf->Cell(60,8,utf8_decode('Teléfono de Habitación') ,1,1,'C', true); 
        $pdf->SetFont('Times','',12);
        $pdf->SetFillColor(165,239,244);
        $i = 1;
        //echo debug($alumnos);
        foreach ($alumnos as $lista):
             
             $pdf->Setx(20);
             $pdf->Cell(10,6,$i ,1,0,'C');
             $pdf->Cell(40,6,$lista['Alumno']['cedula_escolar'] ,1,0,'C');
             $pdf->Cell(30,6,utf8_decode($lista['Alumno']['nombre']) ,1,0,'C');
             $pdf->Cell(30,6,utf8_decode($lista['Alumno']['apellido']) ,1,0,'C');
             $pdf->Cell(60,6,$lista['Alumno']['telefono_habitacion'] ,1,1,'C');
            $i++;
        endforeach; 
$pdf->Output();
?>

