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
               $apellido_1 = $lista['Alumno']['segundo_apellido'];
               $lugar_nacim = $lista['Alumno']['lugar_nacimiento'];
               //$grupo = $lista['GradosSeccione']['0']['descripcion'];
               
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

if ($escolar_a >= 9 ) {
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
        $pdf->MultiCell(200,2,  utf8_decode('BOLETA DE PROMOCIÓN'),0,'C');
        $pdf->Ln(10);
        $pdf->Setx(12);
        $pdf->SetMargins(20, 20, 30);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(92,10, utf8_decode('Quien suscribe, hace constar que el (la) Alumno (a):').' ' ,0,0,'');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(93,6, utf8_decode(strtoupper($nombre.' '.$nombre1.' '.$apellido.' '.$apellido_1)) ,'B',0,'C');
        $pdf->Cell(1,10,',','',1,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Setx(12);
        $pdf->Cell(41,10, utf8_decode('de Cédula Escolar No:  ') ,0,0,'');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(30,6, utf8_decode($cedula_escolar) ,'B',0,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(21,10, utf8_decode('natural de: ') ,0,0,'');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(94,6, utf8_decode($lugar_nacim.',') ,'B',0,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(1,10,',' ,'',1,'C');
        $pdf->Setx(12);
        $pdf->Cell(127,10, utf8_decode('fue inscrito (a) en este Centro de Educación Inicial para cursar el  grupo:') ,0,0,'');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(34 ,6, utf8_decode(strtoupper($grupo)) ,'B',0,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(32,10, utf8_decode('de Preescolar,') ,0,1,'');
        $pdf->Setx(12);
        $pdf->Cell(49,10, utf8_decode('durante el período Escolar:') ,0,0,'');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(26,6, utf8_decode($ano_escolar) ,'B',0,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(1,10,'.' ,'',0,'C');
        $pdf->Cell(49,10, utf8_decode('Cursó sus estudios en dicha sección y ha sido promovido (a)  al') ,0,1,'');
        $pdf->Setx(12);
        $pdf->Cell(49,10, utf8_decode('PRIMER GRADO de Educación Básica.') ,0,1,'');

         


  //año escolar
        
        $pdf->Ln(30);
        $pdf->Setx(12);
        
        ////con esto contruyo el mensaje del final del documento.
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(27, 10, utf8_decode("Caracas, a los "),0,0,'');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(8, 10,utf8_decode($dia),0,0,'' );
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(30, 10, utf8_decode(" dias  del  mes  de"),0,0,'');
        $pdf->Cell(30, 10,utf8_decode(strtoupper($mes)),0,0,'C' );
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(17, 10, utf8_decode("del año"),0,0,'');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(5, 10,utf8_decode($año.'.'),0,0,'' );

        
        $pdf->Ln(20);
        $pdf->Setx(100);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(8, 10,utf8_decode('Atentamente.'),0,1,'C' );
        $pdf->Ln(10);
         $pdf->Setx(55);
        $pdf->Cell(8, 10,'__________________________',0,0,'C');
        $pdf->Setx(150);
        $pdf->Cell(8, 10,'__________________________',0,1,'C');
         $pdf->Setx(55);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(8, 6, utf8_decode('Prof. Elba Ramos'),0,0,'C');
        $pdf->Setx(150);
        $pdf->Cell(8, 6, utf8_decode('_____________________'),0,1,'C');
         $pdf->Setx(55);
        $pdf->Cell(8, 6, utf8_decode('Supervisor Docente Jefe'),0,0,'C');
        $pdf->Setx(150);
        $pdf->Cell(8, 6, utf8_decode('Docente de Grupo 3ro: "_____"'),0,1,'C');
         $pdf->Setx(55);
        $pdf->Cell(8, 6, utf8_decode('Directora del CEI Bolívar Niño'),0,1,'C');
        
        
        $pdf->Ln(15);
        $pdf->Setx(80);
        $pdf->Cell(50,10,'"Diligencia, Constancia y Excelencia"',0,0,'C');
$pdf->Output();
?>


