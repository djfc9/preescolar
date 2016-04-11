<div class="tipoPartos form">
<?php echo $this->Form->create('TipoParto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipo Parto'); ?></legend>
	<?php
		echo $this->Form->input('id_tipo_parto');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TipoParto.id_tipo_parto')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TipoParto.id_tipo_parto'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipo Partos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Saluds'), array('controller' => 'saluds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salud'), array('controller' => 'saluds', 'action' => 'add')); ?> </li>
	</ul>
</div>
