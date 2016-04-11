<div class="alumnosProblemasAprendizajes view">
<h2><?php echo __('Alumnos Problemas Aprendizaje'); ?></h2>
	<dl>
		<dt><?php echo __('Id Alum Aprendi Problema'); ?></dt>
		<dd>
			<?php echo h($alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Problema Aprendizaje'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosProblemasAprendizaje['ProblemaAprendizaje']['descripion'], array('controller' => 'problema_aprendizajes', 'action' => 'view', $alumnosProblemasAprendizaje['ProblemaAprendizaje']['id_problema_aprendizaje'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alumno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosProblemasAprendizaje['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $alumnosProblemasAprendizaje['Alumno']['id_alumno'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alumnos Problemas Aprendizaje'), array('action' => 'edit', $alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alumnos Problemas Aprendizaje'), array('action' => 'delete', $alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema']), null, __('Are you sure you want to delete # %s?', $alumnosProblemasAprendizaje['AlumnosProblemasAprendizaje']['id_alum_aprendi_problema'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos Problemas Aprendizajes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Problemas Aprendizaje'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problema Aprendizajes'), array('controller' => 'problema_aprendizajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problema Aprendizaje'), array('controller' => 'problema_aprendizajes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
