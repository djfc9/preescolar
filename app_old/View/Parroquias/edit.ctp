<div class="parroquias form">
<?php echo $this->Form->create('Parroquia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Parroquia'); ?></legend>
	<?php
		echo $this->Form->input('id_parroquia');
		echo $this->Form->input('nombre');
		echo $this->Form->input('estado_id');
		echo $this->Form->input('municipio_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Parroquia.id_parroquia')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Parroquia.id_parroquia'))); ?></li>
		<li><?php echo $this->Html->link(__('List Parroquias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Municipios'), array('controller' => 'municipios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Municipio'), array('controller' => 'municipios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
