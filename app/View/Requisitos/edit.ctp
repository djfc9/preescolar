

<?php echo $this->Form->create('Requisito'); ?>
	<fieldset>
		<legend><?php echo __('Edit Requisito'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('Alumno');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

