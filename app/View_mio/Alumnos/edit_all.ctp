<div class="contenido_principal">
<?php echo $this->Form->create('Alumno'); ?>
    <fieldset>
		<legend><?php echo __('Edit All Alumno'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo $this->Form->input('cedula_escolar');
		echo $this->Form->input('nombre');
		echo $this->Form->input('segundo_nombre');
		echo $this->Form->input('segundo_apellido');
		echo $this->Form->input('apellido');
		echo $this->Form->input('sexo_id');
		echo $this->Form->input('Persona', array('multiple'=>'checkbox', 'label'=>'Personas Registradas'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
