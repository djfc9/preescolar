<div class="tipoProblemaNacimientos view">
<h2><?php echo __('Tipo Problema Nacimiento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoProblemaNacimiento['TipoProblemaNacimiento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tipoProblemaNacimiento['TipoProblemaNacimiento']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipo Problema Nacimiento'), array('action' => 'edit', $tipoProblemaNacimiento['TipoProblemaNacimiento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipo Problema Nacimiento'), array('action' => 'delete', $tipoProblemaNacimiento['TipoProblemaNacimiento']['id']), null, __('Are you sure you want to delete # %s?', $tipoProblemaNacimiento['TipoProblemaNacimiento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Problema Nacimientos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Problema Nacimiento'), array('action' => 'add')); ?> </li>
	</ul>
</div>
