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
	</tr>
	</thead>
	<tbody>
	<?php foreach ($comidas as $comida): ?>
	<tr>
		<td><?php echo h($comida['Comida']['sopa']); ?>&nbsp;</td>
		<td><?php echo h($comida['Comida']['seco']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo h($comida['Comida']['jugo']); ?>&nbsp;</td>
		<td><?php echo h($comida['Comida']['fruta']); ?>&nbsp;&nbsp;</td>
		<td><?php echo h($comida['Comida']['merienda']); ?>&nbsp;</td>
                <td><?php echo h($comida['Comida']['created']); ?>&nbsp;</td>
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

