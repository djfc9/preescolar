<div class="alumnosPersonas view">
<h2><?php echo __('Alumnos Persona'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alumnosPersona['AlumnosPersona']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Persona'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosPersona['Persona']['cedula'], array('controller' => 'personas', 'action' => 'view', $alumnosPersona['Persona']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alumno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosPersona['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $alumnosPersona['Alumno']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alumnos Persona'), array('action' => 'edit', $alumnosPersona['AlumnosPersona']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alumnos Persona'), array('action' => 'delete', $alumnosPersona['AlumnosPersona']['id']), null, __('Are you sure you want to delete # %s?', $alumnosPersona['AlumnosPersona']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos Personas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Persona'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
