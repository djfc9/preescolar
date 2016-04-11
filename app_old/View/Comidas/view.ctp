<div class="comidas view">
<h2><?php echo __('Comida'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comida['Comida']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sopa'); ?></dt>
		<dd>
			<?php echo h($comida['Comida']['sopa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seco'); ?></dt>
		<dd>
			<?php echo h($comida['Comida']['seco']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Jugo'); ?></dt>
		<dd>
			<?php echo h($comida['Comida']['jugo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fruta'); ?></dt>
		<dd>
			<?php echo h($comida['Comida']['fruta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Merienda'); ?></dt>
		<dd>
			<?php echo h($comida['Comida']['merienda']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comida'), array('action' => 'edit', $comida['Comida']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comida'), array('action' => 'delete', $comida['Comida']['id']), array(), __('Are you sure you want to delete # %s?', $comida['Comida']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comidas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comida'), array('action' => 'add')); ?> </li>
	</ul>
</div>
