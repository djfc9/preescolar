
<div class="normas view">
<h2><?php echo __('Norma'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($norma['Norma']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($norma['Norma']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Norma'), array('action' => 'edit', $norma['Norma']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Norma'), array('action' => 'delete', $norma['Norma']['id']), null, __('Are you sure you want to delete # %s?', $norma['Norma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Normas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Norma'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Alumnos'); ?></h3>
	<?php if (!empty($norma['Alumno'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cedula Escolar'); ?></th>
		<th><?php echo __('Fecha Nacimiento'); ?></th>
		<th><?php echo __('Lugar Nacimiento'); ?></th>
		<th><?php echo __('Fecha Ingreso'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Telefono Habitacion'); ?></th>
		<th><?php echo __('Peso'); ?></th>
		<th><?php echo __('Talla'); ?></th>
		<th><?php echo __('Codigoestado'); ?></th>
		<th><?php echo __('Codigomunicipio'); ?></th>
		<th><?php echo __('Codigoparroquia'); ?></th>
		<th><?php echo __('Grados Secciones Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Id Alumno'); ?></th>
		<th><?php echo __('Estatu Id'); ?></th>
		<th><?php echo __('Foto'); ?></th>
		<th><?php echo __('Sexo Id'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($norma['Alumno'] as $alumno): ?>
		<tr>
			<td><?php echo $alumno['cedula_escolar']; ?></td>
			<td><?php echo $alumno['fecha_nacimiento']; ?></td>
			<td><?php echo $alumno['lugar_nacimiento']; ?></td>
			<td><?php echo $alumno['fecha_ingreso']; ?></td>
			<td><?php echo $alumno['direccion']; ?></td>
			<td><?php echo $alumno['telefono_habitacion']; ?></td>
			<td><?php echo $alumno['peso']; ?></td>
			<td><?php echo $alumno['talla']; ?></td>
			<td><?php echo $alumno['codigoestado']; ?></td>
			<td><?php echo $alumno['codigomunicipio']; ?></td>
			<td><?php echo $alumno['codigoparroquia']; ?></td>
			<td><?php echo $alumno['grados_secciones_id']; ?></td>
			<td><?php echo $alumno['nombre']; ?></td>
			<td><?php echo $alumno['apellido']; ?></td>
			<td><?php echo $alumno['id_alumno']; ?></td>
			<td><?php echo $alumno['estatu_id']; ?></td>
			<td><?php echo $alumno['foto']; ?></td>
			<td><?php echo $alumno['sexo_id']; ?></td>
			<td><?php echo $alumno['telefono']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'alumnos', 'action' => 'view', $alumno['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'alumnos', 'action' => 'edit', $alumno['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'alumnos', 'action' => 'delete', $alumno['id']), null, __('Are you sure you want to delete # %s?', $alumno['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
