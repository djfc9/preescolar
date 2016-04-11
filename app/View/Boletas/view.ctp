<div class="contenido_principal">
<h2><?php echo __('Boleta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($boleta['Boleta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calificacion'); ?></dt>
		<dd>
			<?php echo h($boleta['Boleta']['calificacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Componentes Ambiente'); ?></dt>
		<dd>
			<?php echo h($boleta['Boleta']['componentes_ambiente']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Año Escolar'); ?></dt>
		<dd>
			<?php echo h($boleta['Boleta']['ano_escolar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($boleta['Boleta']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lapsos'); ?></dt>
		<dd>
			<?php echo h($boleta['Boleta']['lapsos']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

