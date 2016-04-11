
<div class="contenido_principal">
    <fieldset> 
        <legend>Normas aceptadas</legend>
	<dl>
		<dt><?php echo __('Alumno'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosNorma['Alumno']['nombre'].' '.$alumnosNorma['Alumno']['apellido'],
                                array('controller' => 'alumnos', 'action' => 'view', $alumnosNorma['Alumno']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Norma'); ?></dt>
		<dd>
			<?php echo $alumnosNorma['Norma']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
<div style='float: right'>   
        <?php echo $this->Form->postLink(
$this->Html->image('eliminar.png',
 array('width'=>'60px;', 'heigth'=>'60px;','title'=>'Eliminar', 'alt'=>'Eliminar')),
  array('action' => 'delete', $alumnosNorma['AlumnosNorma']['id']),
                array('escape'=> false, 'confirm' => __('¿Esta seguro que quiere eliminar esta autorización?', $alumnosNorma['AlumnosNorma']['id']))); ?>
		
</div>
    </fieldset>
</div>

