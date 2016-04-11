<table>
<?php

   //echo debug($datos);
if(!empty($datos)){
$id = $datos['0']['Alumno']['id'];
$nombre =$datos['0']['Alumno']['nombre'];
$apellido = $datos['0']['Alumno']['apellido'];
$f_na = $datos['0']['Alumno']['fecha_nacimiento'];
$confirma = $datos['0']['Alumno']['confirmar'];
$fecha_de_hoy = date("Y-m-d");


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




    
   echo "</td></tr><tr><td>";
                echo $this->Form->input('Alumno.id', array('value'=>$id,'style'=>'width: 150px;', 'type'=>'hidden'));
                echo "<b>Nombre: ".$nombre."<br>";
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 150px;'));
                echo "<b>Apellido: ".$apellido."<br>";
                          
                echo "<b>Fecha de Nacimiento: ". $f_na ."<br>";
                
                echo "Documentos: ";
                switch($confirma){
                case 0:
                    echo "No han sido Registrados <br>";
                    break;
                    case 1:
                        echo "Completos<br>";
                        break;
                        case 2:
                            echo "Faltantes<br>";
                            break;
                }
                echo "<b>Edad al Dia de HOY: <font color='red'>".$años." años/ ".$meses."  Meses/ ".$dias." Dias.</font><br>";
                echo "<b>Edad en Septiembre del año en curso: <font color='green'>".$años1." años/ ".$meses1."  Meses.</font>";
                echo "</td></tr>";
                echo $this->Form->input('Alumno.fecha_ingreso', array('type'=>'hidden', 'value'=> $fecha_de_hoy));
}
else
{
    echo "Busqueda no Produjo resultados";
    echo "<script>alert('Busqueda no Produjo resultados');"
    . "document.location=('/preescolar/alumnos/inscribir');</script>";
}
                ?>
</table>