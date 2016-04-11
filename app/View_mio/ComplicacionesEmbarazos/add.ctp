<div class="complicacionesEmbarazos form">
<?php echo $this->Form->create('ComplicacionesEmbarazo'); ?>
	<fieldset>
		<legend><?php echo __('Add Complicaciones Embarazo'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Complicaciones Embarazos'), array('action' => 'index')); ?></li>
	</ul>
</div>
