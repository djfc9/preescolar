<?php
header('Content-type: text/html; charset= utf-8');

    //echo debug($lista);
//echo debug($alumno);
        foreach ($alumno as $lista):
            //echo debug($lista);
               $nombre = $lista['Alumno']['nombre'];
               $nombre1 = $lista['Alumno']['segundo_nombre'];
               $cedula_escolar = $lista['Alumno']['cedula_escolar'];
               $apellido = $lista['Alumno']['apellido'];
               $apellido1 = $lista['Alumno']['segundo_apellido'];
               $direccion = $lista['Alumno']['direccion'];
               $fecha_nac = $lista['Alumno']['fecha_nacimiento'];
        endforeach; 
 
      $dia = date('d');
      $mes = date('m');
      $año = date('Y');
   
   $escolar_a = $mes ;   
   
      switch ($mes)
      {
      case 1:
          $mes = 'Enero';
          break;
      case 2:
          $mes = 'Febrero';
          break;
      case 3:
          $mes = 'Marzo';
          break;
      case 4:
          $mes = 'Abril';
          break;
      case 5:
          $mes = 'Mayo';
          break;
      case 6:
          $mes = 'Junio';
          break;
      case 7:
          $mes = 'Julio';
          break;
      case 8:
          $mes = 'Agosto';
          break;
      case 9:
          $mes = 'Septiembre';
          break;
      case 10:
          $mes = 'Octubre';
          break;
      case 11:
          $mes = 'Noviembre';
          break;
      case 12:
          $mes = 'Diciembre';
          break;
      
      }

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
if ($escolar_a >= 7 ) {
//Año escolar
$ano1=date("Y");
$ano2=date("Y")+1;
$ano_escolar=$ano1."-".$ano2;
}else {
//Año escolar
$ano1=date("Y")-1;
$ano2=date("Y");
$ano_escolar=$ano1."-".$ano2;

}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
$pdf->Ln(20);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255);
        $pdf->Image("./img/logos/bolivar_nino.png",16,11,24);
        $pdf->Image("./img/logos/republica.png",135,11,70);
        //$pdf->Image("/img/persona/foto/". $per_foto,156,30,29);
	$pdf->Ln(15);
        //$pdf->Cell(50,	6,"FECHA: ".date("d")."/".date("m")."/".date("Y") ,'0',0,'L',1);
        $pdf->Ln();
        //$fpdf->Cell(50,	6,utf8_decode("AÑO ESCOLAR: ").$ano_escolar,'0',0,'L',1);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',14);
        //$pdf->SetFillColor(9,131,156);
        $pdf->MultiCell(200,2,'DIRECCION DE HABITACION',0,'C');
        $pdf->Ln(10);
        $pdf->Setx(40);
        $pdf->SetMargins(20, 20, 30);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(48,8, utf8_decode('Nombre del Niño (a):'),1,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(92,8, utf8_decode(strtoupper($nombre.' '.$nombre1.' '.$apellido.' '.$apellido1)),1,1,'');
        $pdf->Setx(40);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(48,8, utf8_decode('Fecha de nacimiento:') ,1,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(92,8, $fecha_nac,1,1,'');
        $pdf->Setx(40);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(48,8, utf8_decode('Cédula Escolar:  ') ,1,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(92,8, utf8_decode($cedula_escolar),1,1,'');
        $pdf->Setx(40);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(48,16, utf8_decode('Dirección de Habitación:  ') ,1,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->MultiCell(92,8, utf8_decode($direccion) ,1,'B',1,1,'L');
        
$pdf->Output();
?>
