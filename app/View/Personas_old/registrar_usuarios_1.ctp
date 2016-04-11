
<div class="contenido_principal">
<?php  echo $this->Form->create('Persona', array('type'=>'file')); ?> 
	<fieldset>
		<legend><?php echo __('Registro Personal'); ?></legend>
                <div id="r_cedula_u" style="display: none;">
                </div>
                <div id="datos">
               <table style='width :860px;' >
            <tr>
                <td>
                <?php echo $this->Form->input('id'); ?>
                <?php echo $this->Form->input('cedula', array('style'=>'width: 200px;','maxlength'=>'8')); ?>
                </td>
                    <td>
		<?php echo $this->Form->input('apellido', array('style'=>'width: 200px;')); ?>
                </td><td>   
		<?php echo $this->Form->input('nombre', array('style'=>'width: 200px;')); ?>
                </td>
           </tr>
          <tr>
                <td>
                <?php echo $this->Form->input('telefono_movil', array('style'=>'width: 200px;','maxlength'=>'12','placeholder'=>'Ejm. 0416-5555555')); ?>
                </td><td>
                <?php echo $this->Form->input('telefono_local', array('style'=>'width: 200px;','maxlength'=>'12','placeholder'=>'Ejm. 0212-5555555')); ?>
                </td><td>
		<?php echo $this->Form->input('telefono_trabajo', array('style'=>'width: 200px;','maxlength'=>'12','placeholder'=>'Ejm. 0212-5555555')); ?>
                </td>
           </tr>
           
		<?php echo $this->Form->input('estado_id', array('style'=>'width: 200px;', 'value'=>'1', 'type'=>'hidden')); ?>

                <?php echo $this->Form->input('municipio_id', array('style'=>'width: 200px;',  'value'=>'101','type'=>'hidden', 'options'=>array('Selected'=>'Seleccione'))); ?>

                <?php echo $this->Form->input('parroquia_id', array('style'=>'width: 200px;', 'value'=>'10112' ,'type'=>'hidden','options'=>array('Selected'=>'Seleccione'))); ?>

                <?php echo $this->Form->input('direccion', array('style'=>'width: 250px;', 'value'=>'No especificado','type'=>'hidden','placeholder'=>'Ejm. Urb. Pedro Perez, Casa 5')); ?>

		<?php echo $this->Form->input('sexo_id', array('style'=>'width: 200px;',  'value'=>'0','type'=>'hidden')); ?>
		<?php echo $this->Form->input('entes', array('style'=>'width: 200px; padding: 0;',  'value'=>'0','type'=>'hidden','options'=>array('MDP'=>'MinDeporte','IND'=>'IND'), 'empty'=>'Seleccione', 'label'=>'Entes')); ?>

                <?php echo $this->Form->input('cargo_id', array('style'=>'width: 200px;', 'required',  'value'=>'7','type'=>'hidden')); ?>

		<?php echo $this->Form->input('tipo_persona_id', array('style'=>'width: 200px;', 'options'=>array('1'=>'Madre','2'=>'Padre','5'=>'No Aplica'), 'empty'=>'Seleccione', 'label'=>'Parentesco',  'value'=>'5','type'=>'hidden')); ?>
<!--<td border='1' class='flotados2'>
                    <label>Niños a Retirar</label>
                <?php //echo $this->Form->input('Alumno', array('type' => 'select', 'multiple' => 'checkbox', 'label'=> false)); ?>
                </td>-->

                <?php echo $this->Form->input('representante', array('value' =>'No','type'=>'hidden')); ?>
		<?php echo $this->Form->input('autorizado',  array('value' =>'No','type'=>'hidden')); ?> 
          
                </table>
                     </div>
                <table style='width :880px;'>
                <tr><td>
                <?php echo $this->Form->input('users', array('style'=>'width: 200px;','required', 'label'=>'Usuarios')); ?>
                </td>
            </tr>
                </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?> 
</div>

