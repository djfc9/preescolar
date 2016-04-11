<div class="boletas form">
<?php echo $this->Form->create('Boleta'); ?>
	<fieldset>
		<legend><?php echo __('Add Boleta'); ?></legend>
	<?php
		echo $this->Form->input('calificacion');
		echo $this->Form->input('resultado');
		echo $this->Form->input('año_escolar');
		echo $this->Form->input('Alumno');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Boletas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
