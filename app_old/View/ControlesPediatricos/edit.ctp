<div class="controlesPediatricos form">
<?php echo $this->Form->create('ControlesPediatrico'); ?>
	<fieldset>
		<legend><?php echo __('Edit Controles Pediatrico'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fecha');
		echo $this->Form->input('diagnostico');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ControlesPediatrico.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ControlesPediatrico.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Controles Pediatricos'), array('action' => 'index')); ?></li>
	</ul>
</div>
