
<div class="seccions form">
<?php echo $this->Form->create('Seccion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Seccion'); ?></legend>
	<?php
		echo $this->Form->input('id_seccion');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Seccion.id_seccion')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Seccion.id_seccion'))); ?></li>
		<li><?php echo $this->Html->link(__('List Seccions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Grados Secciones'), array('controller' => 'grados_secciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grados Seccione'), array('controller' => 'grados_secciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
