
<?php
header('Content-type: text/html; charset= utf-8');
//debug($alumnos);
//debug ($gradosSecciones);

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
$pdf->AddPage('L','Letter');
$pdf->Ln(10);
	$pdf->SetFont('Arial','',10);
        $pdf->Image("./img/logos/bolivar_nino.png",16,6,10);
        $pdf->Image("./img/logos/republica.png",295,6,50);
        //$pdf->Image("/img/persona/foto/". $per_foto,156,30,29);
	$pdf->Ln(2);
        //$pdf->Cell(50,	6,"FECHA: ".date("d")."/".date("m")."/".date("Y") ,'0',0,'L',1);
        //$pdf->Ln();
        //$fpdf->Cell(50,	6,utf8_decode("AÑO ESCOLAR: ").$ano_escolar,'0',0,'L',1);
        //$pdf->Ln(10);
        $pdf->SetFont('Arial','B',16);
        $pdf->SetFillColor(9,131,156);
   //     $pdf->Cell(0,8,'BASE DE DATOS DEL: '.strtoupper($descripcion)." ".$ano_escolar ,0,1,'C');
        $pdf->Ln(2);
        $pdf->Setx(25);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(10,6,'Nro' ,1,0,'L',true);   
        $pdf->Cell(25,6,strtoupper(utf8_decode('C.Escolar')) ,1,0,'L', true);   
        $pdf->Cell(55,6,strtoupper('A. Apellidos') ,1,0,'C', true); 
        $pdf->Cell(55,6,strtoupper('A. Nombres') ,1,0,'C',true);   
        $pdf->Cell(26,6,strtoupper('Fecha Nac') ,1,0,'C', true); 
        $pdf->Cell(20,6,strtoupper('Edad S.') ,1,0,'C', true);
        $pdf->Cell(16,6,strtoupper('Sexo') ,1,0,'C', true); 
        $pdf->Cell(27,6,strtoupper('G/S') ,1,0,'C', true);
        $pdf->SetFont('Times','',10);
	$pdf->Ln(6);
        $pdf->SetFillColor(165,239,244);
        $i = 1;
        //FEMEN     MASC      
        $ma= 0;   $ma_1= 0;   
        $mb= 0;   $mb_1= 0;   
        $mc= 0;   $mc_1= 0;   
        $md= 0;   $md_1= 0;   
        $pa= 0;   $pa_1= 0;   
        $pb= 0;   $pb_1= 0;   
        $pc= 0;   $pc_1= 0;   
        $sa= 0;   $sa_1= 0;   
        $sb= 0;   $sb_1= 0;   
        $ta= 0;   $ta_1= 0;   
        $tb= 0;   $tb_1= 0;   
        $tc= 0;   $tc_1= 0;   
        $total = 0;
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        $totaltotal = 0;
        
        
    foreach ($alumnos as $datos):
        //debug($datos);
        $sexo_id = $datos['0']['sexo_id'];
        if($sexo_id == 1){
          $sexo = 'M';  
        }elseif($sexo_id == 2){
            $sexo = 'F';
        }
        
        ///funcion para calcular la edad del niño en septiembre...
$f_na = $datos['0']['fecha_nacimiento'];
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
//echo $años1."-".$meses1."<br>";

               
             $pdf->Setx(25);
             $pdf->Cell(10,5,$i ,1,0,'C');
             $pdf->Cell(25,5,strtoupper($datos['0']['cedula_escolar']) ,1,0,'L');
             $pdf->Cell(55,5,utf8_decode(strtoupper($datos['0']['aalumno'].'  '.$datos['0']['aalumno2'])) ,1,0,'L');
             $pdf->Cell(55,5,utf8_decode(strtoupper($datos['0']['nalumno'].'  '.$datos['0']['nalumno2'])) ,1,0,'L');
             $pdf->Cell(26,5,$f_na ,1,0,'L');
             $pdf->Cell(20,5,$años1.'A -'.$meses1.'M' ,1,0,'L');
             $pdf->Cell(16,5,$sexo ,1,0,'C');
             $pdf->Cell(27,5,utf8_decode(strtoupper($datos['0']['grado'])) ,1,0,'L');
             
		$estatus = $datos['0']['estatu_id'];  //2 = inscrito
		$ente = $datos['0']['entes'] ;
                $cargo = $datos['0']['cargo_id'] ; //5 = atletas, 8= casos especiales,
                $caso_especial = $datos['0']['caso_especial']; //niños inscritos como casos especiales

                          switch ($datos['0']['grado']){ 
              case 'MATERNAL-A':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $ma_1 = $ma_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $ma = $ma +1;
                    }
                     
                  }
                  break;
                  
              case 'MATERNAL-B':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $mb_1 = $mb_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $mb = $mb +1;
                    }
                     
                  }
                  break;
              
                  
              case 'MATERNAL-C':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $mc_1 = $mc_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $mc = $mc +1;
                    }
                     
                  } break;
              case 'MATERNAL-D':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $md_1 = $md_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $md = $md +1;
                    }
                     
                  }break;
                  
              case 'GRUPO 1-A':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $pa_1 = $pa_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $pa = $pa +1;
                    }
                     
                  }break;
                  
              case 'GRUPO 1-B':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $pb_1 = $pb_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $pb = $pb +1;
                    }
                     
                  }break;
                  
                  
              case 'GRUPO 1-C':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $pc_1 = $pc_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $pc = $pc +1;
                    }
                     
                  }break;
                  
              case 'GRUPO 2-A':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $sa_1 = $sa_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $sa = $sa +1;
                    }
                     
                  }break;
                  
              case 'GRUPO 2-B':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $sb_1 = $sb_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $sb = $sb +1;
                    }
                     
                  }break;
                  
              case 'GRUPO 3-A':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $ta_1 = $ta_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $ta = $ta +1;
                    }
                     
                  }break;
                  
             case 'GRUPO 3-B':
                  if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $tb_1 = $tb_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $tb = $tb +1;
                    }
                     
                  }break;
                  
              case 'GRUPO 3-C':
                 if($estatus == 2){
                     $sexo_id = $datos['0']['sexo_id'];
                    if($sexo_id == 1){ ///masculinos
                     $tc_1 = $tc_1 +1;
                    }elseif($sexo_id == 2){ //femeninas
                    $tc = $tc +1;
                    }
                     
                  }break;
                          
             }
                            $total = $ma +$mb +$mc +$md +$pa +$pb +$pc +$sa +$sb +$ta +$tb +$tc; 
                            $total1 = $ma_1 +$mb_1 +$mc_1 +$md_1 +$pa_1 +$pb_1 +$pc_1 +$sa_1 +$sb_1 +$ta_1 +$tb_1 +$tc_1;
                            $totaltotal = $total+$total1;
                          
                            /*if ($datos['0']['entes'] == '0' ) { 
                              $ente = "N/A" ;
                            }elseif($datos['0']['entes'] == 'MDP'){
                                $ente = "MPPPJD" ;
                            }
			  
			   $pdf->Cell(15,5,utf8_decode(strtoupper($ente)) ,1,0,'C');*/
			 $pdf->Ln();
       $i++;    // $pdf->Cell(35,5,  utf8_decode(strtoupper($edad)) ,1,1,'L');
endforeach; 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////agregar una nueva pagina de las estadisticas/////
$pdf->AddPage('L','Legal');
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->Image("./img/logos/bolivar_nino.png",16,15,20);
$pdf->Image("./img/logos/republica.png",285,15,60);
$pdf->Ln(2);
$pdf->SetFont('Arial','U',18);
$pdf->Cell(350,5,'CENTRO DE EDUCACION INICIAL',0,1,'C');
$pdf->Ln(2);
$pdf->Cell(350,5,utf8_decode('"BOLIVAR NIÑO"'),0,1,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(350,5,'BASE DE DATOS '.$ano_escolar,0,1,'C');
$pdf->SetFont('Arial','',14);
$pdf->Ln(2);
$pdf->Cell(350,4, utf8_decode('(Alumnos, Representantes, Ubicabión y Parentesco)'),0,1,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','B',12);
////linea del encabezado de la tabla///
$pdf->Setx(50);
$pdf->Cell(50,5,'GENERO/SECCION' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'MA' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'MB' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'MC' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'MD' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'1A' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'1B' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'1C' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'2A' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'2B' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'3A' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'3B' ,1,0,'C', TRUE);
$pdf->Cell(15,5,'3C' ,1,0,'C', TRUE);
$pdf->Cell(30,5,'TOTALES' ,1,1,'C', TRUE);
//////SEGUNDA LINEA//////
$pdf->Setx(50);
$pdf->Cell(50,5,'FEMENINO' ,1,0,'L', TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(15,5,$ma ,1,0,'C');
$pdf->Cell(15,5,$mb ,1,0,'C');
$pdf->Cell(15,5,$mc ,1,0,'C');
$pdf->Cell(15,5,$md ,1,0,'C');
$pdf->Cell(15,5,$pa ,1,0,'C');
$pdf->Cell(15,5,$pb ,1,0,'C');
$pdf->Cell(15,5,$pc ,1,0,'C');
$pdf->Cell(15,5,$sa ,1,0,'C');
$pdf->Cell(15,5,$sb ,1,0,'C');
$pdf->Cell(15,5,$ta ,1,0,'C');
$pdf->Cell(15,5,$tb ,1,0,'C');
$pdf->Cell(15,5,$tc ,1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,5,$total ,1,1,'C', TRUE);
//////tercera linea//////
$pdf->Setx(50);
$pdf->Cell(50,5,'MASCULINO' ,1,0,'L', TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(15,5,$ma_1 ,1,0,'C');
$pdf->Cell(15,5,$mb_1 ,1,0,'C');
$pdf->Cell(15,5,$mc_1 ,1,0,'C');
$pdf->Cell(15,5,$md_1 ,1,0,'C');
$pdf->Cell(15,5,$pa_1 ,1,0,'C');
$pdf->Cell(15,5,$pb_1 ,1,0,'C');
$pdf->Cell(15,5,$pc_1 ,1,0,'C');
$pdf->Cell(15,5,$sa_1 ,1,0,'C');
$pdf->Cell(15,5,$sb_1 ,1,0,'C');
$pdf->Cell(15,5,$ta_1 ,1,0,'C');
$pdf->Cell(15,5,$tb_1 ,1,0,'C');
$pdf->Cell(15,5,$tc_1 ,1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,5,$total1 ,1,1,'C',TRUE);

$pdf->Setx(50);
$pdf->Cell(50,5,'TOTALES' ,1,0,'L', TRUE);
$pdf->Cell(15,5,$ma_1+$ma ,1,0,'C', TRUE);
$pdf->Cell(15,5,$mb_1+$mb ,1,0,'C', TRUE);
$pdf->Cell(15,5,$mc_1+$mc ,1,0,'C', TRUE);
$pdf->Cell(15,5,$md_1+$md ,1,0,'C', TRUE);
$pdf->Cell(15,5,$pa_1+$pa ,1,0,'C', TRUE);
$pdf->Cell(15,5,$pb_1+$pb ,1,0,'C', TRUE);
$pdf->Cell(15,5,$pc_1+$pc ,1,0,'C', TRUE);
$pdf->Cell(15,5,$sa_1+$sa ,1,0,'C', TRUE);
$pdf->Cell(15,5,$sb_1+$sb ,1,0,'C', TRUE);
$pdf->Cell(15,5,$ta_1+$ta ,1,0,'C', TRUE);
$pdf->Cell(15,5,$tb_1+$tb ,1,0,'C', TRUE);
$pdf->Cell(15,5,$tc_1+$tc ,1,0,'C', TRUE);
$pdf->Cell(30,5,$totaltotal ,1,1,'C', TRUE);
$pdf->Output();
?>


