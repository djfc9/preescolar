<div class="complicacionesEmbarazos view">
<h2><?php echo __('Complicaciones Embarazo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($complicacionesEmbarazo['ComplicacionesEmbarazo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($complicacionesEmbarazo['ComplicacionesEmbarazo']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Complicaciones Embarazo'), array('action' => 'edit', $complicacionesEmbarazo['ComplicacionesEmbarazo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Complicaciones Embarazo'), array('action' => 'delete', $complicacionesEmbarazo['ComplicacionesEmbarazo']['id']), null, __('Are you sure you want to delete # %s?', $complicacionesEmbarazo['ComplicacionesEmbarazo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Complicaciones Embarazos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Complicaciones Embarazo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
