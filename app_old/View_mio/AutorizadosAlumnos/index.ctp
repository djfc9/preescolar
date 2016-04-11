<div class="autorizadosAlumnos index">
	<h2><?php echo __('Autorizados Alumnos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('alumno_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_persona_id'); ?></th>
			<th><?php echo $this->Paginator->sort('persona_id'); ?></th>
			<th><?php echo $this->Paginator->sort('representante'); ?></th>
			<th><?php echo $this->Paginator->sort('autorizado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($autorizadosAlumnos as $autorizadosAlumno): ?>
	<tr>
		<td><?php echo h($autorizadosAlumno['AutorizadosAlumno']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($autorizadosAlumno['Alumno']['cedula_escolar'], array('controller' => 'alumnos', 'action' => 'view', $autorizadosAlumno['Alumno']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($autorizadosAlumno['TipoPersona']['descripcion'], array('controller' => 'tipo_personas', 'action' => 'view', $autorizadosAlumno['TipoPersona']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($autorizadosAlumno['Persona']['cedula'], array('controller' => 'personas', 'action' => 'view', $autorizadosAlumno['Persona']['id_persona'])); ?>
		</td>
		<td><?php echo h($autorizadosAlumno['AutorizadosAlumno']['representante']); ?>&nbsp;</td>
		<td><?php echo h($autorizadosAlumno['AutorizadosAlumno']['autorizado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $autorizadosAlumno['AutorizadosAlumno']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $autorizadosAlumno['AutorizadosAlumno']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $autorizadosAlumno['AutorizadosAlumno']['id']), null, __('Are you sure you want to delete # %s?', $autorizadosAlumno['AutorizadosAlumno']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Autorizados Alumno'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('controller' => 'alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('controller' => 'alumnos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Personas'), array('controller' => 'tipo_personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Persona'), array('controller' => 'tipo_personas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
