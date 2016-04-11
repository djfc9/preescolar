
<div class="grados index">
	<h2><?php echo __('Grados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_grado'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($grados as $grado): ?>
	<tr>
		<td><?php echo h($grado['Grado']['id_grado']); ?>&nbsp;</td>
		<td><?php echo h($grado['Grado']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $grado['Grado']['id_grado'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $grado['Grado']['id_grado'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $grado['Grado']['id_grado']), null, __('Are you sure you want to delete # %s?', $grado['Grado']['id_grado'])); ?>
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
		<li><?php echo $this->Html->link(__('New Grado'), array('action' => 'add')); ?></li>
	</ul>
</div>
