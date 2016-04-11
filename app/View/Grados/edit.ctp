
<div class="grados form">
<?php echo $this->Form->create('Grado'); ?>
	<fieldset>
		<legend><?php echo __('Edit Grado'); ?></legend>
	<?php
		echo $this->Form->input('id_grado');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Grado.id_grado')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Grado.id_grado'))); ?></li>
		<li><?php echo $this->Html->link(__('List Grados'), array('action' => 'index')); ?></li>
	</ul>
</div>
