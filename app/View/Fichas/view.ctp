
<div class="fichas view">
<h2><?php echo __('Caso M&eacute;dico'); ?></h2>
	<dl>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ficha['Ficha']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($ficha['Ficha']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medicamentos'); ?></dt>
		<dd>
			<?php echo h($ficha['Ficha']['medicamentos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagnostico'); ?></dt>
		<dd>
			<?php echo h($ficha['Ficha']['diagnostico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referido'); ?></dt>
		<dd>
			<?php echo h($ficha['Ficha']['referido']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Alumno'); ?></dt>
		<dd> 
                        <?php if (!empty($ficha['Alumno'])): ?>
                        <?php foreach ($ficha['Alumno'] as $alumno): ?>
			<?php echo $this->Html->link($alumno['nombre']." ".$alumno['apellido'], array('controller'=>'alumnos', 'action'=>'view', $alumno['id'] )); ?>
			&nbsp;
		</dd>
	</dl>
</div>


	<?php endforeach; ?>
<?php endif; ?>


