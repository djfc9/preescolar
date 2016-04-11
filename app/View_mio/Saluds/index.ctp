<div class="contenido_principal">
    <fieldset><legend><?php echo __('Fichas de Salud'); ?></legend>
	<table cellpadding="0" cellspacing="0">
	<tr>
                        
			<th><?php echo $this->Paginator->sort('alumnos'); ?> </th>
			<th><?php echo $this->Paginator->sort('peso al nacer'); ?> </th>
			<th><?php echo $this->Paginator->sort('talla al nacer'); ?> </th>
			<th><?php echo $this->Paginator->sort('alergico'); ?> </th>
			<th><?php echo $this->Paginator->sort('medicamento de fiebre'); ?> </th>
			<th><?php echo $this->Paginator->sort('grupo_sanguineo'); ?> </th>
                        <th><?php echo $this->Paginator->sort('poliza_seguros'); ?> </th>
			<th ><?php echo __('Acciones'); ?> </th>
	</tr>
	<?php foreach ($saluds as $salud): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($salud['Alumno']['nombre'], array('controller' => 'alumnos', 'action' => 'view', $salud['Alumno']['id'])); ?>
		</td>
		<td><?php echo h($salud['Salud']['peso_nacer']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo h($salud['Salud']['talla_nacer']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php if($salud['Salud']['alergico'] == 0 ){
                          echo "No. ";  
                        }
                        else
                        {
                          echo $salud['Salud']['alergico'];   
                        }
                        ?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo h($salud['Salud']['medicamento_fiebre']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo h($salud['Salud']['grupo_sanguineo']); ?>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo h($salud['Salud']['poliza_seguros']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td>
                        <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver', 'url'=>array('action' => 'view', $salud['Salud']['id']))); ?>
                        
			
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

