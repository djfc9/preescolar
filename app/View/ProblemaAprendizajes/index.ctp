<div class="problemaAprendizajes index">
	<h2><?php echo __('Problema Aprendizajes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_problema_aprendizaje'); ?></th>
			<th><?php echo $this->Paginator->sort('descripion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($problemaAprendizajes as $problemaAprendizaje): ?>
	<tr>
		<td><?php echo h($problemaAprendizaje['ProblemaAprendizaje']['id_problema_aprendizaje']); ?>&nbsp;</td>
		<td><?php echo h($problemaAprendizaje['ProblemaAprendizaje']['descripion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $problemaAprendizaje['ProblemaAprendizaje']['id_problema_aprendizaje'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $problemaAprendizaje['ProblemaAprendizaje']['id_problema_aprendizaje'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $problemaAprendizaje['ProblemaAprendizaje']['id_problema_aprendizaje']), null, __('Are you sure you want to delete # %s?', $problemaAprendizaje['ProblemaAprendizaje']['id_problema_aprendizaje'])); ?>
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
		<li><?php echo $this->Html->link(__('New Problema Aprendizaje'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Problemas Aprendizajes'), array('controller' => 'alumnos_problemas_aprendizajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Problemas Aprendizaje'), array('controller' => 'alumnos_problemas_aprendizajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saluds'), array('controller' => 'saluds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salud'), array('controller' => 'saluds', 'action' => 'add')); ?> </li>
	</ul>
</div>
