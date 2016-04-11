
<div class="historialAlumnos form">
<?php echo $this->Form->create('HistorialAlumno'); ?>
	<fieldset>
		<legend><?php echo __('Edit Historial Alumno'); ?></legend>
	<?php
		echo $this->Form->input('id_historia');
		echo $this->Form->input('alumno_id');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('HistorialAlumno.id_historia')), null, __('Are you sure you want to delete # %s?', $this->Form->value('HistorialAlumno.id_historia'))); ?></li>
		<li><?php echo $this->Html->link(__('List Historial Alumnos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
