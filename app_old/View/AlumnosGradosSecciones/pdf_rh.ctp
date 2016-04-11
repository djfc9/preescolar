
<?php
header('Content-type: text/html; charset= utf-8');
//debug($nombre_gradosSecciones);
//debug ($gradosSecciones);
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
        //$pdf->Cell(0,8,'BASE DE DATOS DEL: '.strtoupper($descripcion)." ".$ano_escolar ,0,1,'C');
        $pdf->Ln(2);
        $pdf->Setx(20);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(10,6,'Nro' ,1,0,'L',true);   
        $pdf->Cell(30,6,strtoupper(utf8_decode('C.i. Escolar')) ,1,0,'L', true);   
        $pdf->Cell(30,6,strtoupper('Nombre') ,1,0,'L',true);   
        $pdf->Cell(35,6,strtoupper('Apellido') ,1,0,'L', true); 
        $pdf->Cell(27,6,strtoupper('G/S') ,1,0,'C', true); 
        $pdf->Cell(45,6,strtoupper('Representante') ,1,0,'C',true);   
        $pdf->Cell(25,6,strtoupper('Parentesco') ,1,0,'L', true);
        $pdf->Cell(25,6,strtoupper('Ente') ,1,0,'L', true); 
        $pdf->Cell(35,6,strtoupper('Edad') ,1,1,'L', true);
        $pdf->SetFont('Times','',10);
        $pdf->SetFillColor(165,239,244);
        $i = 1;
        //echo debug($gradosSecciones);
        $masculinos = 0;
        $femeninas = 0;
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
        
        
    foreach ($gradosSecciones as $datos):
        //debug($datos);
             $f_na = $datos['Alumno']['fecha_nacimiento']; //fecha de nacimeinto del niño.
     //$personas = $datos[''][''][''];
     
///funcion para calcular la edad del niño
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
//$dias += $dias_del_mes[$hoy['mon']];
$meses--;
}
if($meses < 0)
{
$meses += 12;
$años--;
}
$edad = $años." años / ".$meses."  Meses";


             
             $pdf->Setx(20);
             $sexo =$datos['Alumno']['sexo_id'];
             $pdf->Cell(10,5,$i ,1,0,'C');
             $pdf->Cell(30,5,strtoupper($datos['Alumno']['cedula_escolar']) ,1,0,'L');
             $pdf->Cell(30,5,utf8_decode(strtoupper($datos['Alumno']['nombre'])) ,1,0,'L');
             $pdf->Cell(35,5,utf8_decode(strtoupper($datos['Alumno']['apellido'])) ,1,0,'L');
             $pdf->Cell(27,5,utf8_decode(strtoupper($datos['GradosSeccione']['descripcion'])) ,1,0,'L');
             $pdf->Cell(25,5,strtoupper($datos['Alumno']['telefono_habitacion']) ,1,0,'L');
             if($sexo == 1)
                 { 
                 $pdf->Cell(15,5,strtoupper('M') ,1,0,'C');
                 $masculinos = $masculinos +1; 
                 //aqui clasifico los niños por edad 
        switch($años){
        case 1:
              $uno = $uno +1;
          //  echo "uno";
            break;
        case 2:
           $dos = $dos +1;
           // echo "dos";
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
        case 6:
            $seis = $seis +1;
           // echo "seis";
            break;
        }

                 }
                else
                 {
                    $pdf->Cell(15,5,strtoupper('F') ,1,0,'C');
                 $femeninas = $femeninas +1;
                          //aqui clasifico los niños por edad 
        switch($años){
        case 1:
              $uno_f = $uno_f +1;
          //  echo "uno";
            break;
        case 2:
           $dos_f = $dos_f +1;
           // echo "dos";
            break;
        case 3:
            $tres_f = $tres_f +1;
           // echo "tres";
            break;
        case 4:
           $cuatro_f = $cuatro_f +1;
           // echo "cua";
            break;
        case 5:
         $cinco_f = $cinco_f +1;
           // echo "cin";
        case 6:
            $seis_f = $seis_f +1;
           // echo "seis";
            break;
        }
                 }
            $i++;
            $pdf->Cell(25,5,strtoupper($datos['Alumno']['fecha_nacimiento']) ,1,0,'L');
            $pdf->Cell(35,5,  utf8_decode(strtoupper($edad)) ,1,1,'L');
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
        $suma_f = $uno_f +$dos_f +$tres_f +$cuatro_f +$cinco_f +$seis;
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
        $total = $masculinos+$femeninas;
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

