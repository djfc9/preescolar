
<div class="contenido_principal">
	<h2><?php echo __('Personas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('cedula'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono_movil'); ?></th>
			<th><?php echo $this->Paginator->sort('sexo_id'); ?>&nbsp;</th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('representante'); ?></th>
			<th><?php echo $this->Paginator->sort('autorizado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($personas as $persona): ?>
	<tr>
		<td><?php echo h($persona['Persona']['id']); ?>&nbsp;</td>
		<td><?php echo h($persona['Persona']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($persona['Persona']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($persona['Persona']['cedula']); ?>&nbsp;</td>
		<td><?php echo h($persona['Persona']['telefono_movil']); ?>&nbsp;</td>
		<td>
			<?php echo h($persona['Sexo']['descripcion']); ?>
		&nbsp;&nbsp;&nbsp;
                </td>
		<td>
			<?php echo $this->Html->link($persona['User']['id'], array('controller' => 'users', 'action' => 'view', $persona['User']['id'])); ?>
		</td>
		<td><?php echo h($persona['Persona']['representante']); ?>&nbsp;</td>
		<td><?php echo h($persona['Persona']['autorizado']); ?>&nbsp;</td>
		<td class="actionsss">
			<?php /*echo $this->Html->link(__('View'), array('action' => 'view', base64_encode($persona['User']['id']))); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', base64_encode($persona['User']['id']))); ?>
                        <?php echo $this->Html->link(__('Edit all'), array('action' => 'edit_all', base64_encode($persona['User']['id']))); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', base64_encode($persona['User']['id'])), null,
                                __('Are you sure you want to delete # %s?', base64_encode($persona['User']['id'])));*/ ?>
                    
                    <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                            'url'=>array('action' => 'view', base64_encode($persona['User']['id'])))); ?>
	            <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar','title'=>'Editar',
                            'url'=>array('action' => 'edit', base64_encode($persona['User']['id'])))); ?>
                    <?php echo $this->Html->image('editar_todo.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar Todo','title'=>'Editar Todo',
                            'url'=>array('action' => 'edit_1', base64_encode($persona['User']['id'])))); ?>
		    <?php echo $this->Form->postLink(
                            $this->Html->image('eliminar.png',
                                        array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Eliminar', 'alt'=>'Eliminar')),
                                        array('action' => 'delete', base64_encode($persona['User']['id'])),
                                        array('escape'=> false, 'confirm' => 
                                            __('¿Esta seguro que quiere eliminar este Usuario?', base64_encode($persona['User']['id'])))); ?>

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

