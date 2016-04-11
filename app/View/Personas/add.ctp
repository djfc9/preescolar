
<div class="contenido_principal">
<?php  echo $this->Form->create('Persona', array('type'=>'file')); ?> 
	<fieldset>
		<legend><?php echo __('Registro Personal'); ?></legend>
               <table style='width :880px;' >
            <tr>
                <td>
                <?php  //echo $this->Form->input('id'); ?>
                <?php echo $this->Form->input('cedula', array('style'=>'width: 200px;','onkeypress'=>"return soloNumeros(event)",'maxLength'=>8)); ?>
                </td><td>
		<?php echo $this->Form->input('apellido', array('style'=>'width: 200px; ',
                                'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)')); ?>
                </td><td>   
		<?php echo $this->Form->input('nombre', array('style'=>'width: 200px;',
                                'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)')); ?>
                </td>
           </tr>
          <tr>
                <td>
                <?php echo $this->Form->input('telefono_movil', array('style'=>'width: 200px;','maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)",'placeholder'=>'Ejm. 0416-5555555')); ?>
                </td><td>
                <?php echo $this->Form->input('telefono_local', array('style'=>'width: 200px;','maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)",'placeholder'=>'Ejm. 0212-5555555')); ?>
                </td><td>
		<?php echo $this->Form->input('telefono_trabajo', array('style'=>'width: 200px;','maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)",'placeholder'=>'Ejm. 0212-5555555')); ?>
                </td>
           </tr>
           <tr>
                <td>
                <div  style="float: left">
		<?php echo $this->Form->input('estado_id', array('style'=>'width: 200px;')); ?>
                </div>
                </td><td>
                    <div id='imgcargas' style="float: left">
                <?php echo $this->Form->input('municipio_id', array('style'=>'width: 200px;', 'options'=>array('Selected'=>'Seleccione'))); ?>
                </div>
                </td><td>
                <div id='imgcargando' style="float: left">
                <?php echo $this->Form->input('parroquia_id', array('style'=>'width: 200px;', 'options'=>array('Selected'=>'Seleccione'))); ?>
                </div>
                </td>
           </tr>
           <tr>
                <td>
                <?php echo $this->Form->input('direccion', array('style'=>'width: 250px;','placeholder'=>'Ejm. Urb. Pedro Perez, Casa 5',
                                 'onchange'=>'conMayusculas(this)')); ?>
                </td><td style='vertical-align: super;'>
		<?php echo $this->Form->input('sexo_id', array('style'=>'width: 200px;')); ?>
                </td><td style='vertical-align: super;'>
                    <div id='' style='font-size:10px; padding: 0;' color='FF0021;'><p size='2' style="color:#FF0000;">Si es Trabajador del<br> IND, MPPPJD o Federación seleccione esta <br>opci&oacute;n</p></div>
                <?php echo $this->Form->input('Trabaja', array('type'=>'checkbox','label'=> false,'style'=>'width: 200px; padding-top: 0;')); ?>
                <div id='trabajador' style='display: none;'>
		<?php echo $this->Form->input('entes', 
                        array('style'=>'width: 200px; padding: 0;',
                            'options'=>array('MDP'=>'MPPPJD','IND'=>'IND','OTRO'=>'OTROS'), 'empty'=>'Seleccione', 'label'=>'Entes')); ?>
                </div>
                </td>
           </tr>
           <tr>
                <td style='vertical-align: super;'>
                <?php echo $this->Form->input('cargo_id', array('style'=>'width: 200px;', 'required')); ?>
                </td><td style='vertical-align: super;'>   
		<?php echo $this->Form->input('TipoPersona', array('style'=>'width: 200px;', 'type'=>'select', 'options'=>array('1'=>'Madre','2'=>'Padre','8'=>'Abuel@'), 'empty'=>'Seleccione', 'label'=>'Parentesco')); ?>
                </td><!--<td border='1' class='flotados2'>
                    <label>Niños a Retirar</label>
                <?php //echo $this->Form->input('Alumno', array('type' => 'select', 'multiple' => 'checkbox', 'label'=> false)); ?>
                </td>-->
           </tr>
                <?php echo $this->Form->input('representante', array('value' =>'Si','type'=>'hidden')); ?>
		<?php echo $this->Form->input('autorizado',  array('value' =>'Si','type'=>'hidden')); ?> 
                </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?> 
</div>

