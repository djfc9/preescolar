
<div class="alumnosGradosSecciones form">
<?php echo $this->Form->create('AlumnosGradosSeccione'); ?>
	<fieldset>
		<legend><?php echo __('Add Alumnos Grados Seccione'); ?></legend>
	<?php
		echo $this->Form->input('alumno_id');
		echo $this->Form->input('grados_seccione_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Alumnos Grados Secciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grados Secciones'), array('controller' => 'grados_secciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grados Seccione'), array('controller' => 'grados_secciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
