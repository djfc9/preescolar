<table>
<?php

   //echo debug($datos);
if(!empty($datos)){
$id = $datos['0']['Alumno']['id'];
$nombre =$datos['0']['Alumno']['nombre'];
$apellido = $datos['0']['Alumno']['apellido'];
$f_na = $datos['0']['Alumno']['fecha_nacimiento'];
$fecha_de_hoy = date("Y-m-d");
//$f_na = "1977-02-02";

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
$mes_anterior = $hoy['mon'] ;
$dias += $dias_del_mes[$mes_anterior];
//$dias += $dias_del_mes[$hoy['mon']];
$meses--;
}
if($meses < 0)
{
$meses += 12;
$años--;
}
/*echo "años:".$años."<br>";
echo "meses:".$meses."<br>";
echo "dias:".$dias."<br>";*/
//echo $formato_edad = $años."&nbsp;Años&nbsp;-&nbsp;".$meses."&nbsp;Meses&nbsp;-&nbsp;".$dias."&nbsp;Dias";


///funcion para calcular la edad del niño en septiembre...
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


/*
function daysDifference($endDate, $beginDate){
$date_parts1=explode("-", $beginDate);
$date_parts2=explode("-", $endDate);
$start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
$end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
return $end_date - $start_date;
}
echo daysDifference('2014-9-1','2012-11-29');*/

    
   echo "</td></tr><tr><td>";
                echo $this->Form->input('Alumno.id', array('value'=>$id,'style'=>'width: 150px;', 'type'=>'hidden'));
                echo "<b>Nombre: ".$nombre."<br>";
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 150px;'));
                echo "<b>Apellido: ".$apellido."<br>";
                          
                echo "<b>Fecha de Nacimiento: ". $f_na ."<br>";
                echo "<b>Edad al Dia de HOY: <font color='red'>".$años." años/ ".$meses."  Meses/ ".$dias." Dias.</font><br>";
                echo "<b>Edad en Septiembre del año en curso: <font color='green'>".$años1." años/ ".$meses1."  Meses.</font><br>";
                echo "<b>Actualmente en: <font color='blue'>".$grado_sec_desc."</font><br>";
                echo "</td></tr>";
                echo $this->Form->input('grado_sec_desc', array('type'=>'hidden', 'value'=> $grado_sec_desc));
}
else
{
    echo "Busqueda no Produjo resultados";
    echo "<script>alert('Busqueda no Produjo resultados');"
    . "document.location=('/preescolar/alumnos/promover');</script>";
}
                ?>
</table>