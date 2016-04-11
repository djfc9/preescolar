
<div class="alumnosGradosSecciones view">
<h2><?php echo __('Alumnos Grados Seccione'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alumnosGradosSeccione['AlumnosGradosSeccione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alumno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosGradosSeccione['Alumno']['nombre'], array('controller' => 'alumnos', 'action' => 'view', $alumnosGradosSeccione['Alumno']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grados Seccione'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosGradosSeccione['GradosSeccione']['id'], array('controller' => 'grados_secciones', 'action' => 'view', $alumnosGradosSeccione['GradosSeccione']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alumnos Grados Seccione'), array('action' => 'edit', $alumnosGradosSeccione['AlumnosGradosSeccione']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alumnos Grados Seccione'), array('action' => 'delete', $alumnosGradosSeccione['AlumnosGradosSeccione']['id']), null, __('Are you sure you want to delete # %s?', $alumnosGradosSeccione['AlumnosGradosSeccione']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos Grados Secciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Grados Seccione'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grados Secciones'), array('controller' => 'grados_secciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grados Seccione'), array('controller' => 'grados_secciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
