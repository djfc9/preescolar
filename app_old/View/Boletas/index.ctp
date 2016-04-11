<div class="contenido_principal">
	<h2><?php echo __('Boletas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('calificacion'); ?></th>
			<th><?php echo $this->Paginator->sort('recomendacion'); ?></th>
			<th><?php echo $this->Paginator->sort('ano_escolar'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('lapsos'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($boletas as $boleta): ?>
	<tr>
		<td><?php echo h($boleta['Boleta']['id']); ?>&nbsp;</td>
		<td><?php echo h($boleta['Boleta']['calificacion']); ?>&nbsp;</td>
		<td><?php echo h($boleta['Boleta']['recomendacion']); ?>&nbsp;</td>
		<td><?php echo h($boleta['Boleta']['ano_escolar']); ?>&nbsp;</td>
		<td><?php echo h($boleta['Boleta']['created']); ?>&nbsp;</td>
		<td><?php echo h($boleta['Boleta']['lapsos']); ?>&nbsp;</td>
		<td class="action">
                     <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                            'url'=>array('action' => 'view', $boleta['Boleta']['id']))); ?>
	            <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar','title'=>'Editar',
                            'url'=>array('action' => 'edit', $boleta['Boleta']['id']))); ?>
                    
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
</div>

