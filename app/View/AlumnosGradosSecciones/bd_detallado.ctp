
<?php
header('Content-type: text/html; charset= utf-8');

    $descripcion = $descripcion['0']['GradosSeccione']['descripcion'];

class PDF extends FPDF
{


function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Generado el: '.date("d")."/".date("m")."/".date("Y"). ',   Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4');
$pdf->Ln(10);
	$pdf->SetFont('Arial','',10);
        $pdf->Image("./img/logos/bolivar_nino.png",16,6,10);
        $pdf->Image("./img/logos/republica.png",240,6,50);
	$pdf->Ln(2);
        $pdf->SetFont('Arial','B',16);
        $pdf->SetFillColor(9,131,156);
        $pdf->Cell(0,8,'BASE DE DATOS DE ALUMNOS, REPRESENTANTES Y UBICACION DEL: '.strtoupper($descripcion)." ".$ano_escolar ,0,1,'C');
        $pdf->Ln(2);
        $pdf->Setx(10);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(10,6,'Nro' ,1,0,'L',true);   
        $pdf->Cell(30,6,strtoupper(utf8_decode('C.Escolar')) ,1,0,'L', true);   
        $pdf->Cell(60,6,strtoupper('A. Nombre y Apellido') ,1,0,'L', true);
        $pdf->Cell(60,6,strtoupper('R. Nombre y Apellido') ,1,0,'L',true);    
        $pdf->Cell(30,6,strtoupper('Parentesco') ,1,0,'L', true);
        $pdf->Cell(20,6,strtoupper('Ente') ,1,0,'L', true); 
        $pdf->Cell(65,6,strtoupper('Correo') ,1,1,'L', true);
        $pdf->SetFont('Times','',8);
        $pdf->SetFillColor(165,239,244);
        $i = 1;
    foreach ($informacion as $datos):
        
        if($datos['0']['estatu_id'] == 2){  ///si esta inscrito
          $f_na = $datos['0']['fecha_nacimiento']; //fecha de nacimeinto del niño.
          
///funcion para calcular la edad del niño en septiembre...
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
             $edad = $años1." años / ".$meses1."  Meses";
             
             $pdf->Setx(10);
             $estatus = $datos['0']['estatu_id'];
             if($estatus == 2){
             $pdf->Cell(10,5,$i++ ,1,0,'C');
             $pdf->Cell(30,5,strtoupper($datos['0']['cedula_escolar']) ,1,0,'L');
             $pdf->Cell(60,5,utf8_decode(strtoupper($datos['0']['nalumno']."  ".$datos['0']['aalumno'])) ,1,0,'L');
             $pdf->Cell(60,5,utf8_decode(strtoupper($datos['0']['nrepresentante']."  ".$datos['0']['arepresentante'])) ,1,0,'L');
             $pdf->Cell(30,5,strtoupper($datos['0']['parentesco']) ,1,0,'L');
             if($datos['0']['entes'] == '0'){
             $pdf->Cell(20,5,'N/A',1,0,'L');   
             }
             else{
             $pdf->Cell(20,5,  utf8_decode(strtoupper($datos['0']['entes'])) ,1,0,'L');
             }
             $pdf->Cell(65,5,  utf8_decode(strtoupper($datos['0']['correo'])) ,1,1,'L');
        }
        }
        
endforeach; 

$pdf->Output();
?>

