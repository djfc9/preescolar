<div class="contenido_principal">
        <fieldset>
	<legend><?php echo __('Eventos'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($eventos as $evento): ?>
	<tr>
		<td><?php echo h($evento['Evento']['id']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['created']); ?>&nbsp;</td>
		<td>
                    <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                            'url'=>array('action' => 'view', base64_encode($evento['Evento']['id'])))); ?>
	            <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar','title'=>'Editar',
                            'url'=>array('action' => 'edit', base64_encode($evento['Evento']['id'])))); ?>
		    <?php echo $this->Form->postLink(
                            $this->Html->image('eliminar.png',
                                        array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Eliminar', 'alt'=>'Eliminar')),
                                        array('action' => 'delete', $evento['Evento']['id']),
                                        array('escape'=> false, 'confirm' => 
                                            __('¿Seguro quiere elimiar este Evento?', $evento['Evento']['id']))); ?>
                </td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
        </fieldset>
</div>

