
<div class="alumnosGradosSecciones index">
	<h2><?php echo __('Alumnos Grados Secciones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('alumno_id'); ?></th>
			<th><?php echo $this->Paginator->sort('grados_seccione_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($alumnosGradosSecciones as $alumnosGradosSeccione): ?>
	<tr>
		<td><?php echo h($alumnosGradosSeccione['AlumnosGradosSeccione']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($alumnosGradosSeccione['Alumno']['nombre'], array('controller' => 'alumnos', 'action' => 'view', $alumnosGradosSeccione['Alumno']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($alumnosGradosSeccione['GradosSeccione']['id'], array('controller' => 'grados_secciones', 'action' => 'view', $alumnosGradosSeccione['GradosSeccione']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', base64_decode($alumnosGradosSeccione['AlumnosGradosSeccione']['id']))); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', base64_decode($alumnosGradosSeccione['AlumnosGradosSeccione']['id']))); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', base64_decode($alumnosGradosSeccione['AlumnosGradosSeccione']['id'])), null, __('Are you sure you want to delete # %s?', $alumnosGradosSeccione['AlumnosGradosSeccione']['id'])); ?>
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

