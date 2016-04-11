<div class="personasTipoPersonas index">
	<h2><?php echo __('Personas Tipo Personas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_persona_id'); ?></th>
			<th><?php echo $this->Paginator->sort('persona_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($personasTipoPersonas as $personasTipoPersona): ?>
	<tr>
		<td><?php echo h($personasTipoPersona['PersonasTipoPersona']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($personasTipoPersona['TipoPersona']['descripcion'], array('controller' => 'tipo_personas', 'action' => 'view', $personasTipoPersona['TipoPersona']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($personasTipoPersona['Persona']['nombre'], array('controller' => 'personas', 'action' => 'view', $personasTipoPersona['Persona']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $personasTipoPersona['PersonasTipoPersona']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $personasTipoPersona['PersonasTipoPersona']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $personasTipoPersona['PersonasTipoPersona']['id']), null, __('Are you sure you want to delete # %s?', $personasTipoPersona['PersonasTipoPersona']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Personas Tipo Persona'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipo Personas'), array('controller' => 'tipo_personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Persona'), array('controller' => 'tipo_personas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
