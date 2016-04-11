<div class="estatuses form">
<?php echo $this->Form->create('Estatus'); ?>
	<fieldset>
		<legend><?php echo __('Add Estatus'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Estatuses'), array('action' => 'index')); ?></li>
	</ul>
</div>
