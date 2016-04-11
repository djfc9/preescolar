<?php //echo debug($res); 
$se= $this->Session->read('Auth.User');
                $sesion_abierta = $se['id'];
if(!empty($res)){

    echo "<script>"
                    . "var confirmar = confim('Esta persona existe, desea autorizarla a retirar a su(s) hij@ (s)?');"
                    ."if(confirmar == true){"
                    . "document.location=('/preescolar/personas/edit_autorizados_existente/$cedula'); }else{"
            . "document.location=('/preescolar/personas/add1/$cedula'); }"
                    . "</script>";
    
    //echo "<script>document.location=('preescolar/personas/edit_autorizados_existente/$cedula');</script>";
    //return $this->redirect(array('action'=>'edit_autorizados_existente', $cedula, $alumnos));
/*foreach ($res as $datos):
    $id= $datos['Persona']['id'];
    $cedula = $datos['Persona']['cedula'];
    $nombre = $datos['Persona']['nombre'];
    $apellido= $datos['Persona']['apellido'];
    $direccion= $datos['Persona']['direccion'];
    $tlf_local= $datos['Persona']['telefono_local'];
    $tlf_movil= $datos['Persona']['telefono_movil'];
    $tlf_tabajo = $datos['Persona']['telefono_trabajo'];
    $sexo= $datos['Persona']['sexo_id'];
    $ente= $datos['Persona']['entes'];
    //$parentesco= $datos['TipoPersona']['0']['descripcion'];
    $cargo= $datos['Persona']['cargo_id'];
    $representante= $datos['Persona']['representante'];
    $autorizado= $datos['Persona']['autorizado'];
    $edo= $datos['Persona']['estado_id'];
    $mun= $datos['Persona']['municipio_id'];
    $parroquia= $datos['Persona']['parroquia_id'];
    $sex= $datos['Persona']['sexo_id'];
    $direccion= $datos['Persona']['direccion'];
endforeach;*/
}
else
{
    echo "<script>"
            . "document.location=('/preescolar/personas/add1/$sesion_abierta'); "
                    . "</script>";
}
//echo $this->Form->input('Persona.id', array('style'=>'width: 200px; ','maxlength'=>'8', 'value'=>$id)); 
?>
 <!--<table style='width :880px;' >
            <tr>
                <td>
                <?php //echo $this->Form->input('cedula', array('style'=>'width: 200px; ','maxlength'=>'8', 'value'=>$cedula)); ?>

                </td><td>
		<?php //echo $this->Form->input('apellido', array('style'=>'width: 200px; ', 'value'=>$apellido)); ?>
                </td><td>   
		<?php //echo $this->Form->input('nombre', array('style'=>'width: 200px; ', 'value'=>$nombre)); ?>
                </td>
           </tr>
          <tr>
                <td>
                <?php // echo $this->Form->input('telefono_movil', array('style'=>'width: 200px;','type'=>'tel', 'maxlength'=>'12','placeholder'=>'Ejm. 0416-5555555', 'value'=>$tlf_movil)); ?>
                </td><td>
                <?php //echo $this->Form->input('telefono_local', array('style'=>'width: 200px;','type'=>'tel','maxlength'=>'12','placeholder'=>'Ejm. 0212-5555555', 'value'=>$tlf_local)); ?>
                </td><td>
		<?php //echo $this->Form->input('telefono_trabajo', array('style'=>'width: 200px;','type'=>'tel','maxlength'=>'12','placeholder'=>'Ejm. 0212-5555555', 'value'=>$tlf_tabajo)); ?>
                </td>
           </tr>
           <tr>
                <td>
                <div  style="float: left">
		<?php //echo $this->Form->input('estado_id', array('style'=>'width: 200px;', 'value'=>$edo)); ?>
                </div>
                </td><td>
                    <div id='imgcargas' style="float: left">
                <?php //echo $this->Form->input('municipio_id', array('style'=>'width: 200px;', 'options'=>array('Selected'=>'Seleccione', 'value'=>$mun))); ?>
                </div>
                </td><td>
                <div id='imgcargando' style="float: left">
                <?php //echo $this->Form->input('parroquia_id', array('style'=>'width: 200px;', 'options'=>array('Selected'=>'Seleccione', 'value'=>$parroquia))); ?>
                </div>
                </td>
           </tr>
           <tr>
                <td>
                <?php //echo $this->Form->input('direccion', array('style'=>'width: 250px;','placeholder'=>'Ejm. Urb. Pedro Perez, Casa 5', 'value'=>$direccion)); ?>
                </td><td style='vertical-align: super;'>
		<?php //echo $this->Form->input('sexo_id', array('style'=>'width: 200px;', 'value'=>$sex)); ?>
                </td><td style='vertical-align: super;'>
                    <div id='' style='font-size:10px; padding: 0;' color='FF0021;'><p size='2' style="color:#FF0000;">Si es trabajador del<br> IND-MIN seleccione esta <br>opci&oacute;n</p></div>
                <?php //echo $this->Form->input('Trabaja', array('type'=>'checkbox','label'=> false,'style'=>'width: 200px; padding-top: 0;')); ?>
                <div id='trabajador' style='display: none;'>
		<?php //echo $this->Form->input('ente', array('style'=>'width: 200px; padding: 0;','options'=>array('MDP'=>'MinDeporte','IND'=>'IND'), 'empty'=>'Seleccione', 'label'=>'Entes' , 'value'=>$ente)); ?>
                </div>
                </td>
           </tr>
           <tr>
               <td style='vertical-align: super;' colspan="3">
                <?php //echo $this->Form->input('cargo_id', array('style'=>'width: 200px;', 'value'=>$cargo)); ?>
                </td></tr>
                    </table>
                    </div>
                <table style='width :880px;'>
                    <tr><td colspan="3"><p style="color: #2c6877; text-align: center; font-size: 20px;">Adicionales:</p></td></tr>
                    <tr>
                </td><td style='vertical-align: super;'>   
		<?php //echo $this->Form->input('TipoPersona', array('style'=>'width: 200px;','type'=>'select', 'empty'=>'Seleccione', 'label'=>'Parentesco','required')); ?>
                </td><td border='1' class='flotados2'>
                    <!--<label>Niños a Retirar</label>-->
                    <!--
                <?php ///echo $this->Form->input('Alumno', array('label'=>'Niños a Retirar','multiple'=>'checkbox', 'options'=>$alumnos,'selected'=>array_keys($alumnos),'hiddenField' => false, 'checked'=> true, 'required'=>'required', 'readonly'=>true)); ?>
                </td>
                <td>
                    <p style='font-size:13px; margin-left: 10px; font-weight: bold; vertical-align: super;'><font color='red'>*</font> Campos obligatorios</p>
                </td>
           </tr>
		<?php //echo $this->Form->input('autorizado',  array('value' =>'SI','type'=>'hidden')); ?>
        </table>-->
