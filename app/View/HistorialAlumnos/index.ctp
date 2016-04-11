
<div class="historialAlumnos index">
	<h2><?php echo __('Historial Alumnos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_historia'); ?></th>
			<th><?php echo $this->Paginator->sort('alumno_id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($historialAlumnos as $historialAlumno): ?>
	<tr>
		<td><?php echo h($historialAlumno['HistorialAlumno']['id_historia']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($historialAlumno['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $historialAlumno['Alumno']['id_alumno'])); ?>
		</td>
		<td><?php echo h($historialAlumno['HistorialAlumno']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $historialAlumno['HistorialAlumno']['id_historia'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $historialAlumno['HistorialAlumno']['id_historia'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $historialAlumno['HistorialAlumno']['id_historia']), null, __('Are you sure you want to delete # %s?', $historialAlumno['HistorialAlumno']['id_historia'])); ?>
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
		<li><?php echo $this->Html->link(__('New Historial Alumno'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
