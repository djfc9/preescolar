<table>
<?php

  // echo debug($datos);
if(!empty($datos))
{
$id = $datos['0']['Persona']['id'];
$nombre =$datos['0']['Persona']['nombre'];
$apellido = $datos['0']['Persona']['apellido'];
$foto = $datos['0']['Persona']['foto'];
    
   echo "<tr><td>";
                echo $this->Form->input('Persona.id', array('value'=>$id,'style'=>'width: 200px;', 'type'=>'hidden'));
                echo $this->Form->input('Persona.nombre', array('value'=>$nombre,'style'=>'width: 200px;'));
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 150px;'));
                echo "</td><td>";
                echo $this->Form->input('Persona.apellido', array('value'=>$apellido,'style'=>'width: 200px;'));
                echo "</td><td>";
                if(!empty($foto))
                {
            
                echo $this->Html->image("/img/persona/foto/". $foto, array('class'=>'foto_ficha')); 
            }
            else
            {
                 echo $this->Html->image("imagen_user.jpg", array('class'=>'foto_ficha'));
                // echo "<p align='center' style='width:150px; margin-top: 0px;'>Cambie su Foto.</p>";
            } 
                echo "</td><tr>";             
}
else
{
    echo "Busqueda no produjo resultados.";
    echo "<script>alert('Busqueda no produjo resultados.'); document.location=('/preescolar/personas/asignacion');</script>";
}
?>
</table>