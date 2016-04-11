
<div class="contenido_principal">
    <fieldset><legend><?php echo __('Grados y Secciones'); ?></legend>
	<table style='width :863px;' cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('grado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('seccion_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cupos'); ?></th>
			<th><?php echo $this->Paginator->sort('cupos_asignados'); ?></th>
                        <th><?php echo "Cupos Disponibles"; ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($gradosSecciones as $gradosSeccione): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($gradosSeccione['Grado']['descripcion'], array('controller' => 'grados', 'action' => 'view', $gradosSeccione['Grado']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gradosSeccione['Seccion']['descripcion'], array('controller' => 'seccions', 'action' => 'view', $gradosSeccione['Seccion']['id'])); ?>
		</td>
		<td><?php echo $cupos = h($gradosSeccione['GradosSeccione']['cupos']); ?>&nbsp;</td>
		<td><?php echo $asignados = h($gradosSeccione['GradosSeccione']['cupos_asignados']); ?>&nbsp;</td>
                <td><?php $disponibles = $cupos - $asignados; echo $disponibles; ?>&nbsp;</td>
		<td class="actions1">
                        <?php //echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver', 'url'=>array('action' => 'view', $gradosSeccione['GradosSeccione']['id']))); ?>
                                <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Editar', 'alt'=>'Editar', 'url'=>array('action' => 'edit', $gradosSeccione['GradosSeccione']['id']))); ?>
			<?php echo $this->Form->postLink(
$this->Html->image('eliminar.png',
 array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Eliminar', 'alt'=>'Eliminar')), array('action' => 'delete', $gradosSeccione['GradosSeccione']['id']), array('escape'=> false, 'confirm' => __('Seguro desea eliminar esta Sección # %s?', $gradosSeccione['GradosSeccione']['id']))); ?>
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
