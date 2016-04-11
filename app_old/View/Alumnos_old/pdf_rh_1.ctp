
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
$pdf->AddPage('L','Legal');
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
        $pdf->Setx(11);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(10,6,'Nro' ,1,0,'L',true);   
        $pdf->Cell(25,6,strtoupper(utf8_decode('C.Escolar')) ,1,0,'L', true);   
        $pdf->Cell(33,6,strtoupper('A. Nombre') ,1,0,'C',true);   
        $pdf->Cell(35,6,strtoupper('A. Apellido') ,1,0,'C', true); 
        $pdf->Cell(27,6,strtoupper('G/S') ,1,0,'C', true); 
        $pdf->Cell(70,6,strtoupper('Representante') ,1,0,'C',true);   
        $pdf->Cell(28,6,strtoupper('Parentesco') ,1,0,'C', true);
        $pdf->Cell(15,6,strtoupper('Ente') ,1,0,'C', true); 
        $pdf->Cell(85,6,strtoupper('Correo') ,1,0,'C', true); 
        $pdf->SetFont('Times','',10);
		$pdf->Ln(6);
        $pdf->SetFillColor(165,239,244);
        $i = 1;
        $ma= 0; $ma_1= 0; $ma_2= 0;$ma_3= 0;
        $mb= 0; $mb_1= 0; $mb_2= 0;$mb_3= 0;
        $mc= 0; $mc_1= 0; $mc_2= 0;$mc_3= 0;
        $md= 0; $md_1= 0; $md_2= 0;$md_3= 0;
        $pa= 0; $pa_1= 0; $pa_2= 0;$pa_3= 0;
        $pb= 0; $pb_1= 0; $pb_2= 0;$pb_3= 0;
        $pc= 0; $pc_1= 0; $pc_2= 0;$pc_3= 0;
        $sa= 0; $sa_1= 0; $sa_2= 0;$sa_3= 0;
        $sb= 0; $sb_1= 0; $sb_2= 0;$sb_3= 0;
        $ta= 0; $ta_1= 0; $ta_2= 0;$ta_3= 0;
        $tb= 0; $tb_1= 0; $tb_2= 0;$tb_3= 0;
        $tc= 0; $tc_1= 0; $tc_2= 0;$tc_3= 0;
        $total = 0;
        $total1 = 0;
        $total2 = 0;
        $totaltotal = 0;
        
        
    foreach ($alumnos as $datos):
        //debug($datos);
         //    $f_na = $datos['Alumno']['fecha_nacimiento']; //fecha de nacimeinto del niñ
               
             $pdf->Setx(11);
             $pdf->Cell(10,5,$i ,1,0,'C');
             $pdf->Cell(25,5,strtoupper($datos['0']['cedula_escolar']) ,1,0,'L');
             $pdf->Cell(33,5,utf8_decode(strtoupper($datos['0']['aalumno'])) ,1,0,'L');
             $pdf->Cell(35,5,utf8_decode(strtoupper($datos['0']['nalumno'])) ,1,0,'L');
	     $pdf->Cell(27,5,utf8_decode(strtoupper($datos['0']['grado'])) ,1,0,'L');
             $pdf->Cell(35,5,utf8_decode(strtoupper($datos['0']['nrepresentante'])) ,1,0,'L');
             $pdf->Cell(35,5,utf8_decode(strtoupper($datos['0']['arepresentante'])) ,1,0,'L');
			  $pdf->Cell(28,5,utf8_decode(strtoupper($datos['0']['parentesco'])) ,1,0,'C');
			  $estatus = $datos['0']['estatu_id'];
			  $ente = $datos['0']['entes'] ;
                          $cargo = $datos['0']['cargo_id'] ;
                          switch ($datos['0']['grado']){
                          case 'MATERNAL-A':
                              if($ente == 'IND' && $estatus ==2){$ma = $ma+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$ma_2 = $ma_2 +1;}
                              elseif($ente == '0'  && $estatus ==2){
                                  if($cargo == 5){$ma_1 = $ma_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){$ma_3 = $ma_3+1;}} ///si es caso especial
                              break;
                              
                          case 'MATERNAL-B':
                              if($ente == 'IND'  && $estatus ==2){$mb = $mb+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$mb_2 = $mb_2+1;}
                              elseif($ente == '0'  && $estatus ==2){
                               if($cargo == 5){$mb_1 = $mb_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){$mb_3 = $mb_3+1;}} ///si es caso especial
                              
                              break;
                              
                          case 'MATERNAL-C':
                              if($ente == 'IND'  && $estatus ==2){$mc = $mc+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$mc_2 = $mb_2+1;}
                              elseif($ente == '0'  && $estatus ==2){
                              if($cargo == 5){ $mc_1 = $mc_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){ $mc_3 = $mc_3+1;}} ///si es caso especial
                              
                              break;
                          case 'MATERNAL-D':
                              ///if($ente == 'IND'){$md = $md+1;}elseif($ente == 'MDP'){$mc_2 = $mb_2+1;}elseif($ente == '0'){ $md_1 = $md_1+1;}
                              if($ente == 'IND'  && $estatus ==2){$md = $md+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$md_2 = $md_2+1;}
                              elseif($ente == '0'  && $estatus ==2){ 
                                  if($cargo == 5){ $md_1 = $md_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){ $md_3 = $md_3+1;}} ///si es caso especial
                              
                              break;
                              
                          case 'GRUPO 1-A':
                              if($ente == 'IND'  && $estatus ==2){$pa = $pa+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$pa_2 = $pa_2+1;}
                              elseif($ente == '0'  && $estatus ==2){ 
                              if($cargo == 5){ $pa_1 = $pa_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){ $pa_3 = $pa_3+1;}} ///si es caso especial
                              
                              break;
                              
                          case 'GRUPO 1-B':
                              if($ente == 'IND'  && $estatus ==2){$pb = $pb+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$pb_2 = $pb_2+1;}
                              elseif($ente == '0'  && $estatus ==2){ 
                              if($cargo == 5){ $pb_1 = $pb_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){ $pb_3 = $pb_3+1;}} ///si es caso especial
                              
                              break;
                              
                              
                          case 'GRUPO 1-C':
                              if($ente == 'IND'  && $estatus ==2){$pc = $pc+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$pc_2 = $pc_2+1;}
                              elseif($ente == '0'  && $estatus ==2){ 
                               if($cargo == 5){ $pc_1 = $pc_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){ $pc_3 = $pc_3+1;}} ///si es caso especial
                              
                              break;
                              
                          case 'GRUPO 2-A':
                              if($ente == 'IND'  && $estatus ==2){$sa = $sa+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$sa_2 = $sa_2+1;}
                              elseif($ente == '0'  && $estatus ==2){ 
                              if($cargo == 5){ $sa_1 = $sa_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){ $sa_3 = $sa_3+1;}} ///si es caso especial
                              
                              break;
                              
                          case 'GRUPO 2-B':
                              if($ente == 'IND'  && $estatus ==2){$sb = $sb+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$sb_2 = $sb_2+1;}
                              elseif($ente == '0'  && $estatus ==2){ 
                               if($cargo == 5){ $sb_1 = $sb_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){ $sb_3 = $sb_3+1;}} ///si es caso especial
                              
                              break;
                          case 'GRUPO 3-A':
                              if($ente == 'IND'  && $estatus ==2){$ta = $ta+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$ta_2 = $ta_2+1;}
                              elseif($ente == '0'  && $estatus ==2){ 
                              if($cargo == 5){$ta_1 = $ta_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){$ta_3 = $ta_3+1;}} ///si es caso especial
                              
                              break;
                              
                          case 'GRUPO 3-B':
                              if($ente == 'IND'  && $estatus ==2){$tb = $tb+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$tb_2 = $tb_2+1;}
                              elseif($ente == '0'  && $estatus ==2){ 
                              if($cargo == 5){$tb_1 = $tb_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){$tb_3 = $tb_3+1;}} ///si es caso especial
                              
                              break;
                              
                          case 'GRUPO 3-C':
                              if($ente == 'IND'  && $estatus ==2){$tc = $tc+1;}
                              elseif($ente == 'MDP'  && $estatus ==2){$tc_2 = $tc_2+1;}
                              elseif($ente == '0'  && $estatus ==2){
                              if($cargo == 5){ $tc_1 = $tc_1+1;} ///si es atleta
                                  elseif($cargo == 8 || $datos['0']['caso_especial'] == TRUE){ $tc_3 = $tc_3+1;}} ///si es caso especial
                              
                              break;
                          
                          }
                            $total = $ma +$mb +$mc +$md +$pa +$pb +$pc +$sa +$sb +$ta +$tb +$tc; 
                            $total1 = $ma_1 +$mb_1 +$mc_1 +$md_1 +$pa_1 +$pb_1 +$pc_1 +$sa_1 +$sb_1 +$ta_1 +$tb_1 +$tc_1;
                            $total2 = $ma_2 +$mb_2 +$mc_2 +$md_2 +$pa_2 +$pb_2 +$pc_2 +$sa_2 +$sb_2 +$ta_2 +$tb_2 +$tc_2;
                            $total3 = $ma_3 +$mb_3 +$mc_3 +$md_3 +$pa_3 +$pb_3 +$pc_3 +$sa_3 +$sb_3 +$ta_3 +$tb_3 +$tc_3;
                            $totaltotal = $total+$total1+$total2+$total3;
                          
                            if ($datos['0']['entes'] == '0' ) { 
                              $ente = "N/A" ;
                            }
			  
			   $pdf->Cell(15,5,utf8_decode(strtoupper($ente)) ,1,0,'C');
                           $pdf->Cell(85,5,strtoupper($datos['0']['correo']) ,1,0,'L');
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
$pdf->Cell(50,5,'DESCRIP/SECCION' ,1,0,'C', TRUE);
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
$pdf->Cell(50,5,'IND' ,1,0,'L', TRUE);
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
$pdf->Cell(50,5,'MPPPJD' ,1,0,'L', TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(15,5,$ma_2 ,1,0,'C');
$pdf->Cell(15,5,$mb_2 ,1,0,'C');
$pdf->Cell(15,5,$mc_2 ,1,0,'C');
$pdf->Cell(15,5,$md_2 ,1,0,'C');
$pdf->Cell(15,5,$pa_2 ,1,0,'C');
$pdf->Cell(15,5,$pb_2 ,1,0,'C');
$pdf->Cell(15,5,$pc_2 ,1,0,'C');
$pdf->Cell(15,5,$sa_2 ,1,0,'C');
$pdf->Cell(15,5,$sb_2 ,1,0,'C');
$pdf->Cell(15,5,$ta_2 ,1,0,'C');
$pdf->Cell(15,5,$tb_2 ,1,0,'C');
$pdf->Cell(15,5,$tc_2 ,1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,5,$total2 ,1,1,'C',TRUE);
///////cuarta linea //////
$pdf->Setx(50);
$pdf->Cell(50,5,'ATLETAS ACTIVOS' ,1,0,'L',TRUE);
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
//////quinta linea//////
$pdf->Setx(50);
$pdf->Cell(50,5,'CASOS ESPECIALES' ,1,0,'L',TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(15,5,$ma_3 ,1,0,'C');
$pdf->Cell(15,5,$mb_3 ,1,0,'C');
$pdf->Cell(15,5,$mc_3 ,1,0,'C');
$pdf->Cell(15,5,$md_3 ,1,0,'C');
$pdf->Cell(15,5,$pa_3 ,1,0,'C');
$pdf->Cell(15,5,$pb_3 ,1,0,'C');
$pdf->Cell(15,5,$pc_3 ,1,0,'C');
$pdf->Cell(15,5,$sa_3 ,1,0,'C');
$pdf->Cell(15,5,$sb_3 ,1,0,'C');
$pdf->Cell(15,5,$ta_3 ,1,0,'C');
$pdf->Cell(15,5,$tb_3 ,1,0,'C');
$pdf->Cell(15,5,$tc_3 ,1,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,5,$total3 ,1,1,'C',TRUE);
/////sexta linea/////
$pdf->Setx(50);
$pdf->Cell(50,5,'TOTALES' ,1,0,'L', TRUE);
$pdf->Cell(15,5,$ma_2+$ma_1+$ma+$ma_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$mb_2+$mb_1+$mb+$mb_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$mc_2+$mc_1+$mc+$mc_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$md_2+$md_1+$md+$md_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$pa_2+$pa_1+$pa+$pa_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$pb_2+$pb_1+$pb+$pb_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$pc_2+$pc_1+$pc+$pc_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$sa_2+$sa_1+$sa+$sa_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$sb_2+$sb_1+$sb+$sb_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$ta_2+$ta_1+$ta+$ta_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$tb_2+$tb_1+$tb+$tb_3 ,1,0,'C', TRUE);
$pdf->Cell(15,5,$tc_2+$tc_1+$tc+$tc_3 ,1,0,'C', TRUE);
$pdf->Cell(30,5,$totaltotal ,1,1,'C', TRUE);
$pdf->Output();
?>


