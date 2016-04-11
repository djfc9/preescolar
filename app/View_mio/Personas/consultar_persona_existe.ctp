<?php //echo debug($users); 
if(!empty($res)){
    

foreach ($res as $datos):
    $id= $datos['Persona']['id'];
    $cedula = $datos['Persona']['cedula'];
    $nombre = $datos['Persona']['nombre'];
    $apellido= $datos['Persona']['apellido'];
    $direccion= $datos['Persona']['direccion'];
    $tlf_local= $datos['Persona']['telefono_local'];
    $tlf_movil= $datos['Persona']['telefono_movil'];
    $tlf_tabajo = $datos['Persona']['telefono_trabajo'];
    $sexo= $datos['Sexo']['descripcion'];
    $ente= $datos['Persona']['entes'];
    //$parentesco= $datos['TipoPersona']['descripcion'];
    $cargo= $datos['Cargo']['nombre'];
    $representante= $datos['Persona']['representante'];
    $autorizado= $datos['Persona']['autorizado'];
    /*= $datos['Persona'][''];
    = $datos['Persona'][''];
    = $datos['Persona'][''];*/

endforeach;
    
    ?>
<table style='width :860px;' >
    <tr>
                <?php  echo $this->Form->input('Persona.id', array('value'=>$id, 'type'=>'hidden')); ?>
                <td>
                <?php echo $this->Form->input('Persona.cedula', array('value'=>$cedula,'style'=>'width: 200px;','maxlength'=>'8')); ?>
                </td>
                <td>
		<?php echo $this->Form->input('Persona.apellido', array('style'=>'width: 200px;', 'readonly'=> true, 'value'=> $apellido)); ?>
                </td><td>   
		<?php echo $this->Form->input('Persona.nombre', array('style'=>'width: 200px;', 'readonly'=> true, 'value'=> $nombre)); ?>
                </td>
           </tr>
          <tr>
                <td>
                <?php echo $this->Form->input('Persona.telefono_movil', array('style'=>'width: 200px;','maxlength'=>'12','placeholder'=>'Ejm. 0416-5555555', 'readonly'=> true, 'value'=> $tlf_movil)); ?>
                </td><td>
                <?php echo $this->Form->input('Persona.telefono_local', array('style'=>'width: 200px;','maxlength'=>'12','placeholder'=>'Ejm. 0212-5555555', 'readonly'=> true, 'value'=> $tlf_local)); ?>
                </td><td>
		<?php echo $this->Form->input('Persona.telefono_trabajo', array('style'=>'width: 200px;','maxlength'=>'12','placeholder'=>'Ejm. 0212-5555555', 'readonly'=> true, 'value'=> $tlf_tabajo)); ?>
                </td>
           </tr>
                </table>
<?php 

}

?>