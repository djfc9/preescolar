<div class="evaluacions index">
	<h2><?php echo __('Evaluacions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('resultado'); ?></th>
			<th><?php echo $this->Paginator->sort('contenido'); ?></th>
			<th><?php echo $this->Paginator->sort('tema'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($evaluacions as $evaluacion): ?>
	<tr>
		<td><?php echo h($evaluacion['Evaluacion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evaluacion['Asignatura']['nombre'], array('controller' => 'asignaturas', 'action' => 'view', $evaluacion['Asignatura']['id'])); ?>
		</td>
		<td><?php echo h($evaluacion['Evaluacion']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($evaluacion['Evaluacion']['resultado']); ?>&nbsp;</td>
		<td><?php echo h($evaluacion['Evaluacion']['contenido']); ?>&nbsp;</td>
		<td><?php echo h($evaluacion['Evaluacion']['tema']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evaluacion['Evaluacion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evaluacion['Evaluacion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evaluacion['Evaluacion']['id']), null, __('Are you sure you want to delete # %s?', $evaluacion['Evaluacion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Evaluacion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
