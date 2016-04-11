<div class="sexos index">
	<h2><?php echo __('Sexos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_sexo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($sexos as $sexo): ?>
	<tr>
		<td><?php echo h($sexo['Sexo']['id_sexo']); ?>&nbsp;</td>
		<td><?php echo h($sexo['Sexo']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sexo['Sexo']['id_sexo'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sexo['Sexo']['id_sexo'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sexo['Sexo']['id_sexo']), null, __('Are you sure you want to delete # %s?', $sexo['Sexo']['id_sexo'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sexo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
