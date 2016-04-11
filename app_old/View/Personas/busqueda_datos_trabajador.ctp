<table>
<?php

   //echo debug($datos);
if(!empty($datos))
{
$id = $datos['0']['Persona']['id'];
$nombre =$datos['0']['Persona']['nombre'];
$apellido = $datos['0']['Persona']['apellido'];
$user_id = $datos['0']['User']['id'];
$trabaja = $datos['0']['User']['trabaja_preescolar'];
    
   echo "<tr><td><div style='float: left'>";
                echo $this->Form->input('Persona.id', array('value'=>$id,'style'=>'width: 200px;', 'type'=>'hidden'));
                echo $this->Form->input('Persona.nombre', array('value'=>$nombre,'style'=>'width: 200px;'));
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 150px;'));
                echo "</div></td><td><div style='float: left'>";
                echo $this->Form->input('Persona.apellido', array('value'=>$apellido,'style'=>'width: 200px;'));
                echo "</div></td><td><b>";
                echo $this->Form->input('User.id', array('value'=>$user_id,'style'=>'width: 200px;'));
                echo $this->Form->input('User.trabaja_preescolar', array('value'=>$trabaja,'style'=>'width: 200px;'));
                echo "</b></td><tr>";
                
}
else
{
    echo "Busqueda no produjo resultados.";
    echo "<script>alert('Busqueda no produjo resultados.'); document.location=('/preescolar/personas/trabajador_preescolar');</script>";
}
?>
</table>