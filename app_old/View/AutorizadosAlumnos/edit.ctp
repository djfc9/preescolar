<div class="autorizadosAlumnos form">
<?php echo $this->Form->create('AutorizadosAlumno'); ?>
	<fieldset>
		<legend><?php echo __('Edit Autorizados Alumno'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('alumno_id');
		echo $this->Form->input('tipo_persona_id');
		echo $this->Form->input('persona_id');
		echo $this->Form->input('representante');
		echo $this->Form->input('autorizado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AutorizadosAlumno.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AutorizadosAlumno.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Autorizados Alumnos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Personas'), array('controller' => 'tipo_personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Persona'), array('controller' => 'tipo_personas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
