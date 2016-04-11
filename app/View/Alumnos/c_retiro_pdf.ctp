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
               $grupo = $lista['GradosSeccione']['0']['descripcion'];
               $lugar_nacim = $lista['Alumno']['lugar_nacimiento'];
               $f_na = $lista['Alumno']['fecha_nacimiento'];
               $f_retiro = $lista['Alumno']['fecha_retiro'];
               $motivo_retiro = $lista['Alumno']['motivo_retiro'];
               $nombre_rep = $lista['Persona']['0']['nombre'];
               $apellido_rep = $lista['Persona']['0']['apellido'];
               $cedula_rep = $lista['Persona']['0']['cedula'];
        endforeach; 
        
        $director = $directores['Persona']['nombre'].' '.$directores['Persona']['apellido'];
        $ci_director = $directores['Persona']['cedula'];
        
        //fecha de retiro
        $valores_r = explode('-', $f_retiro);
 //echo debug($valores);
$año_r = $valores_r[0];
$mes_r = $valores_r[1];
$dia_r = $valores_r[2];
switch ($mes_r)
      {
      case 1:
          $mes_r = 'Enero';
          break;
      case 2:
          $mes_r = 'Febrero';
          break;
      case 3:
          $mes_r = 'Marzo';
          break;
      case 4:
          $mes_r = 'Abril';
          break;
      case 5:
          $mes_r = 'Mayo';
          break;
      case 6:
          $mes_r = 'Junio';
          break;
      case 7:
          $mes_r = 'Julio';
          break;
      case 8:
          $mes_r = 'Agosto';
          break;
      case 9:
          $mes_r = 'Septiembre';
          break;
      case 10:
          $mes_r = 'Octubre';
          break;
      case 11:
          $mes_r = 'Noviembre';
          break;
      case 12:
          $mes_r = 'Diciembre';
          break;
      }





        
        
        ///calcular la edad del niño
        $hoy1 = getdate();
$dias_del_mes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
 $valores1 = explode('-', $f_na);
 //echo debug($valores);
$año1 = $valores1[0];
$mes1 = $valores1[1];
$dia1 = $valores1[2];

$años1 = $hoy1['year'] - $año1;
$meses1 = 9 - $mes1;
/*$dias1 = 1 - $dia1;

if($dias1 < 0)
{
$mes_anterior = 10;
$dias1 += $dias_del_mes[$mes_anterior];
//$dias += $dias_del_mes[$hoy['mon']];
$meses1--;
}*/
if($meses1 < 0)
{
$meses1 += 12;
$años1--;
}
//$años1;
        
        
        
 
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
        $pdf->MultiCell(200,2,'CONSTANCIA DE RETIRO',0,'C');
        $pdf->Ln(10);
        $pdf->Setx(19);
        $pdf->SetMargins(19, 19, 19);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(42,10, utf8_decode('Quien suscribe, ') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,10, utf8_decode(ucwords($director)).',  ' ,0,0,'');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(80,10, utf8_decode('titular  de  la  cédula  de  identidad  No:') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(36,10, utf8_decode($ci_director).',  ' ,0,1,'');
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0,10, utf8_decode('Director (a) del Centro de Educación Inicial "Bolívar Niño",  a  los fines legales pertinentes  y en  base  a  lo  establecido  en  el  artículo  No. 60  del  Reglamento  General  de  la  Ley  de') ,0,1,'J');
        $pdf->Cell(80,10, utf8_decode('Educación,  certifica  que  el alumno (a)'),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(93,6, utf8_decode($nombre.'  '.$nombre1.'  '.$apellido.'  '.$apellido_1) ,'B',0,'C');
        $pdf->Cell(3,10, utf8_decode(',') ,0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(23,10, utf8_decode('natural de') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(68,7, utf8_decode(strtoupper($lugar_nacim)) ,'B',0,'J');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(3,10, utf8_decode(',') ,0,0,'C');
        $pdf->Cell(8,10, utf8_decode('de') ,0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8,7, utf8_decode($años1) ,'B',0,'');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(3,10, utf8_decode('años de edad, cursante del Grupo') ,0,1,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,7, utf8_decode($grupo) ,'B',0,'');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(103,10, utf8_decode('de educación  inicial, es  retirado  de  este  centro  educativo  a  partir del dia') ,0,1,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(7, 7,utf8_decode($dia_r),'B',0,'C' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10, 10, utf8_decode("de"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20, 7,utf8_decode(strtoupper($mes_r)),'B',0,'C' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(10, 10, utf8_decode("de"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(15, 7,utf8_decode($año_r),'B',0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(3,10, utf8_decode(',') ,0,0,'C');
        $pdf->Cell(45, 10, utf8_decode("por la causa siguiente"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(65, 7,utf8_decode(strtoupper($motivo_retiro)),'B',0,'J' );

 
        
        $pdf->Ln(20);
        $pdf->Setx(19);
        
        ////con esto contruyo el mensaje del final del documento.
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(40, 10, utf8_decode("En  Caracas, a los "),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(7, 10,utf8_decode($dia),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(36, 10, utf8_decode("dias del mes  de"),0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(26, 10,utf8_decode(strtoupper($mes)),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(17, 10, utf8_decode("del año"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(5, 10,utf8_decode($año.'.'),0,0,'' );

        
        $pdf->Ln(10);
        $pdf->Setx(100);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(8, 10,utf8_decode('Atentamente.'),0,1,'C' );
        $pdf->Ln(5);
        $pdf->Setx(100);
        $pdf->Cell(8, 10,'__________________________',0,1,'C');
        $pdf->Setx(100);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8, 6, utf8_decode(ucwords($director)),0,1,'C');
        /*$pdf->Setx(100);
        $pdf->Cell(8, 6, utf8_decode('Supervisor Docente Jefe'),0,1,'C');*/
        $pdf->Setx(100);
        $pdf->Cell(8, 6, utf8_decode('Director (a) del CEI Bolívar Niño'),0,1,'C');
        $pdf->Ln(5);
        $pdf->Setx(20);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(30, 6, utf8_decode('CONFORME:'),0,1,'C');
        $pdf->Cell(30, 6, utf8_decode(''),0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(100, 6, utf8_decode('Nombre del Representante:_________________________________________________'),0,1,'J');
        $pdf->Cell(100, 6, utf8_decode('Firma:___________________________________________________________________'),0,1,'J');
        $pdf->Cell(100, 6, utf8_decode('C.I Nro:__________________________________________________________________'),0,1,'J');
        
        
        ///nueva pagina
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
        $pdf->MultiCell(200,2,'RETIRO DE DOCUMENTOS',0,'C');
        $pdf->Ln(10);
        $pdf->Setx(19);
        $pdf->SetMargins(19, 19, 19);
        $pdf->SetFont('Arial','',12);
        //$pdf->Setx(19);
        $pdf->Cell(127, 10, utf8_decode('Se hace constar por medio de la presente que el (la) ciudadano (a)'),0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(50, 7,utf8_decode($nombre_rep.'  '.$apellido_rep),'B',1,'C' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(72, 10, utf8_decode('portador(a) de la cédula de identidad'),0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(22, 7,utf8_decode($cedula_rep),'B',0,'C' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(72, 10, utf8_decode(', en  el  dia  de  hoy asistio al C.E.I  "Bolivar '),0,1,'J');
        $pdf->Cell(110, 10, utf8_decode('Niño" para retirar los documentos de su representado (a):'),0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(67,7, utf8_decode($nombre.' '.$nombre1.' '.$apellido) ,'B',1,'J');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(40, 10, utf8_decode('cursante del Grupo'),0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(32, 7,utf8_decode($grupo),'B',0,'C' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(34, 10, utf8_decode('del año escolar'),0,0,'J');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(25, 7, utf8_decode($ano_escolar),'B',0,'J');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(32, 10, utf8_decode(', a    solicitud    de      su'),0,1,'J');
        $pdf->Cell(0, 10, utf8_decode('representante se le hace entrega de su expediente completo con su debida documentación.'),0,0,'J');
        $pdf->Ln(30);
        $pdf->Setx(19);
        
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
        $pdf->Cell(30, 10,utf8_decode(strtoupper($mes)),0,0,'' );
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(15, 10, utf8_decode("del año"),0,0,'');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(5, 10,utf8_decode($año.'.'),0,0,'' );
        $pdf->Ln(25);
        $pdf->Setx(19);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(100, 6, utf8_decode('Firma del Representante:____________________________________________________'),0,1,'J');
        $pdf->Cell(100, 6, utf8_decode('C.I Nro:___________________________________________________________________'),0,1,'J');
        $pdf->Cell(100, 6, utf8_decode('Fecha:____________________________________________________________________'),0,1,'J');

        
        $pdf->Output();
?>
