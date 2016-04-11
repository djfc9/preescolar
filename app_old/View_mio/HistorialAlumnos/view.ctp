
<div class="historialAlumnos view">
<h2><?php echo __('Historial Alumno'); ?></h2>
	<dl>
		<dt><?php echo __('Id Historia'); ?></dt>
		<dd>
			<?php echo h($historialAlumno['HistorialAlumno']['id_historia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alumno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($historialAlumno['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $historialAlumno['Alumno']['id_alumno'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($historialAlumno['HistorialAlumno']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Historial Alumno'), array('action' => 'edit', $historialAlumno['HistorialAlumno']['id_historia'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Historial Alumno'), array('action' => 'delete', $historialAlumno['HistorialAlumno']['id_historia']), null, __('Are you sure you want to delete # %s?', $historialAlumno['HistorialAlumno']['id_historia'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Historial Alumnos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial Alumno'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
