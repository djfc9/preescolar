
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
               $grupo = $lista['GradosSeccione']['0']['descripcion'];
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
        //$pdf->SetFillColor(9,131,156);
        $pdf->MultiCell(200,2,'CONSTANCIA DE ESTUDIOS',0,'C');
        $pdf->Ln(10);
        $pdf->Setx(20);
        $pdf->SetMargins(20, 20, 30);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(32,10, utf8_decode('Quien suscribe,') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(75,10, utf8_decode('Prof. Elba Ramos C.I. No 13.586.981').',  ' ,0,0,'');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(5,10, utf8_decode('Directora del Centro de  Educación') ,0,1,'J');
        $pdf->Cell(10,10, utf8_decode('Inicial  Bolívar  Niño,  inscrito  en  el  Ministerio  del  Poder  Popular para la Educación, hace'),0,1,'J');
        $pdf->Cell(107,10, utf8_decode('constar por medio de la presente que el (la) Alumno (a)'),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(66,6, utf8_decode(strtoupper($nombre.' '.$nombre1)) ,'B',1,'C');
        $pdf->Setx(20);
        $pdf->Cell(1,10, utf8_decode(' ') ,0,0,'C');
        $pdf->Cell(64,8, utf8_decode(strtoupper($apellido.' '.$apellido1)) ,'B',0,'C');
        $pdf->Cell(5,12, utf8_decode(',') ,0,0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(65,13, utf8_decode('titular  de  la  Cédula  Escolar  No:  ') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(38,8, utf8_decode($cedula_escolar) ,'B',1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(72,12, utf8_decode('ha sido inscrito para cursar el grupo') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(32,7, utf8_decode(strtoupper($grupo)) ,'B',0,'C');
        $pdf->SetFont('Arial','',12);
        //$pdf->Cell(0,10, utf8_decode('') ,0,1,'');
        $pdf->Cell(88,12, utf8_decode('en nuestra Institución durante el año') ,0,1,'');
        $pdf->Cell(16,10, utf8_decode('escolar') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(28,6, utf8_decode($ano_escolar.'.') ,'B',0,'C');

  //año escolar
        
        $pdf->Ln(30);
        $pdf->Setx(18);
        
        ////con esto contruyo el mensaje del final del documento.
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(150, 10, utf8_decode("Constancia que se expide a petición de la parte interesada   en  Caracas, a los "),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(7, 10,utf8_decode($dia),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10, 10, utf8_decode("dias   del"),0,1,'');
        //$pdf->Setx(18);
        $pdf->Cell(17, 10, utf8_decode("mes  de"),0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(31, 10,utf8_decode(strtoupper($mes)),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(15, 10, utf8_decode("del año"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(5, 10,utf8_decode($año.'.'),0,0,'' );

        
        $pdf->Ln(20);
        $pdf->Setx(100);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(8, 10,utf8_decode('Atentamente.'),0,1,'C' );
        $pdf->Ln(10);
        $pdf->Setx(100);
        $pdf->Cell(8, 10,'__________________________',0,1,'C');
        $pdf->Setx(100);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8, 6, utf8_decode('Prof. Elba Ramos'),0,1,'C');
        $pdf->Setx(100);
        $pdf->Cell(8, 6, utf8_decode('Supervisor Docente Jefe'),0,1,'C');
        $pdf->Setx(100);
        $pdf->Cell(8, 6, utf8_decode('Directora del CEI Bolívar Niño'),0,1,'C');
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',9);
        $pdf->SetTextColor(213, 11, 11);
        $pdf->Cell(8, 10,utf8_decode('NOTA:  No Válido sin Firma y Sello Humedo'),0,1,'J' );
        $pdf->SetTextColor(0, 0, 0);
        
        
$pdf->Output();
?>