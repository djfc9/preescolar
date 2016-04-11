<div class="contenido_principal">
<?php echo $this->Form->create('Evento'); ?>
	<fieldset style='width :877px;'>
		<legend><?php echo __('Agregar Evento'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

