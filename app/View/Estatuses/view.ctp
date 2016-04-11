<div class="estatuses view">
<h2><?php echo __('Estatus'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estatus['Estatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($estatus['Estatus']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estatus'), array('action' => 'edit', $estatus['Estatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estatus'), array('action' => 'delete', $estatus['Estatus']['id']), null, __('Are you sure you want to delete # %s?', $estatus['Estatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estatuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estatus'), array('action' => 'add')); ?> </li>
	</ul>
</div>
