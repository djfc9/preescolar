
<div class="alumnosNormas view">
<h2><?php echo __('Alumnos Norma'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alumnosNorma['AlumnosNorma']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alumno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosNorma['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $alumnosNorma['Alumno']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Norma'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosNorma['Norma']['nombre'], array('controller' => 'normas', 'action' => 'view', $alumnosNorma['Norma']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
<div style='float: right'>
    <?php echo $this->Form->postLink(__('Denegar Norma'), array('action' => 'delete', $alumnosNorma['AlumnosNorma']['id']), null, __('Are you sure you want to delete # %s?', $alumnosNorma['AlumnosNorma']['id'])); ?>
</div>
</div>

