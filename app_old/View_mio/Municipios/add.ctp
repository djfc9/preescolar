<div class="municipios form">
<?php echo $this->Form->create('Municipio'); ?>
	<fieldset>
		<legend><?php echo __('Add Municipio'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('estado_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Municipios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parroquias'), array('controller' => 'parroquias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parroquia'), array('controller' => 'parroquias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
