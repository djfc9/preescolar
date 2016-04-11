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
               $fecha_nacim = $lista['Alumno']['fecha_nacimiento'];
               $apellido1 = $lista['Alumno']['segundo_apellido'];
               $lugar_nacim = $lista['Alumno']['lugar_nacimiento'];
               //$grupo = $lista['GradosSeccione']['0']['descripcion'];
               $valores1 = explode('-', $fecha_nacim);
               //echo debug($valores);
                $año_n = $valores1[0];
                $mes_n = $valores1[1];
                $dia_n = $valores1[2];
                
                
                $dia = date('d');
      $mes = date('m');
      $año = date('Y');
      
      switch ($mes_n)
      {
      case 1:
          $mes_nac = 'Enero';
          break;
      case 2:
          $mes_nac = 'Febrero';
          break;
      case 3:
          $mes_nac = 'Marzo';
          break;
      case 4:
          $mes_nac = 'Abril';
          break;
      case 5:
          $mes_nac = 'Mayo';
          break;
      case 6:
          $mes_nac = 'Junio';
          break;
      case 7:
          $mes_nac = 'Julio';
          break;
      case 8:
          $mes_nac = 'Agosto';
          break;
      case 9:
          $mes_nac = 'Septiembre';
          break;
      case 10:
          $mes_nac = 'Octubre';
          break;
      case 11:
          $mes_nac = 'Noviembre';
          break;
      case 12:
          $mes_nac = 'Diciembre';
          break;
      
      }
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


 $dia = date('d');
 $mes = date('m');
 $año = date('Y');
 $escolar_a = $mes ;   
 if ($escolar_a >= 6 ) {
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
        $pdf->MultiCell(200,2,'CONSTANCIA DE CEDULA ESCOLAR',0,'C');
        $pdf->Ln(10);
        $pdf->Setx(20);
        $pdf->SetMargins(20, 20, 30);
        $pdf->SetFont('Arial','',12);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(5,10, utf8_decode('La Dirección del Centro de  Educación Inicial  "Bolívar  Niño" del IND, hace constar que el (la)') ,0,1,'J');
        $pdf->Cell(25,10, utf8_decode('Alumno (a)'),0,0,'');
        //$pdf->Cell(107,10, utf8_decode('por medio de la presente que el (la) Alumno (a)'),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(126,6, utf8_decode(strtoupper($nombre.' '.$nombre1.' '.$apellido.' '.$apellido1)) ,'B',0,'C');
        //$pdf->Setx(20);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(2,10, utf8_decode(' ,  ') ,0,0,'C');
        $pdf->Cell(20,10, utf8_decode('   nacido (a) en') ,0,1,'C');
       //$pdf->Cell(34,8, utf8_decode(strtoupper()) ,'B',0,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(70,7, utf8_decode(strtoupper($lugar_nacim)) ,'B',0,'J');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(6,10, utf8_decode('el') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8,7, utf8_decode(strtoupper($dia_n)) ,'B',0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(8,10, utf8_decode('de') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(28,7, utf8_decode(strtoupper($mes_nac)) ,'B',0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(8,10, utf8_decode('del') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(15,7, utf8_decode(strtoupper($año_n)) ,'B',0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(2,10, utf8_decode(',') ,0,0,'');
        $pdf->Cell(65,10, utf8_decode('se  le  asigna  la') ,0,1,'');
        $pdf->Cell(40,13, utf8_decode('Cédula  Escolar No: ') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(39,8, utf8_decode($cedula_escolar) ,'B',0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(72,12, utf8_decode('la  cual  conservará  para  la  emisión  de  cualquier') ,0,1,'');
        $pdf->Cell(88,12, utf8_decode('Probatorio de Estudio hasta que obtenga su Cédula de Identidad.') ,0,1,'');

  //año escolar
        
        $pdf->Ln(30);
        $pdf->Setx(18);
        
        ////con esto contruyo el mensaje del final del documento.
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(147, 10, utf8_decode("Constancia que se expide a petición de la parte interesada en Caracas, a los "),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8, 10,utf8_decode($dia),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10, 10, utf8_decode("dias del mes"),0,1,'');
        $pdf->Setx(17);
        $pdf->Cell(17, 10, utf8_decode("de"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        
        $pdf->Cell(30, 10,utf8_decode(strtoupper($mes)),0,0,'C' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(17, 10, utf8_decode("del año"),0,0,'');
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
        
$pdf->Output();
?>
