<div class="tipoProblemaNacimientos form">
<?php echo $this->Form->create('TipoProblemaNacimiento'); ?>
	<fieldset>
		<legend><?php echo __('Add Tipo Problema Nacimiento'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tipo Problema Nacimientos'), array('action' => 'index')); ?></li>
	</ul>
</div>
