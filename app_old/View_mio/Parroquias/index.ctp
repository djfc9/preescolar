<div class="parroquias index">
	<h2><?php echo __('Parroquias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_parroquia'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('estado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('municipio_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parroquias as $parroquia): ?>
	<tr>
		<td><?php echo h($parroquia['Parroquia']['id_parroquia']); ?>&nbsp;</td>
		<td><?php echo h($parroquia['Parroquia']['nombre']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($parroquia['Estado']['descripcion'], array('controller' => 'estados', 'action' => 'view', $parroquia['Estado']['id_estado'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($parroquia['Municipio']['nombre'], array('controller' => 'municipios', 'action' => 'view', $parroquia['Municipio']['id_municipio'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $parroquia['Parroquia']['id_parroquia'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $parroquia['Parroquia']['id_parroquia'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $parroquia['Parroquia']['id_parroquia']), null, __('Are you sure you want to delete # %s?', $parroquia['Parroquia']['id_parroquia'])); ?>
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
		<li><?php echo $this->Html->link(__('New Parroquia'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Municipios'), array('controller' => 'municipios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Municipio'), array('controller' => 'municipios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
