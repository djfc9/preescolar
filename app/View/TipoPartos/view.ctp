<div class="tipoPartos view">
<h2><?php echo __('Tipo Parto'); ?></h2>
	<dl>
		<dt><?php echo __('Id Tipo Parto'); ?></dt>
		<dd>
			<?php echo h($tipoParto['TipoParto']['id_tipo_parto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tipoParto['TipoParto']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipo Parto'), array('action' => 'edit', $tipoParto['TipoParto']['id_tipo_parto'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipo Parto'), array('action' => 'delete', $tipoParto['TipoParto']['id_tipo_parto']), null, __('Are you sure you want to delete # %s?', $tipoParto['TipoParto']['id_tipo_parto'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Partos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Parto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saluds'), array('controller' => 'saluds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salud'), array('controller' => 'saluds', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Saluds'); ?></h3>
	<?php if (!empty($tipoParto['Salud'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id Salud'); ?></th>
		<th><?php echo __('Alumno Id'); ?></th>
		<th><?php echo __('Tipo Parto Id'); ?></th>
		<th><?php echo __('Tipo Problema Nacer Id'); ?></th>
		<th><?php echo __('Problema Aprendizaje Id'); ?></th>
		<th><?php echo __('Control Prenatal'); ?></th>
		<th><?php echo __('Respiro Lloro Nacer'); ?></th>
		<th><?php echo __('Peso Nacer'); ?></th>
		<th><?php echo __('Talla Nacer'); ?></th>
		<th><?php echo __('Alergico'); ?></th>
		<th><?php echo __('Enfermedad Padecida'); ?></th>
		<th><?php echo __('Poliza Seguros'); ?></th>
		<th><?php echo __('Medicamento Fiebre'); ?></th>
		<th><?php echo __('Grupo Sanguineo'); ?></th>
		<th><?php echo __('Tratamiento Prob Aprendizaje'); ?></th>
		<th><?php echo __('Control Pediatrico Id'); ?></th>
		<th><?php echo __('Complicacion Embarazo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipoParto['Salud'] as $salud): ?>
		<tr>
			<td><?php echo $salud['id_salud']; ?></td>
			<td><?php echo $salud['alumno_id']; ?></td>
			<td><?php echo $salud['tipo_parto_id']; ?></td>
			<td><?php echo $salud['tipo_problema_nacer_id']; ?></td>
			<td><?php echo $salud['problema_aprendizaje_id']; ?></td>
			<td><?php echo $salud['control_prenatal']; ?></td>
			<td><?php echo $salud['respiro_lloro_nacer']; ?></td>
			<td><?php echo $salud['peso_nacer']; ?></td>
			<td><?php echo $salud['talla_nacer']; ?></td>
			<td><?php echo $salud['alergico']; ?></td>
			<td><?php echo $salud['enfermedad_padecida']; ?></td>
			<td><?php echo $salud['poliza_seguros']; ?></td>
			<td><?php echo $salud['medicamento_fiebre']; ?></td>
			<td><?php echo $salud['grupo_sanguineo']; ?></td>
			<td><?php echo $salud['tratamiento_prob_aprendizaje']; ?></td>
			<td><?php echo $salud['control_pediatrico_id']; ?></td>
			<td><?php echo $salud['complicacion_embarazo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'saluds', 'action' => 'view', $salud['id_salud'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'saluds', 'action' => 'edit', $salud['id_salud'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'saluds', 'action' => 'delete', $salud['id_salud']), null, __('Are you sure you want to delete # %s?', $salud['id_salud'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Salud'), array('controller' => 'saluds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
