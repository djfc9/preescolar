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
               //$grupo = $lista['GradosSeccione']['0']['descripcion'];
        endforeach; 
        
        foreach ($lista['Persona'] as $persona):
        $personas = $persona['representante'];
        if($personas == 'Si'){
        $nombre_rep = $persona['nombre'];
        $apellido_rep = $persona['apellido'];
        $cedula_rep = $persona['cedula'];
        }
        endforeach;
 
      //Año escolar
$ano1=date("Y");
$ano2=date("Y")+1;
$ano_escolar=$ano1."-".$ano2;


 $dia = date('d');
 $mes = date('m');
 $año = date('Y');
 $escolar_a = $mes ;   
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
        $pdf->MultiCell(200,2,  utf8_decode('CONSTANCIA'),0,'C');
        $pdf->Ln(10);
        $pdf->Setx(20);
        $pdf->SetMargins(20, 20, 30);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(155,10, utf8_decode('Quien suscribe, Prof. Elba Ramos Directora del C.E.I "Bolívar Niño", por medio  de la presente').' ' ,0,1,'');
        $pdf->Cell(85,10, utf8_decode('hace  constar  que  el  (la)  Ciudadano  (a):'),0,0,'');
        $pdf->Cell(67,6, utf8_decode(strtoupper($nombre_rep.' '.$apellido_rep)) ,'B',0,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(66,10, utf8_decode(', titular  de  la') ,0,1,'');
        $pdf->Cell(50,10, utf8_decode('Cédula de identidad  No: ') ,0,0,'');
        $pdf->Cell(20,6, utf8_decode(strtoupper($cedula_rep)) ,'B',0,'C');
        $pdf->Cell(50,10, utf8_decode(',  debe asistir a este  Centro Educativo con la finalidad de') ,0,1,'');
        $pdf->Cell(65,10, utf8_decode('traer y retirar a su menor hijo (a):') ,0,0,'');
        $pdf->Cell(93,6, utf8_decode(strtoupper($nombre.' '.$nombre1.' '.$apellido.' '.$apellido_1)) ,'B',0,'C');
        $pdf->Cell(3,10, utf8_decode(', ') ,0,0,'C');
        $pdf->Cell(78,10, utf8_decode('cursante') ,0,1,'');
        $pdf->Cell(20,10, utf8_decode('del grupo') ,0,0,'');
        $pdf->Cell(34 ,6, utf8_decode(strtoupper($grupo)) ,'B',0,'C');
        $pdf->Cell(82,10, utf8_decode(' de  preescolar  durante  el  año   escolar: ') ,0,0,'');
        $pdf->Cell(26,6, utf8_decode($ano_escolar.'.') ,'B',0,'C');
        $pdf->Cell(50,10, utf8_decode(',  en   el') ,0,1,'');
        $pdf->Cell(50,10, utf8_decode('siguiente horario:') ,0,1,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(180, 6,'Entrada: 8:45 Am',0,1,'C' );
        $pdf->Cell(180, 6,'Salida: 4:30pm a 5:00pm',0,1,'C' );

        $pdf->Ln(2);
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(180,10,utf8_decode('En este sentido mucho agradecemos la atención que se brinde al (la) prenombrado (a) para que pueda cumplir con las responsabilidades escolares de su representado (a) en esta casa de estudios a la hora correspondiente.'));                                       
                                               
        $pdf->Ln(10);
        $pdf->Setx(20);
        
        ////con esto contruyo el mensaje del final del documento.
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(147, 10, utf8_decode("Constancia que se expide a petición de la parte interesada en Caracas, a los "),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8, 10,utf8_decode($dia),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10, 10, utf8_decode(" dias  del"),0,1,'');
        $pdf->Setx(20);
        $pdf->Cell(17, 10, utf8_decode("mes  de"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        
        $pdf->Cell(30, 10,utf8_decode(strtoupper($mes)),0,0,'C' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(17, 10, utf8_decode("del año"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(5, 10,utf8_decode($año.'.'),0,0,'' );

        
        $pdf->Ln(20);
        $pdf->Setx(100);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(8, 6,utf8_decode('Atentamente.'),0,1,'C' );
        $pdf->Ln(5);
        $pdf->Setx(100);
        $pdf->Cell(8, 6,'__________________________',0,1,'C');
        $pdf->Setx(100);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8, 4, utf8_decode('Prof. Elba Ramos'),0,1,'C');
        $pdf->Setx(100);
        $pdf->Cell(8, 4, utf8_decode('Supervisor Docente Jefe'),0,1,'C');
        $pdf->Setx(100);
        $pdf->Cell(8, 4, utf8_decode('Directora del CEI Bolívar Niño'),0,1,'C');
        
$pdf->Output();
?>


