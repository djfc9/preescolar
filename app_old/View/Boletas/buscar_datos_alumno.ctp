<table>
<?php

  // echo debug($datos);
if(!empty($datos)){
$id = $datos['0']['Alumno']['id'];
$nombre =$datos['0']['Alumno']['nombre'];
$apellido = $datos['0']['Alumno']['apellido'];

   echo "</td></tr><tr><td>";
                echo $this->Form->input('Alumno.Alumno', array('value'=>$id,'style'=>'width: 150px;', 'type'=>'hidden'));
                echo "<b>Nombre: ".$nombre."<br>";
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 150px;'));
                echo "<b>Apellido: ".$apellido."<br>";
                echo "</td></tr>";
                //echo $this->Form->input('Alumno.fecha_ingreso', array('type'=>'hidden', 'value'=> $fecha_de_hoy));
}
else
{
    echo "Busqueda no Produjo resultados";
    echo "<script>alert('Busqueda no Produjo resultados');"
    . "document.location=('/preescolar/boletas/add');</script>";
}
                ?>
</table>