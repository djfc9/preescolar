
<div class="contenido_principal">
    <?php
  //echo debug($persona);
   $id_per = $persona['Persona']['id'];
   $id_alumno =  $persona['Alumno'];
      
 if(empty($persona['Alumno']))
  {
     /* echo "<SCRIPT LANGUAGE='javascript'>
                    alert('Usted no tiene hijos Registrados');
                    document.location=('http://localhost/preescolar/alumnos/add/'.$id_per);
                    </SCRIPT>";*/
     echo "<br></br><div style='float: left'>Usted no tiene alumnos registrados <br> <br> ";
     //echo $this->Html->image('agregar-usuarios.png', array('class'=>'botones_superiores', 'title'=>'Registrar Alumno', 'width'=>'60px;', 'heigth'=>'60px;', 'url'=> array('controller'=>'Alumnos', 'action'=>'add', $id_per)));
     echo "</div><br><br>";
  }
  else
  {
      
?>

    <fieldset><legend><?php echo __('Alumnos Representados'); ?></legend>

	<?php if (!empty($persona['Alumno'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cedula Escolar'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Apellido'); ?></th>
                <th><?php echo __('Fecha Nacimiento'); ?></th>
		<th><?php echo __('Fecha Ingreso'); ?></th>
		<th><?php echo __('Estatus'); ?></th>
                <th width="20" ></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($persona['Alumno'] as $alumno): ?>
		<tr>
			<td><?php echo $alumno['cedula_escolar']; ?></td>
			<td><?php echo $alumno['nombre']; ?></td>
                        <td><?php echo $alumno['apellido']; ?></td>
                        <td><?php echo $alumno['fecha_nacimiento']; ?></td>
			<td><?php echo $alumno['fecha_ingreso']; ?></td>
                        <td><?php $estatus = $alumno['estatu_id']; if($estatus ==1){echo "Preinscrito";}else{echo "Inscrito";}  ?></td>
                        <td width="20" ></td>
			<td width="150" >
                                <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver', 'url'=>array('controller' => 'alumnos', 'action' => 'view', $alumno['id']))); ?>
                                <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Editar', 'alt'=>'Editar', 'url'=>array('controller' => 'alumnos', 'action' => 'edit', $alumno['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</fieldset>
</div>


    <br><br><br>
	
  <?php endif; 
  
  } ?>


