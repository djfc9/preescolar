<div class="problemaAprendizajes form">
<?php echo $this->Form->create('ProblemaAprendizaje'); ?>
	<fieldset>
		<legend><?php echo __('Edit Problema Aprendizaje'); ?></legend>
	<?php
		echo $this->Form->input('id_problema_aprendizaje');
		echo $this->Form->input('descripion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProblemaAprendizaje.id_problema_aprendizaje')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProblemaAprendizaje.id_problema_aprendizaje'))); ?></li>
		<li><?php echo $this->Html->link(__('List Problema Aprendizajes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Problemas Aprendizajes'), array('controller' => 'alumnos_problemas_aprendizajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Problemas Aprendizaje'), array('controller' => 'alumnos_problemas_aprendizajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saluds'), array('controller' => 'saluds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salud'), array('controller' => 'saluds', 'action' => 'add')); ?> </li>
	</ul>
</div>
