
<div class="contenido_principal">
<?php echo $this->Form->create('Alumno', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar todos los datos del Alumno'); ?></legend>
                
        <table align="center" style='width :863px;'><tr><td>
                <?php echo $this->Form->input('id'); ?>
                <?php echo $this->Form->input('cedula_escolar', array('style'=>'width: 150px;','onkeypress'=>"return soloNumeros(event)")); ?>
                </td><td>
                <?php echo $this->Form->input('nombre', array('style'=>'width: 150px;', 
                               'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)')); ?>
                </td><td>
                <?php echo $this->Form->input('apellido', array('style'=>'width: 150px;', 
                               'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)')); ?>
                </td><td width='35' rowspan='3'>
                <div class="flotando1">
                <?php   echo $this->Html->image("./alumno/foto/" . $alumno['0']['Alumno']['foto'], array('class'=>'foto_ficha')); ?> 
                </div>
                </td>
                </tr><tr><td>
                <?php echo $this->Form->input('segundo_nombre', array('style'=>'width: 150px;', 
                               'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)')); ?>
                </td><td>
                <?php echo $this->Form->input('segundo_apellido', array('style'=>'width: 150px;', 
                               'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)')); ?>
                </td><td>
                    <p style='font-size:13px; vertical-align: super;'><font color='red'>*</font> Campos obligatorios</p>
                    </td>
                </tr><tr><td>
                <?php echo $this->Form->input('peso', array('style'=>'width: 150px;', 'type'=>'text')); ?>
                </td><td>
                <?php echo $this->Form->input('talla', array('style'=>'width: 150px;', 'type'=>'text')); ?>
                </td><td>
                <?php echo $this->Form->input('sexo_id', array('style'=>'width: 150px;')); ?>
                </td></tr><tr><td style="vertical-align: super;">
                <?php echo $this->Form->input('fecha_nacimiento'); ?>
                </td><td>
                <?php echo $this->Form->input('lugar_nacimiento', array('style'=>'width: 220px;', 
                               'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)')); ?>
                </td><td style="vertical-align: super;">
		<?php echo $this->Form->input('telefono_habitacion', array('style'=>'width: 150px;','maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)")); ?>
                </td></tr><tr><td>
                <div style="float: left;">
                <?php echo $this->Form->input('estado_id', array('style'=>'width: 150px;')); ?>
                </div>
                </td><td>
                <div id='imgcarga' style='float:left;'>
		<?php echo $this->Form->input('municipio_id', array('style'=>'width: 150px;', 'empty'=>'Seleccione')); ?>
                </div>
                </td><td colspan="2">
                <div id='imgcarga1' style='float:left;'>
		<?php echo $this->Form->input('parroquia_id', array('style'=>'width: 150px;', 'empty'=>'Seleccione')); ?>
                </div>
		</td></tr><tr><td>
                <?php echo $this->Form->input('direccion', array('style'=>'width: 220px;', 
                                'onchange'=>'conMayusculas(this)')); ?>
                </td><td colspan="2" style="vertical-align: super;">
                <?php echo $this->Form->input('foto', array('type'=>'file')); ?>
                </td></tr><tr><td colspan='2' class="flotados2">
                <?php echo $this->Form->input('fotografias', 
                        array('style'=>'width: 150px;',
                            'label'=>'Autorizo a la institución para publicar y difundir fotos de mi representado en medios digitales institucionales e impresos.',
                            'options'=>array('true'=>'Acepto','false'=>'Rechazo'))); ?>
                </td>
                <td colspan='2' class="flotados2">
                <?php echo $this->Form->input('viajes', array('style'=>'width: 150px;',
                    'label'=>'Estoy de acuerdo en autorizar a mi representado a asistir a paseos y salidas.',
                            'options'=>array('true'=>'Acepto','false'=>'Rechazo'))); ?>
                </td>
                </tr>
                <tr>
                    <td>
                    <?php echo $this->Form->input('Persona', array('multiple'=>'checkbox', 'label'=>'Personas Registradas')); ?>
                    </td>
                </tr>
                </table>
   
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
