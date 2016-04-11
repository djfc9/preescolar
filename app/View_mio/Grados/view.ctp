
<div class="grados view">
<h2><?php echo __('Grado'); ?></h2>
	<dl>
		<dt><?php echo __('Id Grado'); ?></dt>
		<dd>
			<?php echo h($grado['Grado']['id_grado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($grado['Grado']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Grado'), array('action' => 'edit', $grado['Grado']['id_grado'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Grado'), array('action' => 'delete', $grado['Grado']['id_grado']), null, __('Are you sure you want to delete # %s?', $grado['Grado']['id_grado'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Grados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grado'), array('action' => 'add')); ?> </li>
	</ul>
</div>
