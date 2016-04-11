
<div class="seccions index">
	<h2><?php echo __('Seccions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_seccion'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($seccions as $seccion): ?>
	<tr>
		<td><?php echo h($seccion['Seccion']['id_seccion']); ?>&nbsp;</td>
		<td><?php echo h($seccion['Seccion']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $seccion['Seccion']['id_seccion'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $seccion['Seccion']['id_seccion'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $seccion['Seccion']['id_seccion']), null, __('Are you sure you want to delete # %s?', $seccion['Seccion']['id_seccion'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Seccion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Grados Secciones'), array('controller' => 'grados_secciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grados Seccione'), array('controller' => 'grados_secciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
