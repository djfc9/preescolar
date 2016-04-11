<div class="contenido_principal">
<?php echo $this->Form->create('Salud'); ?>
	<fieldset>
		<legend><?php echo __('Tarjeta de Salud'); ?></legend>
                <div id="contenedor-principal">
                    <table style='width :863px;'><tr><td colspan="3">
	<?php   
                echo $this->Form->input('id');
		echo $this->Form->input('alumno_id', array('style'=>'width: 200px;','readonly'=>true, 'disabled'=>true/*, 'value'=>$alumnos */));
                echo "</td></tr><tr><td>";
                echo $this->Form->input('control_prenatal', array('style'=>'width : 200px;','options'=>array('Seleccione','Si','No')));
                echo "</td><td>";
		echo $this->Form->input('complicacion_embarazo_id', array('style'=>'width : 200px;', 'label'=>'Complicación del embarazo'));
                echo "</td><td>";
                echo $this->Form->input('tipo_parto_id', array('style'=>'width : 205px;'));
                echo "</td></tr><tr><td>";
		echo $this->Form->input('tipo_problema_nacimiento_id', array('style'=>'width : 200px;', 'label'=>'Problema en el Nacimiento'));
                echo "</td><td>";
		echo $this->Form->input('respiro_lloro_nacer', array('style'=>'width : 200px;','label'=>'¿Respiro/Lloro al Nacer?', 'options'=>array('Seleccione','Si','No')));
                echo "</td><td>";
		echo $this->Form->input('peso_nacer', array('style'=>'width : 200px;','placeholder'=>'Ejm. 10.42'));
		echo "</td></tr><tr><td>";
                echo $this->Form->input('talla_nacer', array('style'=>'width : 200px;','placeholder'=>'Ejm. 55.20'));
                echo "</td><td>";echo $this->Form->input('grupo_sanguineo', array('style'=>'width : 200px;','label'=>'Grupo Sanguineo', 'options'=>array('A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-','No Sabe'=>'No Sabe'), 'empty'=>'Seleccione'));
		
                echo "</td><td>";
                echo $this->Form->input('control_pediatrico', array('style'=>'width : 200px;','maxlength'=>'200' ,'style'=>'text-transform: uppercase;','placeholder'=>'Ejm. Fecha y diagnostico'));
                
                
                echo "</td></tr><tr><td>";
                echo $this->Form->input('enfermedad_padecida', array('style'=>'width : 200px; ','maxlength'=>'200' ,'style'=>'text-transform: uppercase;','placeholder'=>'Ejm. Lechina'));
                echo "</td><td style='vertical-align: super;'>";
		echo $this->Form->input('alergia', array('style'=>'width : 200px;','label'=>'¿Es Alergico?','options'=>array('Seleccione','Si','No')));
                echo "</td><td>";
		echo $this->Form->input('alergico', array('type'=>'textarea','maxlength'=>'200','style'=>'width : 200px;' ,'style'=>'text-transform: uppercase;'));
                echo "</td></tr><tr><td style='vertical-align: super;'>";
                echo $this->Form->input('problema_aprendizaje_id', array('style'=>'width : 200px;'));
                 echo "</td><td colspan='2'>";
                echo $this->Form->input('tratamiento_prob_aprendizaje', array('style'=>'width : 425px;','maxlength'=>'300' ,'style'=>'text-transform: uppercase;'));
                echo "</td></tr><tralign='center'><td colspan='3' align='center'><h2>Adicionales</h2></td></tr><tr><td>";
                  echo $this->Form->input('medicamento_fiebre', array('style'=>'width : 200px;' ,'style'=>'text-transform: uppercase;' ,'placeholder'=>'Ejm. Atamel 10cc' ));
                echo "</td><td colspan='2'>";
                echo $this->Form->input('poliza_seguros', array('style'=>'width : 425px;' ,'style'=>'text-transform: uppercase;' ,'placeholder'=>'Ejm. Horizonte de seguros'));
                echo "</td></tr>";
	?>
                    </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', array('id'=>'reg_alumno', 'name'=>'reg_alumno'))); ?>

</div></div>
