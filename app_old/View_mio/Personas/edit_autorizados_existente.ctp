<?php //debug($persona); ?>
<div class='contenido_principal'>
<?php echo $this->Form->create('Persona', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar datos Personales'); ?></legend>

                 <table style='width :880px;' >
                     <tr><td>
		<?php echo $this->Form->input('nombre', array('style'=>'width: 130px;', 'readonly'=>true));?>
                </td><td>
                <?php echo $this->Form->input('apellido', array('style'=>'width: 130px;', 'readonly'=>true)); ?>
                </td><td>
               <?php  echo $this->Form->input('cedula', array('style'=>'width: 130px;', 'disabled'=>true));?>
                </td><td width='35' rowspan='3'>
             <div class="flotando1">
                 
               <?php   if(!empty($persona['Persona']['foto']))
                {
            
                echo $this->Html->image("/img/persona/foto/". $persona['Persona']['foto'], array('class'=>'foto_ficha')); 
            }
            else
            {
                 echo $this->Html->image("imagen_user.jpg", array('class'=>'foto_ficha'));
                // echo "<p align='center' style='width:150px; margin-top: 0px;'>Cambie su Foto.</p>";
            }?> 
             </div>
                     </tr><tr>
                     <td>
                 <?php echo$this->Form->input('telefono_movil', array('style'=>'width: 130px;', 'readonly'=>true, 'maxlengt'=>'11')); ?>
                </td><td>
                <?php echo $this->Form->input('telefono_local', array('style'=>'width: 130px;', 'readonly'=>true, 'maxlengt'=>'11')); ?>
                </td><td>
                <?php echo $this->Form->input('telefono_trabajo', array('style'=>'width: 130px;', 'readonly'=>true, 'maxlengt'=>'11')); ?>
                </td></tr>
                     <tr>
                         <td style='vertical-align: super;'>
		<?php echo $this->Form->input('sexo_id', array('readonly'=>true)); ?>
                </td><td style='vertical-align: super;'>
		<?php echo $this->Form->input('TipoPersona', array('type'=>'select', 'disabled'=>true,'label'=>'Parentesco')); ?>
                </td><td colspan='4'>
		<?php echo $this->Form->input('direccion', array('style'=>'width: 385px;', 'readonly'=>true)); ?>
		</td></tr>
                     <tr><td><div>
		<?php echo $this->Form->input('estado_id', array('style'=>'width: 130px;', 'readonly'=>true)); ?>
                             </div>
                </td><td>
		<div id='imgcargas' style='float:left;'>
		<?php echo $this->Form->input('municipio_id', array('style'=>'width: 130px;', 'readonly'=>true, 'empty'=>'Seleccione')); ?>
                </div>
                </td><td>
                <div id='imgcargando' style='float:left;'>
		<?php echo $this->Form->input('Persona.parroquia_id', array('style'=>'width: 130px;', 'readonly'=>true, 'empty'=>'Seleccione')); ?>
                </div>
                </td><td><div>
                <?php echo$this->Form->input('autorizado', array('style'=>'width: 130px;', 'readonly'=>true,'options'=>array('0'=>'Seleccione', 'Si'=>'Si', 'No'=>'No'))); ?>
                </div></td></tr><tr><td colspan='2'>
		<?php echo $this->Form->input('id', array('style'=>'width: 130px;')); ?>
                <?php
                echo $this->Form->input('foto', array('type'=>'file', 'disabled'=>true, 'label'=>'Foto (Tipo Carnet)', 'style'=>'width: 300px;'));
                echo "<label style='font-size: 13px; color: firebrick; font-weight: bold;'>FORMATOS: jpg, png o jpeg</label>";
		//echo $this->Form->input('foto', array('type'=>'file', 'style'=>'width: 300px;')); ?>
                <?php echo $this->Form->input('representante', array('style'=>'width: 130px;', 'type'=>'hidden','value'=>'Si')); ?>
                </td><td>
                    <?php echo $this->Form->input('entes',  array('style'=>'width: 130px;', 'readonly'=>true,'options'=>array('0'=>'No Aplica','MDP'=>'MinDeporte','IND'=>'IND'))); ?>
                </td>
                <td>
                <?php echo $this->Form->input('cargo_id', array('style'=>'width: 130px;', 'readonly'=>true)); ?>
                </td>
                </tr>
                </table>
                <table style='width :880px;'>
                    <tr><td colspan="3"><p style="color: #2c6877; text-align: center; font-size: 20px;">Adicionales:</p></td></tr>
                    <tr>
                </td><td style='vertical-align: super;'>   
		<?php echo $this->Form->input('TipoPersona', array('style'=>'width: 200px;','type'=>'select', 'empty'=>'Seleccione', 'label'=>'Parentesco','required')); ?>
                </td><td border='1' class='flotados2'>
                    <!--<label>Niños a Retirar</label>-->
                    
                <?php echo $this->Form->input('Alumno', array('label'=>'Niños a Retirar','multiple'=>'checkbox', 'options'=>$alumnos,'selected'=>array_keys($alumnos),'hiddenField' => false, 'checked'=> true, 'required'=>'required', 'readonly'=>true)); ?>
                </td>
                <td>
                    <p style='font-size:13px; margin-left: 10px; font-weight: bold; vertical-align: super;'><font color='red'>*</font> Campos obligatorios</p>
                </td>
           </tr>
        </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>


