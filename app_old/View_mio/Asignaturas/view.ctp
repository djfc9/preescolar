
<div class="asignaturas view">
<h2><?php echo __('Asignatura'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($asignatura['Asignatura']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($asignatura['Asignatura']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Asignatura'), array('action' => 'edit', $asignatura['Asignatura']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Asignatura'), array('action' => 'delete', $asignatura['Asignatura']['id']), null, __('Are you sure you want to delete # %s?', $asignatura['Asignatura']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluacions'), array('controller' => 'evaluacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluacion'), array('controller' => 'evaluacions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Evaluacions'); ?></h3>
	<?php if (!empty($asignatura['Evaluacion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Asignatura Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Resultado'); ?></th>
		<th><?php echo __('Contenido'); ?></th>
		<th><?php echo __('Tema'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($asignatura['Evaluacion'] as $evaluacion): ?>
		<tr>
			<td><?php echo $evaluacion['id']; ?></td>
			<td><?php echo $evaluacion['asignatura_id']; ?></td>
			<td><?php echo $evaluacion['fecha']; ?></td>
			<td><?php echo $evaluacion['resultado']; ?></td>
			<td><?php echo $evaluacion['contenido']; ?></td>
			<td><?php echo $evaluacion['tema']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'evaluacions', 'action' => 'view', $evaluacion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'evaluacions', 'action' => 'edit', $evaluacion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'evaluacions', 'action' => 'delete', $evaluacion['id']), null, __('Are you sure you want to delete # %s?', $evaluacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Evaluacion'), array('controller' => 'evaluacions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
