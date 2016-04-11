<div class="alumnosNormas form">
<?php echo $this->Form->create('AlumnosNorma'); ?>
	<fieldset>
		<legend><?php echo __('Edit Alumnos Norma'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('alumno_id');
		echo $this->Form->input('norma_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AlumnosNorma.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AlumnosNorma.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Normas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Normas'), array('controller' => 'normas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Norma'), array('controller' => 'normas', 'action' => 'add')); ?> </li>
	</ul>
</div>
