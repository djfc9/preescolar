
<?php
header('Content-type: text/html; charset= utf-8');
foreach ($nombre_gradosSecciones as $ngrado_seccion):
    $descripcion = $ngrado_seccion['GradosSeccione']['descripcion'];
endforeach;

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
    $this->Cell(0,10,'Generado el: '.date("d")."/".date("m")."/".date("Y"). ',   Pagina '.$this->PageNo().'/{nb}',0,0,'C');
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
$pdf->AddPage('L','A4');
$pdf->Ln(10);
	$pdf->SetFont('Arial','',10);
        $pdf->Image("./img/logos/bolivar_nino.png",16,6,10);
        $pdf->Image("./img/logos/republica.png",240,6,50);
        //$pdf->Image("/img/persona/foto/". $per_foto,156,30,29);
	$pdf->Ln(2);
        //$pdf->Cell(50,	6,"FECHA: ".date("d")."/".date("m")."/".date("Y") ,'0',0,'L',1);
        //$pdf->Ln();
        //$fpdf->Cell(50,	6,utf8_decode("AÑO ESCOLAR: ").$ano_escolar,'0',0,'L',1);
        //$pdf->Ln(10);
        $pdf->SetFont('Arial','B',16);
        $pdf->SetFillColor(9,131,156);
        $pdf->Cell(0,8,'BASE DE DATOS DEL: '.strtoupper($descripcion)." ".$ano_escolar ,0,1,'C');
        $pdf->Ln(2);
        $pdf->Setx(20);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(10,6,'Nro' ,1,0,'L',true);   
        $pdf->Cell(30,6,strtoupper(utf8_decode('C.Escolar')) ,1,0,'L', true);   
        $pdf->Cell(50,6,strtoupper('Apellidos') ,1,0,'L', true);
        $pdf->Cell(50,6,strtoupper('Nombres') ,1,0,'L',true);    
        $pdf->Cell(10,6,strtoupper('Sex') ,1,0,'L', true);
        $pdf->Cell(20,6,strtoupper('Fecha N') ,1,0,'L', true); 
        $pdf->Cell(30,6,strtoupper('Edad S') ,1,0,'L', true);
        $pdf->Cell(50,6,strtoupper('Lugar Nac') ,1,1,'L', true);
        $pdf->SetFont('Times','',8);
        $pdf->SetFillColor(165,239,244);
        $i = 1;
        //echo debug($gradosSecciones);
        $uno = 0;
        $dos = 0;
        $tres = 0;
        $cuatro = 0;
        $cinco = 0;
        $seis = 0;
        $uno_f = 0;
        $dos_f = 0;
        $tres_f = 0;
        $cuatro_f = 0;
        $cinco_f = 0;
        $seis_f = 0;
        
        //echo debug($gradosSecciones);
    foreach ($gradosSecciones as $datos):
        
        if($datos['Alumno']['estatu_id'] == 2){  ///si esta inscrito
        //debug($datos);
             $f_na = $datos['Alumno']['fecha_nacimiento']; //fecha de nacimeinto del niño.
             $lugar = $datos['Alumno']['lugar_nacimiento']; // lugar de nacimiento del niño


///funcion para calcular la edad del niño en septiembre...
//$f_na = $alumno['Alumno']['fecha_nacimiento'];
$fecha_de_hoy = date("Y-m-d");

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
$edad = $años1." años / ".$meses1."  Meses";
             
             $pdf->Setx(20);
             $sexo =$datos['Alumno']['sexo_id'];
             $estatus = $datos['Alumno']['estatu_id'];
             if($estatus == 2){
             $pdf->Cell(10,5,$i ,1,0,'C');
             $pdf->Cell(30,5,strtoupper($datos['Alumno']['cedula_escolar']) ,1,0,'L');
             $pdf->Cell(50,5,utf8_decode(strtoupper($datos['Alumno']['apellido']."  ".$datos['Alumno']['segundo_apellido'])) ,1,0,'L');
             $pdf->Cell(50,5,utf8_decode(strtoupper($datos['Alumno']['nombre']."  ".$datos['Alumno']['segundo_nombre'])) ,1,0,'L');
             if($sexo == 1)
                 { 
                 $pdf->Cell(10,5,strtoupper('M') ,1,0,'C');
                 //aqui clasifico los niños por edad 
        switch($años1){
        case 1:
              $uno = $uno +1;
          //  echo "uno";
            break;
        case 2:
           $dos = $dos +1;
            //echo $dos;
            break;
        case 3:
            $tres = $tres +1;
           // echo "tres";
            break;
        case 4:
           $cuatro = $cuatro +1;
           // echo "cua";
            break;
        case 5:
           $cinco = $cinco +1;
           // echo "cin";
           break;
        case 6:
            $seis = $seis +1;
           // echo "seis";
            break;
        }

                 }
                else
                 {
                    $pdf->Cell(10,5,strtoupper('F') ,1,0,'C');
                 //$femeninas = $femeninas +1;
                          //aqui clasifico los niños por edad 
        switch($años1){
        case 1:
            $uno_f = $uno_f +1;
            //echo "uno";
            break;
        case 2:
            $dos_f = $dos_f +1;
            //echo "dos";
            break;
        case 3:
            $tres_f = $tres_f +1;
           //echo "tres";
            break;
        case 4:
            $cuatro_f = $cuatro_f +1;
            //echo "cua";
            break;
        case 5:
            $cinco_f = $cinco_f +1;
            //echo "cin";
            break;
        case 6:
            $seis_f = $seis_f +1;
           //echo "seis";
            break;
        }
                 }
            $i++;
            $pdf->Cell(20,5,strtoupper($datos['Alumno']['fecha_nacimiento']) ,1,0,'L');
            $pdf->Cell(30,5,  utf8_decode(strtoupper($edad)) ,1,0,'L');
            $pdf->Cell(50,5,  utf8_decode(strtoupper($lugar)) ,1,1,'L');
        }
        }
        
endforeach; 
//de aqui hasta abajo se mostrara la estadistica de niños
                //primera fila
        $pdf->Ln(1);
        $pdf->SetFont('Arial','B',12);
        $pdf->SetFillColor(9,131,156);
        $pdf->Cell(0,8,'ESTADISTICAS' ,0,1,'C');
        $pdf->Setx(70);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(30,5,'Sexo / Edad' ,1,0,'L', true); 
        $pdf->Cell(15,5,utf8_decode('1 Año') ,1,0,'C', true);   
        $pdf->Cell(18,5,utf8_decode('2 Años') ,1,0,'C',true);   
        $pdf->Cell(18,5,utf8_decode('3 Años') ,1,0,'C', true);  
        $pdf->Cell(18,5,utf8_decode('4 Años') ,1,0,'C', true); 
        $pdf->Cell(18,5,utf8_decode('5 Años') ,1,0,'C',true);   
        $pdf->Cell(18,5,utf8_decode('6 Años') ,1,0,'C', true);
        $pdf->Cell(18,5,'Total' ,1,1,'C', true);   
                 //segunda fila
        
        
        $pdf->Setx(70);
        //$pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,4,'Hembras' ,1,0,'L',true); 
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,4,$uno_f ,1,0,'C');   
        $pdf->Cell(18,4,$dos_f ,1,0,'C');   
        $pdf->Cell(18,4,$tres_f ,1,0,'C');  
        $pdf->Cell(18,4,$cuatro_f ,1,0,'C'); 
        $pdf->Cell(18,4,$cinco_f ,1,0,'C');   
        $pdf->Cell(18,4,$seis_f ,1,0,'C');
        $suma_f = $uno_f +$dos_f +$tres_f +$cuatro_f +$cinco_f +$seis_f;
        $pdf->Cell(18,4,$suma_f ,1,1,'C' , true);  
                //tercera fila
        $pdf->Setx(70);
        //$pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,4,'Varones' ,1,0,'L',true); 
         $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,4,$uno ,1,0,'C');   
        $pdf->Cell(18,4,$dos ,1,0,'C');   
        $pdf->Cell(18,4,$tres ,1,0,'C');  
        $pdf->Cell(18,4,$cuatro ,1,0,'C'); 
        $pdf->Cell(18,4,$cinco ,1,0,'C');   
        $pdf->Cell(18,4,$seis ,1,0,'C');
        $suma = $uno+$dos+$tres+$cuatro+$cinco+$seis;
        $pdf->Cell(18,4,$suma ,1,1,'C', true);  
                
        //totalizamos
        $t1 = $uno + $uno_f;
        $t2 = $dos + $dos_f;
        $t3 = $tres + $tres_f;
        $t4 = $cuatro + $cuatro_f;
        $t5 = $cinco + $cinco_f;
        $t6 = $seis + $seis_f;
                
                //cuarta fila
        //$total = $masculinos+$femeninas;
        $total = $t1+$t2+$t3+$t4+$t5+$t6;
        $pdf->Setx(70);
        //$pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,4,'Totales' ,1,0,'L',true); 
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15,4,$t1 ,1,0,'C');   
        $pdf->Cell(18,4,$t2 ,1,0,'C');   
        $pdf->Cell(18,4,$t3 ,1,0,'C');  
        $pdf->Cell(18,4,$t4 ,1,0,'C'); 
        $pdf->Cell(18,4,$t5 ,1,0,'C');   
        $pdf->Cell(18,4,$t6 ,1,0,'C');
        $pdf->Cell(18,4,$total ,1,1,'C', true);   
$pdf->Output();
?>

