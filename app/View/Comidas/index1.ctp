<div class="contenido_principal">
	<fieldset>
		<legend><?php echo __('Menú de Comidas'); ?></legend>
	<table cellpadding="0" cellspacing="0" border='1'>
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('sopa'); ?></th>
			<th><?php echo $this->Paginator->sort('seco'); ?></th>
			<th><?php echo $this->Paginator->sort('jugo'); ?></th>
			<th><?php echo $this->Paginator->sort('fruta'); ?></th>
			<th><?php echo $this->Paginator->sort('merienda'); ?></th>
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($comidas as $comida): ?>
	<tr>
		<td><?php echo h($comida['Comida']['sopa']); ?>&nbsp;</td>
		<td><?php echo h($comida['Comida']['seco']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo h($comida['Comida']['jugo']); ?>&nbsp;</td>
		<td><?php echo h($comida['Comida']['fruta']); ?>&nbsp;</td>
		<td><?php echo h($comida['Comida']['merienda']); ?>&nbsp;</td>
                <td><?php echo h($comida['Comida']['created']); ?>&nbsp;</td>
		<td>
                        <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                            'url'=>array('action' => 'view', base64_encode($comida['Comida']['id'])))); ?>
	            <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar','title'=>'Editar',
                            'url'=>array('action' => 'edit', base64_encode($comida['Comida']['id'])))); ?>
		    <?php echo $this->Form->postLink(
                            $this->Html->image('eliminar.png',
                                        array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Eliminar', 'alt'=>'Eliminar')),
                                        array('action' => 'delete', $comida['Comida']['id']),
                                        array('escape'=> false, 'confirm' => 
                                            __('¿Seguro quiere elimiar este menú?', $comida['Comida']['id']))); ?>
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

