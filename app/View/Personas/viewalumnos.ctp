
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

	<?php $i=0; if (!empty($persona['Alumno'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('C.I. Escolar'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Apellido'); ?></th>
                <th><?php echo __('Nacimiento'); ?></th>
		<th><?php echo __('Ingreso'); ?></th>
                <th><?php echo __('Estatus'); ?></th>
		<th><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($persona['Alumno'] as $alumno): 
            $estatus = $alumno['estatu_id'];
            if($estatus != 5){
            
            ?>
		<tr>
			<td><?php echo $alumno['cedula_escolar']; ?></td>
			<td><?php echo $alumno['nombre']; ?></td>
                        <td><?php echo $alumno['apellido']; ?></td>
                        <td><?php echo $alumno['fecha_nacimiento']; ?></td>
			<td><?php echo $alumno['fecha_ingreso']; ?></td>
                        <td><?php  if($estatus ==1){echo "Preinscrito";}else{echo "Inscrito";}  ?></td>
                        <td>
                                <?php echo $this->Html->image('buscar.png',
                                        array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                                            'url'=>array('controller' => 'alumnos', 'action' => 'view', base64_encode($alumno['id'])))); ?>
                                <?php echo $this->Html->image('editar.png',
                                        array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Editar', 'alt'=>'Editar',
                                            'url'=>array('controller' => 'alumnos', 'action' => 'edit', base64_encode($alumno['id'])))); ?>  
                                <?php echo $this->Html->image('boletas.png',
                                        array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Descargar Boletines', 'alt'=>'Boletines',
                                            'url'=>array('controller' => 'alumnos', 'action' => 'boletines', base64_encode($alumno['id'])))); ?>    

                            <?php 
                                if($estatus == 2){ 
                                     //inscrito
                             echo $this->Form->input('acciones_rep_'.$i++,array('options'=>array(
                                '/preescolar/alumnos/c_estudio/'.$alumno['id']=>'Constancia de estudios',
                                '/preescolar/alumnos/c_inscripcion/'.$alumno['id']=>'Constancia de inscripcion',
                                '/preescolar/alumnos/c_conducta/'.$alumno['id']=>'Constancia de conducta',
                                //'/preescolar/alumnos/c_asistencia/'.$alumno['id']=>'Constancia de asistencia diaria',
                                '/preescolar/alumnos/c_ced_escolar/'.$alumno['id']=>'Constancia de cédula escolar',
                                '/preescolar/alumnos/c_solvencia/'.$alumno['id']=>'Constancia de solvencia',
                                 '/preescolar/alumnos/c_horario/'.$alumno['id']=>'Constancia de Horario',
                                 '/preescolar/alumnos/c_direccion/'.$alumno['id']=>'Constancia de Direccion'),
                                 'empty'=>'Seleccione','label'=>false, 'style'=>'width: 120px;')); 
                                }elseif($estatus == 3){
                                    //reinscrito
                                    echo $this->Form->input('acciones_rep_'.$i++,array('options'=>array(
                                '/preescolar/alumnos/c_estudio/'.$alumno['id']=>'Constancia de estudios',
                                '/preescolar/alumnos/c_inscripcion/'.$alumno['id']=>'Constancia de inscripcion',
                                '/preescolar/alumnos/c_conducta/'.$alumno['id']=>'Constancia de conducta',
                                //'/preescolar/alumnos/c_asistencia/'.$alumno['id']=>'Constancia de asistencia diaria',
                                '/preescolar/alumnos/c_ced_escolar/'.$alumno['id']=>'Constancia de cédula escolar',
                                '/preescolar/alumnos/c_solvencia/'.$alumno['id']=>'Constancia de solvencia',
                                 '/preescolar/alumnos/c_horario/'.$alumno['id']=>'Constancia de Horario',
                                 '/preescolar/alumnos/c_direccion/'.$alumno['id']=>'Constancia de Direccion'),
                                 'empty'=>'Seleccione','label'=>false, 'style'=>'width: 120px;'));
                                }
                                else{
                                //retirado
                            echo $this->Form->input('acciones_rep_'.$i++,array('type'=>'select','options'=>array(
                                '/preescolar/alumnos/c_conducta/'.$alumno['id']=>'Constancia de conducta',
                                '/preescolar/alumnos/c_ced_escolar/'.$alumno['id']=>'Constancia de cédula escolar',
                                '/preescolar/alumnos/c_solvencia/'.$alumno['id']=>'Constancia de solvencia',
                                '/preescolar/alumnos/c_retiro/'.$alumno['id']=>'Constancia de retiro'),
                                'empty'=>'Seleccione','label'=>false, 'style'=>'width: 120px;'));
                                }
?>
 
                        </td>
		</tr>
            <?php }  endforeach; ?>
	</table>
</fieldset>
</div>


    <br><br><br>
	
  <?php endif; 
  
  } ?>


