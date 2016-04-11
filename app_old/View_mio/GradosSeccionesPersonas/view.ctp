<?php echo $this->Element('datos'); ?>
<div class="gradosSeccionesPersonas view">
<h2><?php echo __('Grados Secciones Persona'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gradosSeccionesPersona['GradosSeccionesPersona']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Persona'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gradosSeccionesPersona['Persona']['nombre'], array('controller' => 'personas', 'action' => 'view', $gradosSeccionesPersona['Persona']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grados Seccione Id'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gradosSeccionesPersona['GradosSeccionesPersona']['grados_seccione_id'], array('controller' => 'GradosSeccione', 'action' => 'view', $gradosSeccionesPersona['GradosSeccione']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<?php echo $gradosSeccionesPersona['GradosSeccione']['id']; ?>