<div class="tipoPersonas form">
<?php echo $this->Form->create('TipoPersona'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipo Persona'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TipoPersona.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TipoPersona.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipo Personas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Autorizados Alumnos'), array('controller' => 'autorizados_alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Autorizados Alumno'), array('controller' => 'autorizados_alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
