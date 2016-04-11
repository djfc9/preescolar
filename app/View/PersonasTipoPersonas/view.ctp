<div class="personasTipoPersonas view">
<h2><?php echo __('Personas Tipo Persona'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($personasTipoPersona['PersonasTipoPersona']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Persona'); ?></dt>
		<dd>
			<?php echo $this->Html->link($personasTipoPersona['TipoPersona']['descripcion'], array('controller' => 'tipo_personas', 'action' => 'view', $personasTipoPersona['TipoPersona']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Persona'); ?></dt>
		<dd>
			<?php echo $this->Html->link($personasTipoPersona['Persona']['nombre'], array('controller' => 'personas', 'action' => 'view', $personasTipoPersona['Persona']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Personas Tipo Persona'), array('action' => 'edit', $personasTipoPersona['PersonasTipoPersona']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Personas Tipo Persona'), array('action' => 'delete', $personasTipoPersona['PersonasTipoPersona']['id']), null, __('Are you sure you want to delete # %s?', $personasTipoPersona['PersonasTipoPersona']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas Tipo Personas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Personas Tipo Persona'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Personas'), array('controller' => 'tipo_personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Persona'), array('controller' => 'tipo_personas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
