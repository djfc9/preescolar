	

<?php
header('Content-type: text/html; charset= utf-8');

    //echo debug($lista);

    foreach ($alumnos as $data):
    
    endforeach;
 $descripcion = $data['0']['descripcion'];

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
$pdf->AddPage('L','A3');
$pdf->Ln(20);
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255);
        $pdf->Image("./img/logos/bolivar_nino.png",16,11,24);
        $pdf->Image("./img/logos/republica.png",350,11,70);
        //$pdf->Image("/img/persona/foto/". $per_foto,156,30,29);
	$pdf->Ln(15);
        $pdf->Cell(50,	6,"FECHA: ".date("d")."/".date("m")."/".date("Y") ,'0',0,'L',1);
        $pdf->Ln();
        //$fpdf->Cell(50,	6,utf8_decode("AÑO ESCOLAR: ").$ano_escolar,'0',0,'L',1);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','B',16);
        $pdf->SetFillColor(9,131,156);
        $pdf->Cell(0,10,'LISTADO DE AUTORIZADOS DEL: '.$descripcion." ".$ano_escolar ,0,1,'C');
        $pdf->Ln(5);
        $pdf->Setx(50); 
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(158,6,'Datos Del Alumno',1,0,'C', true);
        $pdf->Cell(170,6,'Datos Del Autorizado',1,1,'C', true);
        $pdf->Setx(50); 
        $pdf->Cell(8,8,'Nro' ,1,0,'C',true);   
        $pdf->Cell(40,8,  utf8_decode('Cédula Escolar') ,1,0,'C', true);   
        $pdf->Cell(40,8,'Nombre' ,1,0,'C',true);   
        $pdf->Cell(40,8,'Apellido' ,1,0,'C', true);
        $pdf->Cell(30,8,utf8_decode('Teléfono') ,1,0,'C', true); 
        $pdf->Cell(40,8,'Nombre' ,1,0,'C',true);   
        $pdf->Cell(40,8,'Apellido' ,1,0,'C', true);
        $pdf->Cell(30,8,utf8_decode('Cédula') ,1,0,'C',true);   
        $pdf->Cell(30,8,utf8_decode('Teléfono') ,1,0,'C', true);
        $pdf->Cell(30,8,'Parentesco' ,1,1,'C',true);   
        $pdf->SetFont('Times','',12);
        $pdf->SetFillColor(165,239,244);
        $i = 1;
        //echo debug($alumnos);
        $ci2 = $alumnos['0']['0']['cedula_escolar'];
        $j =1;
        foreach ($alumnos as $lista): 
       // debug($lista);
        $ci = $lista['0']['cedula_escolar'];
        if($ci2 != $ci){
            $j = $j+1;
            $ci2 = $lista['0']['cedula_escolar'];
        }
         $parentesco =$lista['0']['tipo_persona_id'];
         if(empty($parentesco)){
             $parentesco ="No Espec";
         }
        ////obtener los numeros pares////
        
        if (($j % 2) == 0) {
             $pdf->SetFillColor(206,224,226);
             $pdf->Setx(50); 
             $pdf->Cell(8,6,$i ,1,0,'C',true);
             $pdf->Cell(40,6,$lista['0']['cedula_escolar'] ,1,0,'C',true);
             $pdf->Cell(40,6, strtoupper(utf8_decode($lista['0']['nombre_al'])) ,1,0,'L',true);
             $pdf->Cell(40,6,strtoupper(utf8_decode($lista['0']['apellido_al'])) ,1,0,'L',true);
             $pdf->Cell(30,6,$lista['0']['telefono_habitacion'] ,1,0,'C',true);
             $pdf->Cell(40,6,strtoupper(utf8_decode($lista['0']['nombre_p'])) ,1,0,'L',true);
             $pdf->Cell(40,6,strtoupper(utf8_decode($lista['0']['apellido_p'])) ,1,0,'L',true);
             $pdf->Cell(30,6,$lista['0']['cedula'] ,1,0,'C',true);
             $pdf->Cell(30,6,$lista['0']['telefono_movil'] ,1,0,'C',true);
             switch ($parentesco){
                 case 1:
                     $pdf->Cell(30,6,'Madre' ,1,1,'C',true);
                     break;
                 case 2:
                     $pdf->Cell(30,6,'Padre' ,1,1,'C',true);
                     break;
                 case 3:
                     $pdf->Cell(30,6,'Caso Especial' ,1,1,'C',true);
                     break;
                 case 4:
                     $pdf->Cell(30,6,'Ti@' ,1,1,'C',true);
                     break;
                 case 6:
                     $pdf->Cell(30,6,'Prim@' ,1,1,'C',true);
                     break;
                 case 7:
                     $pdf->Cell(30,6,'Amig@' ,1,1,'C',true);
                     break;
                 case 8:
                    $pdf->Cell(30, 6, 'Abuel@', 1, 1, 'C',true);
                    break;
            }
             }else{
             $pdf->SetFillColor(248,248,224);
             $pdf->Setx(50); 
             $pdf->Cell(8,6,$i ,1,0,'C',true);
             $pdf->Cell(40,6,$lista['0']['cedula_escolar'] ,1,0,'C',true);
             $pdf->Cell(40,6, strtoupper(utf8_decode($lista['0']['nombre_al'])) ,1,0,'L',true);
             $pdf->Cell(40,6,strtoupper(utf8_decode($lista['0']['apellido_al'])) ,1,0,'L',true);
             $pdf->Cell(30,6,$lista['0']['telefono_habitacion'] ,1,0,'C',true);
             $pdf->Cell(40,6,strtoupper(utf8_decode($lista['0']['nombre_p'])) ,1,0,'L',true);
             $pdf->Cell(40,6,strtoupper(utf8_decode( $lista['0']['apellido_p'])) ,1,0,'L',true);
             $pdf->Cell(30,6,$lista['0']['cedula'] ,1,0,'C',true);
             $pdf->Cell(30,6,$lista['0']['telefono_movil'] ,1,0,'C',true);
             switch ($parentesco){
                 case 1:
                     $pdf->Cell(30,6,'Madre' ,1,1,'C',true);
                     break;
                 case 2:
                     $pdf->Cell(30,6,'Padre' ,1,1,'C',true);
                     break;
                 case 3:
                     $pdf->Cell(30,6,'Caso Especial' ,1,1,'C',true);
                     break;
                 case 4:
                     $pdf->Cell(30,6,'Ti@' ,1,1,'C',true);
                     break;
                 case 6:
                     $pdf->Cell(30,6,'Prim@' ,1,1,'C',true);
                     break;
                 case 7:
                     $pdf->Cell(30,6,'Amig@' ,1,1,'C',true);
                     break;
                 case 8:
                    $pdf->Cell(30, 6, 'Abuel@', 1, 1, 'C',true);
                    break;
            }
                 }  
            $i++;

        endforeach;
        
$pdf->Output();
?>


