<div class="alumnosProblemasAprendizajes index">
	<h2><?php echo __('Alumnos Problemas Aprendizajes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_alum_aprendi_problema'); ?></th>
			<th><?php echo $this->Paginator->sort('problema_aprendizaje_id'); ?></th>
			<th><?php echo $this->Paginator->sort('alumno_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($alumnosProblemasAprendizajes as $alumnosProblemasAprendizaje): ?>
	<tr>
		<td><?php echo h($alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($alumnosProblemasAprendizaje['ProblemaAprendizaje']['descripion'], array('controller' => 'problema_aprendizajes', 'action' => 'view', $alumnosProblemasAprendizaje['ProblemaAprendizaje']['id_problema_aprendizaje'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($alumnosProblemasAprendizaje['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $alumnosProblemasAprendizaje['Alumno']['id_alumno'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema']), null, __('Are you sure you want to delete # %s?', $alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema'])); ?>
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
		<li><?php echo $this->Html->link(__('New Alumnos Problemas Aprendizaje'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Problema Aprendizajes'), array('controller' => 'problema_aprendizajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problema Aprendizaje'), array('controller' => 'problema_aprendizajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
