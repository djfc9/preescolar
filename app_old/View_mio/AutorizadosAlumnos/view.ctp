<div class="autorizadosAlumnos view">
<h2><?php echo __('Autorizados Alumno'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($autorizadosAlumno['AutorizadosAlumno']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alumno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($autorizadosAlumno['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $autorizadosAlumno['Alumno']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Persona'); ?></dt>
		<dd>
			<?php echo $this->Html->link($autorizadosAlumno['TipoPersona']['descripcion'], array('controller' => 'tipo_personas', 'action' => 'view', $autorizadosAlumno['TipoPersona']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Persona'); ?></dt>
		<dd>
			<?php echo $this->Html->link($autorizadosAlumno['Persona']['cedula'], array('controller' => 'personas', 'action' => 'view', $autorizadosAlumno['Persona']['id_persona'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Representante'); ?></dt>
		<dd>
			<?php echo h($autorizadosAlumno['AutorizadosAlumno']['representante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Autorizado'); ?></dt>
		<dd>
			<?php echo h($autorizadosAlumno['AutorizadosAlumno']['autorizado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Autorizados Alumno'), array('action' => 'edit', $autorizadosAlumno['AutorizadosAlumno']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Autorizados Alumno'), array('action' => 'delete', $autorizadosAlumno['AutorizadosAlumno']['id']), null, __('Are you sure you want to delete # %s?', $autorizadosAlumno['AutorizadosAlumno']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Autorizados Alumnos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Autorizados Alumno'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Personas'), array('controller' => 'tipo_personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Persona'), array('controller' => 'tipo_personas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
