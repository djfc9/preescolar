<div class="estados view">
<h2><?php echo __('Estado'); ?></h2>
	<dl>
		<dt><?php echo __('Id Estado'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['id_estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estado'), array('action' => 'edit', $estado['Estado']['id_estado'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estado'), array('action' => 'delete', $estado['Estado']['id_estado']), null, __('Are you sure you want to delete # %s?', $estado['Estado']['id_estado'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Municipios'), array('controller' => 'municipios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Municipio'), array('controller' => 'municipios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parroquias'), array('controller' => 'parroquias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parroquia'), array('controller' => 'parroquias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Municipios'); ?></h3>
	<?php if (!empty($estado['Municipio'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id Municipio'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($estado['Municipio'] as $municipio): ?>
		<tr>
			<td><?php echo $municipio['id_municipio']; ?></td>
			<td><?php echo $municipio['nombre']; ?></td>
			<td><?php echo $municipio['estado_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'municipios', 'action' => 'view', $municipio['id_municipio'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'municipios', 'action' => 'edit', $municipio['id_municipio'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'municipios', 'action' => 'delete', $municipio['id_municipio']), null, __('Are you sure you want to delete # %s?', $municipio['id_municipio'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Municipio'), array('controller' => 'municipios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Parroquias'); ?></h3>
	<?php if (!empty($estado['Parroquia'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id Parroquia'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Municipio Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($estado['Parroquia'] as $parroquia): ?>
		<tr>
			<td><?php echo $parroquia['id_parroquia']; ?></td>
			<td><?php echo $parroquia['nombre']; ?></td>
			<td><?php echo $parroquia['estado_id']; ?></td>
			<td><?php echo $parroquia['municipio_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'parroquias', 'action' => 'view', $parroquia['id_parroquia'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'parroquias', 'action' => 'edit', $parroquia['id_parroquia'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'parroquias', 'action' => 'delete', $parroquia['id_parroquia']), null, __('Are you sure you want to delete # %s?', $parroquia['id_parroquia'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Parroquia'), array('controller' => 'parroquias', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Personas'); ?></h3>
	<?php if (!empty($estado['Persona'])): ?>
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
	<?php foreach ($estado['Persona'] as $persona): ?>
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
