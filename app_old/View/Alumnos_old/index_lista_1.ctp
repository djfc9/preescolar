
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cédula_escolar'); ?></th>
                        <th><?php echo $this->Paginator->sort('nombre'); ?></th>
                        <th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('ingreso'); ?></th>
			<th><?php echo $this->Paginator->sort('telf habitacion'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
       
	<?php foreach ($alumnos as $alumno): 
            
            ?>
	<tr>
		<td><?php echo h($alumno['Alumno']['cedula_escolar']); ?>&nbsp;</td>
                <td><?php echo h($alumno['Alumno']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['fecha_ingreso']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['telefono_habitacion']); ?>&nbsp;</td>
		<td class="actionss">
                    
                    <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                            'url'=>array('action' => 'view', base64_encode($alumno['Alumno']['id'])))); ?>
	            <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar','title'=>'Editar',
                            'url'=>array('action' => 'edit', base64_encode($alumno['Alumno']['id'])))); ?>
                    <?php echo $this->Html->image('editar_todo.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar Todo','title'=>'Editar Todo',
                            'url'=>array('action' => 'edit_all', base64_encode($alumno['Alumno']['id'])))); ?>
		    <?php echo $this->Form->postLink(
                            $this->Html->image('eliminar.png',
                                        array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Eliminar', 'alt'=>'Eliminar')),
                                        array('action' => 'delete', $alumno['Alumno']['id']),
                                        array('escape'=> false, 'confirm' => 
                                            __('¿Esta seguro que quiere eliminar este Alumno?', $alumno['Alumno']['id']))); ?>
		</td>
	</tr>
        
<?php endforeach; ?>
	</table>


