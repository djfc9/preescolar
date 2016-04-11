<div class="controlesPediatricos form">
<?php echo $this->Form->create('ControlesPediatrico'); ?>
	<fieldset>
		<legend><?php echo __('Add Controles Pediatrico'); ?></legend>
	<?php
		echo $this->Form->input('fecha');
		echo $this->Form->input('diagnostico');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Controles Pediatricos'), array('action' => 'index')); ?></li>
	</ul>
</div>
