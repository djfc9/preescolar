
<?php
header('Content-type: text/html; charset= utf-8');

    //echo debug($lista);
//echo debug($alumno);
        
 
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
    //Año escolar
$ano1=date("Y");
$ano2=date("Y")+1;
$ano_escolar=$ano1."-".$ano2;
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
     $this->Cell(0,10,'Lista de preinscritos ('.$ano_escolar.') -  Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}



// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4');
$pdf->Ln(20);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255);
        $pdf->Image("./img/logos/bolivar_nino.png",16,11,24);
        $pdf->Image("./img/logos/republica.png",210,11,70);
        $pdf->Ln(8);
        $pdf->Cell(50,	4,"FECHA: ".date("d")."/".date("m")."/".date("Y") ,'0',0,'L',1);
        $pdf->Ln();
        //$fpdf->Cell(50,	6,utf8_decode("AÑO ESCOLAR: ").$ano_escolar,'0',0,'L',1);
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',14);
        $pdf->SetFillColor(9,131,156);
        $pdf->Setx(28);
        $pdf->Cell(0,8,'LISTADO DE ESTUDIANTES PREINSCRITOS' ,0,1,'C');
        $pdf->Ln(5);
        $pdf->Setx(10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(8,8,utf8_decode('N°') ,1,0,'J',true);   
        $pdf->Cell(34,8,utf8_decode('Cédula Escolar') ,1,0,'J', true);   
        $pdf->Cell(40,8,'1er Nombre' ,1,0,'J',true);
        $pdf->Cell(40,8,'2do Nombre' ,1,0,'J',true);   
        $pdf->Cell(40,8,'1er Apellido' ,1,0,'J', true); 
        $pdf->Cell(40,8,'2do Apellido' ,1,0,'J', true); 
        $pdf->Cell(30,8,'Fecha Nac' ,1,0,'J', true); 
        $pdf->Cell(22,8,'Edad HOY' ,1,0,'J', true);
        $pdf->Cell(22,8,'Edad SEP' ,1,1,'J', true);
        $pdf->SetFont('Times','',12);
        //$pdf->SetFillColor(9,131,156);
        $i =0;
        
        foreach ($alumnos as $lista):
            $pdf->Setx(10);
           // echo debug($lista);
        
        ///funcion para calcular la edad del niño en septiembre...
$f_na = $lista['Alumno']['fecha_nacimiento'];
$fecha_de_hoy = date("Y-m-d");
$hoy1 = getdate();
$dias_del_mes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
 $valores1 = explode('-', $f_na);
$año1 = $valores1[0];
$mes1 = $valores1[1];
$dia1 = $valores1[2];
$años1 = $hoy1['year'] - $año1;
$meses1 = 9 - $mes1;
if($meses1 < 0)
{
$meses1 += 12;
$años1--;
}

///funcion para calcular la edad del niño el dia de hoy
$hoy = getdate();
$dias_del_mes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
 $valores = explode('-', $f_na);
$año = $valores[0];
$mes = $valores[1];
$dia = $valores[2];

$años = $hoy['year'] - $año;
$meses = $hoy ['mon'] - $mes;
$dias = $hoy['mday'] - $dia;

if($dias < 0)
{
$mes_anterior = $hoy['mon'] -1;
$dias += $dias_del_mes[$mes_anterior];
$meses--;
}
if($meses < 0)
{
$meses += 12;
$años--;
}



             $pdf->Cell(8,6,$i++ ,1,0,'J');
             $pdf->Cell(34,6,$cedula_escolar = $lista['Alumno']['cedula_escolar'] ,1,0,'J');
             $pdf->Cell(40,6,utf8_decode(strtoupper($nombre = $lista['Alumno']['nombre'])) ,1,0,'J');
             $pdf->Cell(40,6,utf8_decode(strtoupper($nombre1 = $lista['Alumno']['segundo_nombre'])) ,1,0,'J');
             $pdf->Cell(40,6,utf8_decode(strtoupper($apellido = $lista['Alumno']['apellido'])) ,1,0,'J');
             $pdf->Cell(40,6,utf8_decode(strtoupper($apellido1 = $lista['Alumno']['segundo_apellido'])) ,1,0,'J');
             $pdf->Cell(30,6,utf8_decode($fecha = $lista['Alumno']['fecha_nacimiento']) ,1,0,'J');
             $pdf->SetTextColor(42,201,50);
             $pdf->Cell(22,6,utf8_decode($años." A ".$meses." M") ,1,0,'J');
             $pdf->SetTextColor(255,0,21);
             $pdf->Cell(22,6,utf8_decode($años1." A ".$meses1." M") ,1,1,'J');
             $pdf->SetTextColor(0);
         endforeach; 
        
$pdf->Output();
?>

