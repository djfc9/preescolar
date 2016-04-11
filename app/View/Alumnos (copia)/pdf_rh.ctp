
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
        $pdf->Setx(9);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'Nro' ,1,0,'L',true);   
        $pdf->Cell(25,6,strtoupper(utf8_decode('C.Escolar')) ,1,0,'L', true);   
        $pdf->Cell(60,6,strtoupper('A. Nomdre y Apellido') ,1,0,'C',true);   
        $pdf->Cell(60,6,strtoupper('R. Nomdre y Apellido') ,1,0,'C',true);   
        $pdf->Cell(20,6,strtoupper('Parent') ,1,0,'C', true);
        $pdf->Cell(15,6,strtoupper('Ente') ,1,0,'C', true); 
        $pdf->Cell(70,6,strtoupper('Correo') ,1,0,'C', true); 
        $pdf->SetFont('Times','',8);
		$pdf->Ln(6);
        $pdf->SetFillColor(165,239,244);
        $i = 1;
        //ind     mpppjd      atletas     casos especial   otros casos especiales
        $ma= 0;   $ma_1= 0;   $ma_2= 0;   $ma_3= 0;        $ma_4= 0;
        $mb= 0;   $mb_1= 0;   $mb_2= 0;   $mb_3= 0;        $mb_4= 0;
        $mc= 0;   $mc_1= 0;   $mc_2= 0;   $mc_3= 0;        $mc_4= 0;
        $md= 0;   $md_1= 0;   $md_2= 0;   $md_3= 0;        $md_4= 0;
        $pa= 0;   $pa_1= 0;   $pa_2= 0;   $pa_3= 0;        $pa_4= 0;
        $pb= 0;   $pb_1= 0;   $pb_2= 0;   $pb_3= 0;        $pb_4= 0;
        $pc= 0;   $pc_1= 0;   $pc_2= 0;   $pc_3= 0;        $pc_4= 0;
        $sa= 0;   $sa_1= 0;   $sa_2= 0;   $sa_3= 0;        $sa_4= 0;
        $sb= 0;   $sb_1= 0;   $sb_2= 0;   $sb_3= 0;        $sb_4= 0;
        $sc= 0;   $sc_1= 0;   $sc_2= 0;   $sc_3= 0;        $sc_4= 0;
        $ta= 0;   $ta_1= 0;   $ta_2= 0;   $ta_3= 0;        $ta_4= 0;
        $tb= 0;   $tb_1= 0;   $tb_2= 0;   $tb_3= 0;        $tb_4= 0;
        //$tc= 0;   $tc_1= 0;   $tc_2= 0;   $tc_3= 0;      $tc_4= 0;
        $total = 0;
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        $total4 = 0;
        $totaltotal = 0;
        
        
        
        //-----------------------------------------------------------------------------------------///
$ma_i= 0; $ma_m= 0;  $ma_o= 0;
$mb_i= 0; $mb_m= 0;  $mb_o= 0;
$mc_i= 0; $mc_m= 0;  $mc_o= 0;
$md_i= 0; $md_m= 0;  $md_o= 0;
$pa_i= 0; $pa_m= 0;  $pa_o= 0;
$pb_i= 0; $pb_m= 0;  $pb_o= 0;
$pc_i= 0; $pc_m= 0;  $pc_o= 0;
$sa_i= 0; $sa_m= 0;  $sa_o= 0;
$sb_i= 0; $sb_m= 0;  $sb_o= 0;
$sc_i= 0; $sc_m= 0;  $sc_o= 0;
$ta_i= 0; $ta_m= 0;  $ta_o= 0;
$tb_i= 0; $tb_m= 0;  $tb_o= 0;
        
        
    foreach ($alumnos as $datos):
        //debug($datos);
        
        ///funcion para calcular la edad del niño en septiemdre...
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
            //echo $datos['0']['grado_id'];
               
             $pdf->Setx(9);
             $pdf->Cell(10,5,$i ,1,0,'C');
             $pdf->Cell(25,5,strtoupper($datos['0']['cedula_escolar']) ,1,0,'L');
             $pdf->Cell(60,5,utf8_decode(strtoupper($datos['0']['aalumno']." ".$datos['0']['nalumno'])) ,1,0,'L');
	     //$pdf->Cell(27,5,utf8_decode(strtoupper($datos['0']['grado'])) ,1,0,'L');
             //$pdf->Cell(18,5,$años1.'A -'.$meses1.'M' ,1,0,'L');
             $pdf->Cell(60,5,utf8_decode(strtoupper($datos['0']['nrepresentante']." ".$datos['0']['arepresentante'])) ,1,0,'L');
	     $pdf->Cell(20,5,utf8_decode(strtoupper($datos['0']['parentesco'])) ,1,0,'C');
             
             
		$estatus = $datos['0']['estatu_id'];  //2 = inscrito
		$ente = $datos['0']['entes'] ;
                $cargo = $datos['0']['cargo_id'] ; //5 = atletas, 8= casos especiales,
                $caso_especial = $datos['0']['caso_especial']; //niños inscritos como casos especiales

                          switch ($datos['0']['grado']){ 
              case 'MATERNAL-A':
                  if($ente == 0 && $cargo == 5 
                          || $ente == 'IND' && $cargo == 5  
                          || $ente == 'MDP' && $cargo == 5 ) {$ma_2 = $ma_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$ma_1 = $ma_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$ma = $ma+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$ma_4 = $ma_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$ma_4 = $ma_4+1;} //Ex atletas
                  
                 //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $ma_i = $ma_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $ma_m = $ma_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $ma_o = $ma_o+1;
                  }
                  break;
                  
              case 'MATERNAL-B':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$mb_2 = $mb_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$mb_1 = $mb_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$mb = $mb+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$mb_4 = $mb_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$mb_4 = $mb_4+1;} //Ex atletas
                  
                  //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $mb_i = $mb_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $mb_m = $mb_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $mb_o = $mb_o+1;
                  }
                  
                  break;
              
                  
              case 'MATERNAL-C':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$mc_2 = $mc_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$mc_1 = $mc_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$mc = $mc+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$mc_4 = $mc_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$mc_4 = $mc_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $mc_i = $mc_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $mc_m = $mc_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $mc_o = $mc_o+1;
                  }
                  break;
                  
              case 'MATERNAL-D':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$md_2 = $md_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$md_1 = $md_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$md = $md+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$md_4 = $md_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$md_4 = $md_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $md_i = $md_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $md_m = $md_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $md_o = $md_o+1;
                  }
                  break;
                  
              case 'GRUPO 1-A':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$pa_2 = $pa_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$pa_1 = $pa_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$pa = $pa+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$pa_4 = $pa_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$pa_4 = $pa_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $pa_i = $pa_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $pa_m = $pa_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $pa_o = $pa_o+1;
                  }
                  break;
                  
              case 'GRUPO 1-B':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$pb_2 = $pb_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$pb_1 = $pb_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$pb = $pb+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$pb_4 = $pb_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$pb_4 = $pb_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $pb_i = $pb_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $pb_m = $pb_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $pb_o = $pb_o+1;
                  }
                  break;
                  
                  
              case 'GRUPO 1-C':
                  if($ente == 0 && $cargo == 5  
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5 ) {$pc_2 = $pc_2+1;} //atletas
                  elseif($ente == 'MDP'  && $cargo != 5)    {$pc_1 = $pc_1+1;}//mpppjd
                  elseif($ente == 'IND'  && $cargo != 5 )    {$pc = $pc+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$pc_4 = $pc_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$pc_4 = $pc_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $pc_i = $pc_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $pc_m = $pc_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $pc_o = $pc_o+1;
                  }
                  break;
                  
              case 'GRUPO 2-A':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$sa_2 = $sa_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$sa_1 = $sa_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$sa = $sa+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$sa_4 = $sa_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$sa_4 = $sa_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $sa_i = $sa_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $sa_m = $sa_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $sa_o = $sa_o+1;
                  }
                  break;
                  
              case 'GRUPO 2-B':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$sb_2 = $sb_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$sb_1 = $sb_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$sb = $sb+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$sb_4 = $sb_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$sb_4 = $sb_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $sb_i = $sb_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $sb_m = $sb_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $sb_o = $sb_o+1;
                  }
                  break;
              
              case 'GRUPO 2-C':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$sc_2 = $sc_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$sc_1 = $sc_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$sc = $sc+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$sc_4 = $sc_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$sc_4 = $sc_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $sc_i = $sc_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $sc_m = $sc_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $sc_o = $sc_o+1;
                  }
                  break;
                
                  
              case 'GRUPO 3-A':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$ta_2 = $ta_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$ta_1 = $ta_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$ta = $ta+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$ta_4 = $ta_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$ta_4 = $ta_4+1;} //Ex atletas
                  
                   //----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $ta_i = $ta_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $ta_m = $ta_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $ta_o = $ta_o+1;
                  }
                  break;
                  
             case 'GRUPO 3-B':
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$tb_2 = $tb_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$tb_1 = $tb_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$tb = $tb+1;}///ind
                  elseif($ente == 'OTRO' && $cargo == 8){$tb_4 = $tb_4+1;} //otros casos especiales de federaciones y otros
                  elseif($ente == 0 && $cargo == 8){$tb_4 = $tb_4+1;} //Ex atletas
                  
                ////----------------casos especiales------------------////
                  if($caso_especial == true && $ente =='IND'){
                      $tb_i = $tb_i+1;
                  }
                  elseif($caso_especial == true && $ente =='MDP'){
                      $tb_m = $tb_m+1;
                  }
                  elseif($caso_especial == true && $ente =='OTRO' ||
                          $caso_especial == true && $ente == 0 && $cargo == 8 ||
                          $caso_especial == true && $ente == 0){
                      $tb_o = $tb_o+1;
                  }
                  break;
                  
              /*case 'GRUPO 3-C':
                 if($caso_especial == true ){
                      $tc_3 = $tc_3+1;
                  } ///casos especiales       
                  if($ente == 0 && $cargo == 5   
                          || $ente == 'IND' && $cargo == 5   
                          || $ente == 'MDP' && $cargo == 5  ) {$tc_2 = $tc_2+1;} //atletas
                  elseif($ente == 'MDP'   && $cargo != 5)    {$tc_1 = $tc_1+1;}//mpppjd
                  elseif($ente == 'IND'   && $cargo != 5 )    {$tc = $tc+1;}///ind
                  break;*/
                          
             }
                            $total = $ma +$md +$mc +$md +$pa +$pb +$pc +$sa +$sb+$sc+$ta +$tb /*+$tc*/; 
                            $total1 = $ma_1 +$md_1 +$mc_1 +$md_1 +$pa_1 +$pb_1 +$pc_1 +$sa_1 +$sb_1+ $sc_1 +$ta_1 +$tb_1 /*+$tc_1*/;
                            $total2 = $ma_2 +$md_2 +$mc_2 +$md_2 +$pa_2 +$pb_2 +$pc_2 +$sa_2 +$sb_2+ $sc_2 +$ta_2 +$tb_2 /*+$tc_2*/;
                            $total4 = $ma_4 +$md_4 +$mc_4 +$md_4 +$pa_4 +$pb_4 +$pc_4 +$sa_4 +$sb_4+ $sc_4 +$ta_4 +$tb_4 /*+$tc_4*/;
                            $totaltotal = $total+$total1+$total2+$total4;
                          
                            if ($datos['0']['entes'] == '0' ) { 
                              $ente = "N/A" ;
                            }elseif($datos['0']['entes'] == 'MDP'){
                                $ente = "MPPPJD" ;
                            }
			  
			   $pdf->Cell(15,5,utf8_decode(strtoupper($ente)) ,1,0,'C');
                           $pdf->Cell(70,5,strtoupper($datos['0']['correo']) ,1,0,'L');
			 $pdf->Ln();
       $i++;    // $pdf->Cell(35,5,  utf8_decode(strtoupper($edad)) ,1,1,'L');
endforeach; 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////agregar una nueva pagina de las estadisticas/////



$pdf->AddPage('L','Letter');
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->Image("./img/logos/bolivar_nino.png",16,15,20);
$pdf->Image("./img/logos/republica.png",205,15,60);
$pdf->Ln(2);
$pdf->SetFont('Arial','U',16);
$pdf->Cell(270,5,'CENTRO DE EDUCACION INICIAL',0,1,'C');
$pdf->Ln(2);
$pdf->Cell(270,5,utf8_decode('"BOLIVAR NIÑO"'),0,1,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(270,5,'BASE DE DATOS '.$ano_escolar,0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln(2);
$pdf->Cell(270,4, utf8_decode('(Alumnos, Representantes, Ubicabión y Parentesco)'),0,1,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
////linea del encabezado de la tabla///
$pdf->Setx(30);
$pdf->Cell(55,5,'DESCRIP/SECCION' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'MA' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'MB' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'MC' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'MD' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'1A' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'1B' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'1C' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'2A' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'2B' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'2C' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'3A' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'3B' ,1,0,'C', TRUE);
//$pdf->Cell(10,5,'3C' ,1,0,'C', TRUE);
$pdf->Cell(40,5,'TOTALES' ,1,1,'C', TRUE);
//////SEGUNDA LINEA//////
$pdf->Setx(30);
$pdf->Cell(55,5,'IND' ,1,0,'L', TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,5,$ma ,1,0,'C');
$pdf->Cell(10,5,$md ,1,0,'C');
$pdf->Cell(10,5,$mc ,1,0,'C');
$pdf->Cell(10,5,$md ,1,0,'C');
$pdf->Cell(10,5,$pa ,1,0,'C');
$pdf->Cell(10,5,$pb ,1,0,'C');
$pdf->Cell(10,5,$pc ,1,0,'C');
$pdf->Cell(10,5,$sa ,1,0,'C');
$pdf->Cell(10,5,$sb ,1,0,'C');
$pdf->Cell(10,5,$sc ,1,0,'C');
$pdf->Cell(10,5,$ta ,1,0,'C');
$pdf->Cell(10,5,$tb ,1,0,'C');
//$pdf->Cell(10,5,$tc ,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$total ,1,1,'C', TRUE);
//////tercera linea//////
$pdf->Setx(30);
$pdf->Cell(55,5,'MPPPJD' ,1,0,'L', TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,5,$ma_1 ,1,0,'C');
$pdf->Cell(10,5,$md_1 ,1,0,'C');
$pdf->Cell(10,5,$mc_1 ,1,0,'C');
$pdf->Cell(10,5,$md_1 ,1,0,'C');
$pdf->Cell(10,5,$pa_1 ,1,0,'C');
$pdf->Cell(10,5,$pb_1 ,1,0,'C');
$pdf->Cell(10,5,$pc_1 ,1,0,'C');
$pdf->Cell(10,5,$sa_1 ,1,0,'C');
$pdf->Cell(10,5,$sb_1 ,1,0,'C');
$pdf->Cell(10,5,$sc_1 ,1,0,'C');
$pdf->Cell(10,5,$ta_1 ,1,0,'C');
$pdf->Cell(10,5,$tb_1 ,1,0,'C');
//$pdf->Cell(10,5,$tc_1 ,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$total1 ,1,1,'C',TRUE);
///////cuarta linea //////
$pdf->Setx(30);
$pdf->Cell(55,5,'ATLETAS' ,1,0,'L',TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,5,$ma_2 ,1,0,'C');
$pdf->Cell(10,5,$md_2 ,1,0,'C');
$pdf->Cell(10,5,$mc_2 ,1,0,'C');
$pdf->Cell(10,5,$md_2 ,1,0,'C');
$pdf->Cell(10,5,$pa_2 ,1,0,'C');
$pdf->Cell(10,5,$pb_2 ,1,0,'C');
$pdf->Cell(10,5,$pc_2 ,1,0,'C');
$pdf->Cell(10,5,$sa_2 ,1,0,'C');
$pdf->Cell(10,5,$sb_2 ,1,0,'C');
$pdf->Cell(10,5,$sc_2 ,1,0,'C');
$pdf->Cell(10,5,$ta_2 ,1,0,'C');
$pdf->Cell(10,5,$tb_2 ,1,0,'C');
//$pdf->Cell(10,5,$tc_2 ,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$total2 ,1,1,'C',TRUE);
//////quinta linea//////

$pdf->Setx(30);
$pdf->Cell(55,5,'OTROS' ,1,0,'L',TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,5,$ma_4 ,1,0,'C');
$pdf->Cell(10,5,$md_4 ,1,0,'C');
$pdf->Cell(10,5,$mc_4 ,1,0,'C');
$pdf->Cell(10,5,$md_4 ,1,0,'C');
$pdf->Cell(10,5,$pa_4 ,1,0,'C');
$pdf->Cell(10,5,$pb_4 ,1,0,'C');
$pdf->Cell(10,5,$pc_4 ,1,0,'C');
$pdf->Cell(10,5,$sa_4 ,1,0,'C');
$pdf->Cell(10,5,$sb_4 ,1,0,'C');
$pdf->Cell(10,5,$sc_4 ,1,0,'C');
$pdf->Cell(10,5,$ta_4 ,1,0,'C');
$pdf->Cell(10,5,$tb_4 ,1,0,'C');
//$pdf->Cell(10,5,$tc_2 ,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$total4 ,1,1,'C',TRUE);
/////sexta linea/////
$pdf->Setx(30);
$pdf->Cell(55,5,'TOTALES' ,1,0,'L', TRUE);
$pdf->Cell(10,5,$ma_2+$ma_1+$ma+$ma_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$md_2+$md_1+$md+$md_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$mc_2+$mc_1+$mc+$mc_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$md_2+$md_1+$md+$md_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$pa_2+$pa_1+$pa+$pa_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$pb_2+$pb_1+$pb+$pb_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$pc_2+$pc_1+$pc+$pc_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$sa_2+$sa_1+$sa+$sa_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$sb_2+$sb_1+$sb+$sb_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$sc_2+$sc_1+$sc+$sc_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$ta_2+$ta_1+$ta+$ta_4,1,0,'C', TRUE);
$pdf->Cell(10,5,$tb_2+$tb_1+$tb+$tb_4,1,0,'C', TRUE);
//$pdf->Cell(10,5,$tc_2+$tc_1+$tc ,1,0,'C', TRUE);
$pdf->Cell(40,5,$totaltotal ,1,1,'C', TRUE);



///----------------------------------------------------------------------------------------------------------------------------------//


//////////renglon de casos especiales///////////////////////////////////

///////nuevo renglon////////////////////
$pdf->SetFillColor(165,239,244);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(270,5,'CASOS ESPECIALES',0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Ln(2);
$pdf->Cell(270,4, utf8_decode('(NOTA: Todos los casos especiales ya estan contabilizados en la tabla anterior.)'),0,1,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->Setx(30);
$pdf->Cell(55,5,'DESCRIP/SECCION' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'MA' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'MB' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'MC' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'MD' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'1A' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'1B' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'1C' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'2A' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'2B' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'2C' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'3A' ,1,0,'C', TRUE);
$pdf->Cell(10,5,'3B' ,1,0,'C', TRUE);
//$pdf->Cell(10,5,'3C' ,1,0,'C', TRUE);
$pdf->Cell(40,5,'TOTALES' ,1,1,'C', TRUE);


         
                 $total_i = $ma_i +$mb_i +$mc_i +$md_i +$pa_i +$pb_i +$pc_i +$sa_i +$sb_i+ $sc_i +$ta_i +$tb_i /*+$tc_i*/;
                 $total_m = $ma_m +$mb_m +$mc_m +$md_m +$pa_m +$pb_m +$pc_m +$sa_m +$sb_m+ $sc_m +$ta_m +$tb_m /*+$tc_m*/;
                 $total_o = $ma_o +$mb_o +$mc_o +$md_o +$pa_o +$pb_o +$pc_o +$sa_o +$sb_o+ $sc_o +$ta_o +$tb_o /*+$tc_o*/;
                 $total_t = $total_i + $total_m + $total_o;



$pdf->Setx(30);
$pdf->Cell(55,5,'IND' ,1,0,'L',TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,5,$ma_i ,1,0,'C');
$pdf->Cell(10,5,$mb_i ,1,0,'C');
$pdf->Cell(10,5,$mc_i ,1,0,'C');
$pdf->Cell(10,5,$md_i ,1,0,'C');
$pdf->Cell(10,5,$pa_i ,1,0,'C');
$pdf->Cell(10,5,$pb_i ,1,0,'C');
$pdf->Cell(10,5,$pc_i ,1,0,'C');
$pdf->Cell(10,5,$sa_i ,1,0,'C');
$pdf->Cell(10,5,$sb_i ,1,0,'C');
$pdf->Cell(10,5,$sc_i ,1,0,'C');
$pdf->Cell(10,5,$ta_i ,1,0,'C');
$pdf->Cell(10,5,$tb_i ,1,0,'C');
//$pdf->Cell(10,5,$tc_3 ,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$total_i ,1,1,'C',TRUE);

$pdf->Setx(30);
$pdf->Cell(55,5,'MPPPJD' ,1,0,'L', TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,5,$ma_m ,1,0,'C');
$pdf->Cell(10,5,$mb_m ,1,0,'C');
$pdf->Cell(10,5,$mc_m ,1,0,'C');
$pdf->Cell(10,5,$md_m ,1,0,'C');
$pdf->Cell(10,5,$pa_m ,1,0,'C');
$pdf->Cell(10,5,$pb_m ,1,0,'C');
$pdf->Cell(10,5,$pc_m ,1,0,'C');
$pdf->Cell(10,5,$sa_m ,1,0,'C');
$pdf->Cell(10,5,$sb_m ,1,0,'C');
$pdf->Cell(10,5,$sc_m ,1,0,'C');
$pdf->Cell(10,5,$ta_m ,1,0,'C');
$pdf->Cell(10,5,$tb_m ,1,0,'C');
//$pdf->Cell(10,5,$tc_3 ,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$total_m ,1,1,'C',TRUE);

$pdf->Setx(30);
$pdf->Cell(55,5,'OTROS' ,1,0,'L', TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,5,$ma_o ,1,0,'C');
$pdf->Cell(10,5,$mb_o ,1,0,'C');
$pdf->Cell(10,5,$mc_o ,1,0,'C');
$pdf->Cell(10,5,$md_o ,1,0,'C');
$pdf->Cell(10,5,$pa_o ,1,0,'C');
$pdf->Cell(10,5,$pb_o ,1,0,'C');
$pdf->Cell(10,5,$pc_o ,1,0,'C');
$pdf->Cell(10,5,$sa_o ,1,0,'C');
$pdf->Cell(10,5,$sb_o ,1,0,'C');
$pdf->Cell(10,5,$sc_o ,1,0,'C');
$pdf->Cell(10,5,$ta_o ,1,0,'C');
$pdf->Cell(10,5,$tb_o ,1,0,'C');
//$pdf->Cell(10,5,$tc_3 ,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$total_o ,1,1,'C',TRUE);

$pdf->Setx(30);
$pdf->Cell(55,5,'TOTALES' ,1,0,'L', TRUE);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,5,$ma_i+$ma_m+$ma_o ,1,0,'C');
$pdf->Cell(10,5,$mb_i+$mb_m+$mb_o ,1,0,'C');
$pdf->Cell(10,5,$mc_i+$mc_m+$mc_o ,1,0,'C');
$pdf->Cell(10,5,$md_i+$md_m+$md_o ,1,0,'C');
$pdf->Cell(10,5,$pa_i+$pa_m+$pa_o ,1,0,'C');
$pdf->Cell(10,5,$pb_i+$pb_m+$pb_o ,1,0,'C');
$pdf->Cell(10,5,$pc_i+$pc_m+$pc_o ,1,0,'C');
$pdf->Cell(10,5,$sa_i+$sa_m+$sa_o ,1,0,'C');
$pdf->Cell(10,5,$sb_i+$sb_m+$sb_o ,1,0,'C');
$pdf->Cell(10,5,$sc_i+$sc_m+$sc_o ,1,0,'C');
$pdf->Cell(10,5,$ta_i+$ta_m+$ta_o ,1,0,'C');
$pdf->Cell(10,5,$tb_i+$tb_m+$tb_o ,1,0,'C');
//$pdf->Cell(10,5,$tc_3 ,1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$total_t ,1,1,'C',TRUE);

$pdf->Output();
?>


