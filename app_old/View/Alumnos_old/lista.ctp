<div class="contenido_principal">
    <fieldset><legend><?php echo __('Listado de Alumnos'); ?></legend>
<div id='buscador_caja'>
<div class="flotados5">
    <?php
        echo $this->Form->input('AlumnoCedulaEscolar', array('style'=>'width: 150px;', 'label'=>'Cedula Escolar','placeholder'=>'Ejm. 11209568332'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('buscar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busqueda_lista'));
        ?></div></div>
<br>


        <div id="actual" style="display: block;">
	<table cellpadding="0" cellspacing="0">
	<tr>
                        <th><?php echo $this->Paginator->sort('cedula_escolar'); ?></th>
                        <th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('peso'); ?></th>
			<th><?php echo $this->Paginator->sort('talla'); ?></th>
			<th><?php echo $this->Paginator->sort('sexo_id'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($alumnos as $alumno): ?>
	<tr>
                <td><?php echo h($alumno['Alumno']['cedula_escolar']); ?>&nbsp;</td>
                <td><?php echo h($alumno['Alumno']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['telefono_habitacion']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['peso']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['talla']); ?>&nbsp;</td>
		<td>
			<?php echo h($alumno['Sexo']['descripcion']); ?>
		</td>
		<td class="actionsss">
			 <?php echo $this->Html->image('buscar.png', array('width'=>'60px;','class'=>'acciones', 'heigth'=>'60px;', 'alt'=>'Ver','title'=>'Ver', 'url'=>array('action' => 'view', $alumno['Alumno']['id']))); ?>
                         <?php echo $this->Html->image('PatientFile.png', array('width'=>'60px;','class'=>'acciones', 'heigth'=>'60px;','title'=>'Ficha de Salud', 'alt'=>'Ficha de Salud', 'url'=>array('controller' => 'saluds', 'action' => 'view', $alumno['Alumno']['id']))); ?>
                         <?php echo $this->Html->image('historia_medica.png', array('title'=>'Historia Medica','class'=>'acciones','width'=>'60px;', 'heigth'=>'60px;', 'alt'=>'Historia Medica', 'url'=>array('controller' => 'fichas', 'action' => 'view', $alumno['Alumno']['id']))); ?>
                         <?php echo $this->Html->image('Stethoscope.png', array('width'=>'60px;', 'class'=>'acciones','heigth'=>'60px;','title'=>'Registrar Nuevo Caso', 'alt'=>'Registrar Nuevo Caso', 'url'=>array('controller' => 'fichas', 'action' => 'add', $alumno['Alumno']['id']))); ?>
                                
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
    </fieldset>	
        <div id='informacion'></div>
</div>


