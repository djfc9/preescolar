<div class="evaluacions form">
<?php echo $this->Form->create('Evaluacion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Evaluacion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('asignatura_id');
		echo $this->Form->input('fecha');
		echo $this->Form->input('resultado');
		echo $this->Form->input('contenido');
		echo $this->Form->input('tema');
		echo $this->Form->input('Alumno');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Evaluacion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Evaluacion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluacions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
