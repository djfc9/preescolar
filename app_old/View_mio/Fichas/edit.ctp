
<div class="fichas form">
<?php echo $this->Form->create('Ficha'); ?>
	<fieldset>
		<legend><?php echo __('Editar Ficha de Caso M&eacute;dico.'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fecha');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('medicamentos');
		echo $this->Form->input('diagnostico');
		echo $this->Form->input('Alumno');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

