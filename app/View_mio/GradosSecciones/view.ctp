
<div class="gradosSecciones view">
<h2><?php echo __('Grados Seccione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gradosSeccione['GradosSeccione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gradosSeccione['Grado']['descripcion'], array('controller' => 'grados', 'action' => 'view', $gradosSeccione['Grado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seccion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gradosSeccione['Seccion']['descripcion'], array('controller' => 'seccions', 'action' => 'view', $gradosSeccione['Seccion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cupos'); ?></dt>
		<dd>
			<?php echo h($gradosSeccione['GradosSeccione']['cupos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cupos Asignados'); ?></dt>
		<dd>
			<?php echo h($gradosSeccione['GradosSeccione']['cupos_asignados']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Grados Seccione'), array('action' => 'edit', $gradosSeccione['GradosSeccione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Grados Seccione'), array('action' => 'delete', $gradosSeccione['GradosSeccione']['id']), null, __('Are you sure you want to delete # %s?', $gradosSeccione['GradosSeccione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Grados Secciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grados Seccione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grados'), array('controller' => 'grados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grado'), array('controller' => 'grados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seccions'), array('controller' => 'seccions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seccion'), array('controller' => 'seccions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Alumnos'); ?></h3>
	<?php if (!empty($gradosSeccione['Alumno'])): ?>
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
		<th><?php echo __('Grado Id'); ?></th>
		<th><?php echo __('Seccion Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($gradosSeccione['Alumno'] as $alumno): ?>
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
			<td><?php echo $alumno['grado_id']; ?></td>
			<td><?php echo $alumno['seccion_id']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Personas'); ?></h3>
	<?php if (!empty($gradosSeccione['Persona'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
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
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Representante'); ?></th>
		<th><?php echo __('Autorizado'); ?></th>
		<th><?php echo __('Tipo Persona Id'); ?></th>
		<th><?php echo __('Mimetype'); ?></th>
		<th><?php echo __('Dir'); ?></th>
		<th><?php echo __('Filesize'); ?></th>
		<th><?php echo __('Vive Con El Niño'); ?></th>
		<th><?php echo __('Profesion'); ?></th>
		<th><?php echo __('Nucleo Familiar Ref'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($gradosSeccione['Persona'] as $persona): ?>
		<tr>
			<td><?php echo $persona['id']; ?></td>
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
			<td><?php echo $persona['user_id']; ?></td>
			<td><?php echo $persona['representante']; ?></td>
			<td><?php echo $persona['autorizado']; ?></td>
			<td><?php echo $persona['tipo_persona_id']; ?></td>
			<td><?php echo $persona['mimetype']; ?></td>
			<td><?php echo $persona['dir']; ?></td>
			<td><?php echo $persona['filesize']; ?></td>
			<td><?php echo $persona['vive_con_el_niño']; ?></td>
			<td><?php echo $persona['profesion']; ?></td>
			<td><?php echo $persona['nucleo_familiar_ref']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'personas', 'action' => 'view', $persona['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'personas', 'action' => 'edit', $persona['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'personas', 'action' => 'delete', $persona['id']), null, __('Are you sure you want to delete # %s?', $persona['id'])); ?>
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
