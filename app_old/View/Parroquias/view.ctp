<div class="parroquias view">
<h2><?php echo __('Parroquia'); ?></h2>
	<dl>
		<dt><?php echo __('Id Parroquia'); ?></dt>
		<dd>
			<?php echo h($parroquia['Parroquia']['id_parroquia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($parroquia['Parroquia']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($parroquia['Estado']['descripcion'], array('controller' => 'estados', 'action' => 'view', $parroquia['Estado']['id_estado'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Municipio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($parroquia['Municipio']['nombre'], array('controller' => 'municipios', 'action' => 'view', $parroquia['Municipio']['id_municipio'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Parroquia'), array('action' => 'edit', $parroquia['Parroquia']['id_parroquia'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Parroquia'), array('action' => 'delete', $parroquia['Parroquia']['id_parroquia']), null, __('Are you sure you want to delete # %s?', $parroquia['Parroquia']['id_parroquia'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parroquias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parroquia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Municipios'), array('controller' => 'municipios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Municipio'), array('controller' => 'municipios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Personas'); ?></h3>
	<?php if (!empty($parroquia['Persona'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id Persona'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Cedula'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Telefono Movil'); ?></th>
		<th><?php echo __('Telefono Local'); ?></th>
		<th><?php echo __('Telefono Trabajo'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Municipio Id'); ?></th>
		<th><?php echo __('Parroquia Id'); ?></th>
		<th><?php echo __('Sexo Id'); ?></th>
		<th><?php echo __('Foto'); ?></th>
		<th><?php echo __('Cargo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parroquia['Persona'] as $persona): ?>
		<tr>
			<td><?php echo $persona['id_persona']; ?></td>
			<td><?php echo $persona['nombre']; ?></td>
			<td><?php echo $persona['apellido']; ?></td>
			<td><?php echo $persona['cedula']; ?></td>
			<td><?php echo $persona['direccion']; ?></td>
			<td><?php echo $persona['telefono_movil']; ?></td>
			<td><?php echo $persona['telefono_local']; ?></td>
			<td><?php echo $persona['telefono_trabajo']; ?></td>
			<td><?php echo $persona['estado_id']; ?></td>
			<td><?php echo $persona['municipio_id']; ?></td>
			<td><?php echo $persona['parroquia_id']; ?></td>
			<td><?php echo $persona['sexo_id']; ?></td>
			<td><?php echo $persona['foto']; ?></td>
			<td><?php echo $persona['cargo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'personas', 'action' => 'view', $persona['id_persona'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'personas', 'action' => 'edit', $persona['id_persona'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'personas', 'action' => 'delete', $persona['id_persona']), null, __('Are you sure you want to delete # %s?', $persona['id_persona'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
