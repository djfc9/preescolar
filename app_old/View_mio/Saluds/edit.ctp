<?php echo $this->Element('datos'); ?>

<?php echo $this->Form->create('Salud'); ?>
	<fieldset>
		<legend><?php echo __('Editar ficha de Salud'); ?></legend>
                
                <table align="center"><tr><td>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('alumno_id');
		echo $this->Form->input('tipo_parto_id');
		echo $this->Form->input('tipo_problema_nacimiento_id');
		echo $this->Form->input('problema_aprendizaje_id');
		echo $this->Form->input('control_prenatal');
		echo $this->Form->input('respiro_lloro_nacer');
		echo $this->Form->input('peso_nacer');
		echo $this->Form->input('talla_nacer');
		echo $this->Form->input('alergico');
		echo $this->Form->input('enfermedad_padecida');
		echo $this->Form->input('poliza_seguros');
		echo $this->Form->input('medicamento_fiebre');
		echo $this->Form->input('grupo_sanguineo');
		echo $this->Form->input('tratamiento_prob_aprendizaje');
		echo $this->Form->input('control_pediatrico');
		echo $this->Form->input('complicacion_embarazo_id');
                
             /*  echo $this->Form->input('alumno_id', array('type'=>'hidden'));
                echo $this->Form->input('tipo_parto_id', array('style'=>'width : 150px;'));
                echo "</td><td>";
		echo $this->Form->input('control_prenatal', array('style'=>'width : 150px;','options'=>array('Seleccione','Si','No')));
                echo "</td><td>";
                echo $this->Form->input('grupo_sanguineo', array('style'=>'width : 150px;','label'=>'Grupo Sanguineo', 'options'=>array('Seleccione','A+','A-','B+','B-','AB+','AB-','O+','O-')));
                echo "</td></tr><tr><td>";
		echo $this->Form->input('problema_aprendizaje_id', array('style'=>'width : 150px;'));
                echo "<div id='problema_aprendizaje' style='display: none;'>";
                echo $this->Form->input('tratamiento_prob_aprendizaje', array('style'=>'width : 150px;'));
                echo "</div>";
                echo "</td><td>";
		echo $this->Form->input('tipo_problema_nacimiento_id', array('style'=>'width : 150px;', 'label'=>'Problema de Nacimiento'));
                echo "</td><td>";
		echo $this->Form->input('respiro_lloro_nacer', array('style'=>'width : 150px;','label'=>'¿Respiro/Lloro al Nacer?', 'options'=>array('Seleccione','Si','No')));
		echo "</td></tr><tr><td>";
                echo $this->Form->input('peso_nacer', array('style'=>'width : 150px;'));
                echo "</td><td>";
		echo $this->Form->input('talla_nacer', array('style'=>'width : 150px;'));
                echo "</td><td>";
                echo $this->Form->input('alergia', array('style'=>'width : 150px;','label'=>'¿Es Alergico?', 'options'=>array('Seleccione','Si','No')));
                echo "<div id='alegia' style='display: none;'>";
		echo $this->Form->input('alergico', array('style'=>'width : 150px;'));
                echo "</div>";
                echo "</td></tr><tr><td>";
                echo $this->Form->input('medicamento_fiebre', array('style'=>'width : 150px;'));
                echo "</td><td>";
		echo $this->Form->input('poliza_seguros', array('style'=>'width : 200px;'));
                echo "</td><td>";
		echo $this->Form->input('complicacion_embarazo_id', array('style'=>'width : 150px;'));
                echo "</td></tr><tr><td>";
                 echo $this->Form->input('control_pediatrico', array('style'=>'width : 220px;','maxlength'=>'150'));
                echo "</td><td>";
                echo $this->Form->input('enfermedad_padecida', array('style'=>'width : 220px; ','maxlength'=>'150'));
                echo "</td></tr>";*/
        
	?>
                            </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>


