<div class="contenido_principal">
	<h2><?php echo __('Boletas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo 'Nro'; ?></th>
			<th><?php echo 'Alumnos'; ?></th>
                        <th><?php echo 'Evaluación'; ?></th>
                        <th><?php echo 'Componentes Amb'; ?></th>
			<th><?php echo 'created'; ?></th>
			<th><?php echo 'lapsos'; ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $i = 1; foreach ($boletas as $boleta): ?>
	<tr>
                <td><?php echo $i++; ?>&nbsp;</td>
		<td><?php echo $boleta['0']['nombre']." ".$boleta['0']['apellido']; ?>&nbsp;</td>
                <td style="width: 60px;"><?php echo $boleta['0']['calificacion']; ?>&nbsp;</td>
                <td style="width: 60px;"><?php echo $boleta['0']['componentes_ambiente']; ?>&nbsp;</td>
		<td><?php echo $boleta['0']['created']; ?>&nbsp;</td>
		<td><?php echo $boleta['0']['lapsos']; ?>&nbsp;</td>
		<td class="action">
                     <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                            'url'=>array('action' => 'view', $boleta['0']['id']))); ?>
	            <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar','title'=>'Editar',
                            'url'=>array('action' => 'edit', $boleta['0']['id']))); ?>
                    
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>


