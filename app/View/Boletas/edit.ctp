<div class="boletas form">
<?php echo $this->Form->create('Boleta'); ?>
	<fieldset>
		<legend><?php echo __('Editar Boleta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('calificacion');
		echo $this->Form->input('recomendacion');
		echo $this->Form->input('Alumno', array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

