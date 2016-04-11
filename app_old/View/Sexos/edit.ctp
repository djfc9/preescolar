<div class="sexos form">
<?php echo $this->Form->create('Sexo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sexo'); ?></legend>
	<?php
		echo $this->Form->input('id_sexo');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sexo.id_sexo')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Sexo.id_sexo'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sexos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
