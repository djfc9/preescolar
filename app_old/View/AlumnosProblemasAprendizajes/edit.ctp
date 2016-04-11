<div class="alumnosProblemasAprendizajes form">
<?php echo $this->Form->create('AlumnosProblemasAprendizaje'); ?>
	<fieldset>
		<legend><?php echo __('Edit Alumnos Problemas Aprendizaje'); ?></legend>
	<?php
		echo $this->Form->input('id_alum_aprendi_problema');
		echo $this->Form->input('problema_aprendizaje_id');
		echo $this->Form->input('alumno_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AlumnosProblemasAprendizaje.id_alum_aprendi_problema')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AlumnosProblemasAprendizaje.id_alum_aprendi_problema'))); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Problemas Aprendizajes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Problema Aprendizajes'), array('controller' => 'problema_aprendizajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problema Aprendizaje'), array('controller' => 'problema_aprendizajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
