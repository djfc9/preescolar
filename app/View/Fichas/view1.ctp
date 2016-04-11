
<div class="fichas view">
<h2><?php echo __('Ficha Medica'); ?></h2>
	<dl>
		<dt><?php echo __('Fecha'); ?></dt>
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
			<?php echo h($ficha['Alumno']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

