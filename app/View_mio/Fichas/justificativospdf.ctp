
<?php
header('Content-type: text/html; charset= utf-8');

    //echo debug($lista);
//echo debug($hasta);
//echo $hasta;
foreach ($autorizados as $datos):
    $nombre = $datos['Persona']['nombre'];
    $apellido = $datos['Persona']['apellido'];
    $cedula = $datos['Persona']['cedula'];
endforeach;


        foreach ($alumnos as $lista):
           // echo debug($lista);
               $nombre_al = $lista['Alumno']['nombre'];
               $cedula_escolar = $lista['Alumno']['cedula_escolar'];
               $apellido_al = $lista['Alumno']['apellido'];
        endforeach; 
 
      $dia = date('d');
      $mes = date('m');
      $año = date('Y');
      
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

//Año escolar
$ano1=date("Y");
$ano2=date("Y")+1;
$ano_escolar=$ano1."-".$ano2;

// Creación del objeto de la clase heredada
       
       
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
        $pdf->Setx(20);
	$pdf->SetFont('Arial','',10);
        $pdf->Image("./img/logos/top_medico.jpg",16,11,183,7);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',12);
        $pdf->Setx(65);
        $pdf->MultiCell(90,8, utf8_decode('INSTITUTO NACIONAL DE DEPORTES DIRECCIÓN MÉDICA'),0,'C');
        $pdf->Setx(20);
        $pdf->Ln(20);
        $pdf->SetFont('Arial','B',14);
        $pdf->MultiCell(200,2, utf8_decode('CONSTANCIA'),0,'C');
        $pdf->Ln(10);
        $pdf->Setx(20);
        $pdf->SetMargins(20, 20, 30);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(115,10, utf8_decode('Por medio de la presente, hago constar que el (la) señor (a):') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(62,7, utf8_decode($nombre.' '.$apellido) ,'B',0,'C');
        $pdf->Cell(0,10, utf8_decode(',') ,0,1,'J');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(81,10, utf8_decode('portador (a) de la Cédula de Identidad N°:') ,0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(25,7, utf8_decode('V-'.$cedula) ,'B',0,'C');
        $pdf->Cell(1,10, utf8_decode(',') ,0,0,'J');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,10, utf8_decode(' asistio a este centro por emergencias'),0,1,'');
        $pdf->Cell(28,10, utf8_decode('médicas con:'),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(64,7, utf8_decode($nombre_al.' '.$apellido_al) ,'B',0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(1,10, utf8_decode(',') ,0,0,'J'); 
        $pdf->Cell(75,10, utf8_decode(' estudiante Activo de esta institución,') ,0,0,'J');
        $pdf->Cell(0,10, utf8_decode('el día') ,0,1,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(25,7, utf8_decode($fecha) ,'B',0,'J');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(1,10, utf8_decode('.') ,0,0,'J'); 
        $pdf->Ln(30);
        $pdf->Setx(20);
        
        ////con esto contruyo el mensaje del final del documento.
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(155, 10, utf8_decode("Constancia  que  se expide a petición de la parte interesada en Caracas, a   los "),0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8, 10,utf8_decode($dia),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10, 10, utf8_decode("mes de"),0,1,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Setx(20);
        $pdf->Cell(12, 10,utf8_decode($mes),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(15, 10, utf8_decode("del año"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(5, 10,utf8_decode($año.'.'),0,1,'' );
        
        $pdf->Ln(20);
        $pdf->Setx(80);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(150, 10,utf8_decode('Dr.:__________________________________'),0,0,'C' );
        
$pdf->Output();
?>

