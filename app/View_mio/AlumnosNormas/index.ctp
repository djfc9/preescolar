
<div class="alumnosNormas index">
	<h2><?php echo __('Alumnos Normas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('alumno_id'); ?></th>
			<th><?php echo $this->Paginator->sort('norma_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($alumnosNormas as $alumnosNorma): ?>
	<tr>
		<td><?php echo h($alumnosNorma['AlumnosNorma']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($alumnosNorma['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $alumnosNorma['Alumno']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($alumnosNorma['Norma']['nombre'], array('controller' => 'normas', 'action' => 'view', $alumnosNorma['Norma']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $alumnosNorma['AlumnosNorma']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $alumnosNorma['AlumnosNorma']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $alumnosNorma['AlumnosNorma']['id']), null, __('Are you sure you want to delete # %s?', $alumnosNorma['AlumnosNorma']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Alumnos Norma'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Normas'), array('controller' => 'normas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Norma'), array('controller' => 'normas', 'action' => 'add')); ?> </li>
	</ul>
</div>
