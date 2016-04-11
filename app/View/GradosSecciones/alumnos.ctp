
<div class="contenido_principal">
<!--<h2><?php  ?></h2> -->
    <fieldset>
        <legend>Listado de Alumnos</legend>
<table>
    <tr>
        <th>C&eacute;dula Escolar</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tel&eacute;fono</th>
        <th>Fecha Nacimiento</th>
        <th>Edad</th>
    </tr>
<?php
     foreach ($listado['0']['Alumno'] as $datos):
     //echo debug($datos);
     $f_na = $datos['fecha_nacimiento']; //fecha de nacimeinto del niño.
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
$edad = $años." años/ ".$meses."  Meses/ ".$dias." Dias";
/////////////////////////////////////////
     
     echo "<tr><td>";
     echo $datos['cedula_escolar'];
     echo "</td><td>";
     echo $datos['nombre'];
     echo "</td><td>";
     echo $datos['apellido'];
     echo "</td><td>";
     echo $datos['telefono_habitacion'];
     echo "</td><td><center>";
     echo $datos['fecha_nacimiento'];
     echo "</center></td><td>";
     echo $edad;
     echo "</td><t/r>";
     endforeach;
 ?>

</table>
        
        </fieldset>
</div>