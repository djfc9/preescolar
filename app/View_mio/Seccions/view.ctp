
<div class="seccions view">
<h2><?php echo __('Seccion'); ?></h2>
	<dl>
		<dt><?php echo __('Id Seccion'); ?></dt>
		<dd>
			<?php echo h($seccion['Seccion']['id_seccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($seccion['Seccion']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seccion'), array('action' => 'edit', $seccion['Seccion']['id_seccion'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seccion'), array('action' => 'delete', $seccion['Seccion']['id_seccion']), null, __('Are you sure you want to delete # %s?', $seccion['Seccion']['id_seccion'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seccions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seccion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grados Secciones'), array('controller' => 'grados_secciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grados Seccione'), array('controller' => 'grados_secciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Grados Secciones'); ?></h3>
	<?php if (!empty($seccion['GradosSeccione'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Grado Id'); ?></th>
		<th><?php echo __('Seccion Id'); ?></th>
		<th><?php echo __('Cupos'); ?></th>
		<th><?php echo __('Cupos Asignados'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($seccion['GradosSeccione'] as $gradosSeccione): ?>
		<tr>
			<td><?php echo $gradosSeccione['id']; ?></td>
			<td><?php echo $gradosSeccione['grado_id']; ?></td>
			<td><?php echo $gradosSeccione['seccion_id']; ?></td>
			<td><?php echo $gradosSeccione['cupos']; ?></td>
			<td><?php echo $gradosSeccione['cupos_asignados']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'grados_secciones', 'action' => 'view', $gradosSeccione['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'grados_secciones', 'action' => 'edit', $gradosSeccione['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'grados_secciones', 'action' => 'delete', $gradosSeccione['id']), null, __('Are you sure you want to delete # %s?', $gradosSeccione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Grados Seccione'), array('controller' => 'grados_secciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
