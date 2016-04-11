<div class="evaluacions view">
<h2><?php echo __('Evaluacion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evaluacion['Evaluacion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignatura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluacion['Asignatura']['nombre'], array('controller' => 'asignaturas', 'action' => 'view', $evaluacion['Asignatura']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($evaluacion['Evaluacion']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resultado'); ?></dt>
		<dd>
			<?php echo h($evaluacion['Evaluacion']['resultado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenido'); ?></dt>
		<dd>
			<?php echo h($evaluacion['Evaluacion']['contenido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tema'); ?></dt>
		<dd>
			<?php echo h($evaluacion['Evaluacion']['tema']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evaluacion'), array('action' => 'edit', $evaluacion['Evaluacion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evaluacion'), array('action' => 'delete', $evaluacion['Evaluacion']['id']), null, __('Are you sure you want to delete # %s?', $evaluacion['Evaluacion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluacions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluacion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Alumnos'); ?></h3>
	<?php if (!empty($evaluacion['Alumno'])): ?>
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
		<th><?php echo __('Grados Secciones Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Estatu Id'); ?></th>
		<th><?php echo __('Foto'); ?></th>
		<th><?php echo __('Sexo Id'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Municipio Id'); ?></th>
		<th><?php echo __('Parroquia Id'); ?></th>
		<th><?php echo __('Mimetype'); ?></th>
		<th><?php echo __('Dir'); ?></th>
		<th><?php echo __('Filesize'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($evaluacion['Alumno'] as $alumno): ?>
		<tr>
			<td><?php echo $alumno['cedula_escolar']; ?></td>
			<td><?php echo $alumno['fecha_nacimiento']; ?></td>
			<td><?php echo $alumno['lugar_nacimiento']; ?></td>
			<td><?php echo $alumno['fecha_ingreso']; ?></td>
			<td><?php echo $alumno['direccion']; ?></td>
			<td><?php echo $alumno['telefono_habitacion']; ?></td>
			<td><?php echo $alumno['peso']; ?></td>
			<td><?php echo $alumno['talla']; ?></td>
			<td><?php echo $alumno['grados_secciones_id']; ?></td>
			<td><?php echo $alumno['nombre']; ?></td>
			<td><?php echo $alumno['apellido']; ?></td>
			<td><?php echo $alumno['id']; ?></td>
			<td><?php echo $alumno['estatu_id']; ?></td>
			<td><?php echo $alumno['foto']; ?></td>
			<td><?php echo $alumno['sexo_id']; ?></td>
			<td><?php echo $alumno['estado_id']; ?></td>
			<td><?php echo $alumno['municipio_id']; ?></td>
			<td><?php echo $alumno['parroquia_id']; ?></td>
			<td><?php echo $alumno['mimetype']; ?></td>
			<td><?php echo $alumno['dir']; ?></td>
			<td><?php echo $alumno['filesize']; ?></td>
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
