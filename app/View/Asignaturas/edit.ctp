
<div class="asignaturas form">
<?php echo $this->Form->create('Asignatura'); ?>
	<fieldset>
		<legend><?php echo __('Edit Asignatura'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Asignatura.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Asignatura.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluacions'), array('controller' => 'evaluacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluacion'), array('controller' => 'evaluacions', 'action' => 'add')); ?> </li>
	</ul>
</div>
