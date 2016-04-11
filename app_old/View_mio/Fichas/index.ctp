
<div class="contenido_principal">
    <fieldset><legend><?php echo __('Listado de Casos M&eacute;dicos.'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('medicamentos'); ?></th>
			<th><?php echo $this->Paginator->sort('diagnostico'); ?></th>
                        <th><?php echo $this->Paginator->sort('referido'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($fichas as $ficha): ?>
	<tr>
		<td><?php echo h($ficha['Ficha']['created']); ?>&nbsp;</td>
		<td><?php echo h($ficha['Ficha']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($ficha['Ficha']['medicamentos']); ?>&nbsp;</td>
		<td><?php echo h($ficha['Ficha']['diagnostico']); ?>&nbsp;</td>
                <td><?php echo h($ficha['Ficha']['referido']); ?>&nbsp;</td>
		<td class="actionssss">
		<?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver', 'url'=>array( 'action' => 'view', $ficha['Ficha']['id']))); ?>
                <?php echo $this->Html->image('pdf_report.png', array('width'=>'40px;', 'heigth'=>'40px;','target' => '_blank','title'=>'Imprimir', 'alt'=>'Imprimir', 'url'=>array('action' => 'viewpdf', $ficha['Ficha']['id']))); ?>
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
        </fieldset>
</div>

