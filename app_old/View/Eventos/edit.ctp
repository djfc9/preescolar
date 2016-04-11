<div class="eventos form">
<?php echo $this->Form->create('Evento'); ?>
	<fieldset>
		<legend><?php echo __('Edit Evento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Evento.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Evento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Eventos'), array('action' => 'index')); ?></li>
	</ul>
</div>
