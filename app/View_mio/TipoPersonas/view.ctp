<div class="tipoPersonas view">
<h2><?php echo __('Tipo Persona'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoPersona['TipoPersona']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tipoPersona['TipoPersona']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipo Persona'), array('action' => 'edit', $tipoPersona['TipoPersona']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipo Persona'), array('action' => 'delete', $tipoPersona['TipoPersona']['id']), null, __('Are you sure you want to delete # %s?', $tipoPersona['TipoPersona']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Personas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Persona'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autorizados Alumnos'), array('controller' => 'autorizados_alumnos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Autorizados Alumno'), array('controller' => 'autorizados_alumnos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Autorizados Alumnos'); ?></h3>
	<?php if (!empty($tipoPersona['AutorizadosAlumno'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Alumno Id'); ?></th>
		<th><?php echo __('Tipo Persona Id'); ?></th>
		<th><?php echo __('Persona Id'); ?></th>
		<th><?php echo __('Representante'); ?></th>
		<th><?php echo __('Autorizado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipoPersona['AutorizadosAlumno'] as $autorizadosAlumno): ?>
		<tr>
			<td><?php echo $autorizadosAlumno['id']; ?></td>
			<td><?php echo $autorizadosAlumno['alumno_id']; ?></td>
			<td><?php echo $autorizadosAlumno['tipo_persona_id']; ?></td>
			<td><?php echo $autorizadosAlumno['persona_id']; ?></td>
			<td><?php echo $autorizadosAlumno['representante']; ?></td>
			<td><?php echo $autorizadosAlumno['autorizado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'autorizados_alumnos', 'action' => 'view', $autorizadosAlumno['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'autorizados_alumnos', 'action' => 'edit', $autorizadosAlumno['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'autorizados_alumnos', 'action' => 'delete', $autorizadosAlumno['id']), null, __('Are you sure you want to delete # %s?', $autorizadosAlumno['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Autorizados Alumno'), array('controller' => 'autorizados_alumnos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
