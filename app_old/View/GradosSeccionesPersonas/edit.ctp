<?php echo $this->Element('datos'); ?>
<div class="gradosSeccionesPersonas form">
<?php echo $this->Form->create('GradosSeccionesPersona'); ?>
	<fieldset>
		<legend><?php echo __('Edit Grados Secciones Persona'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('persona_id');
		echo $this->Form->input('grados_seccione_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GradosSeccionesPersona.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GradosSeccionesPersona.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Grados Secciones Personas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
