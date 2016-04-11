<div class="contenido_principal">
	<h2><?php echo __('Alumnos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('cedula_escolar'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
                        <th><?php echo $this->Paginator->sort('segundo_nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('segundo_apellido'); ?></th>
                        <th><?php echo $this->Paginator->sort('telefono_habitacion'); ?></th>
			<th><?php echo $this->Paginator->sort('estatu_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($alumnos as $alumno): ?>
	<tr>
		<td><?php echo h($alumno['Alumno']['id']); ?>&nbsp;</td>
                <td><?php echo h($alumno['Alumno']['cedula_escolar']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['nombre']); ?>&nbsp;</td>
                <td><?php echo h($alumno['Alumno']['segundo_nombre']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['apellido']); ?>&nbsp;</td>
                <td><?php echo h($alumno['Alumno']['segundo_apellido']); ?>&nbsp;</td>
                <td><?php echo h($alumno['Alumno']['telefono_habitacion']); ?>&nbsp;</td>
		<td>
			<?php echo h($alumno['Estatu']['id']); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $alumno['Alumno']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $alumno['Alumno']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit_All'), array('action' => 'edit_all', $alumno['Alumno']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $alumno['Alumno']['id']), null, __('Are you sure you want to delete # %s?', $alumno['Alumno']['id'])); ?>
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
