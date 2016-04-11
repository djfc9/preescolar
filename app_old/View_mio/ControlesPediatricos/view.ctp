<div class="controlesPediatricos view">
<h2><?php echo __('Controles Pediatrico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($controlesPediatrico['ControlesPediatrico']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($controlesPediatrico['ControlesPediatrico']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagnostico'); ?></dt>
		<dd>
			<?php echo h($controlesPediatrico['ControlesPediatrico']['diagnostico']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Controles Pediatrico'), array('action' => 'edit', $controlesPediatrico['ControlesPediatrico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Controles Pediatrico'), array('action' => 'delete', $controlesPediatrico['ControlesPediatrico']['id']), null, __('Are you sure you want to delete # %s?', $controlesPediatrico['ControlesPediatrico']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Controles Pediatricos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Controles Pediatrico'), array('action' => 'add')); ?> </li>
	</ul>
</div>
