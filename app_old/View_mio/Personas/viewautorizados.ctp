
<div class="contenido_principal">
    <?php
  //echo debug($persona);
  /* $id_per = $persona['Persona']['id'];
   $id_alumno =  $persona['Alumno'];*/
      
 //if(empty($persona['Persona']))
 // {
     /* echo "<SCRIPT LANGUAGE='javascript'>
                    alert('Usted no tiene hijos Registrados');
                    document.location=('http://localhost/preescolar/alumnos/add/'.$id_per);
                    </SCRIPT>";*/
   //  echo "<br></br><div style='float: left'>Usted no tiene Autorizados Registrados<br> <br> ";
     //echo $this->Html->image('agregar-usuarios.png', array('class'=>'botones_superiores', 'title'=>'Registrar Alumno', 'width'=>'60px;', 'heigth'=>'60px;', 'url'=> array('controller'=>'Alumnos', 'action'=>'add', $id_per)));
    // echo "</div>";
  /*}
  else
  {*/
      
?>

    <fieldset><legend><?php echo __('Autorizados Registrados'); ?></legend>

	<?php if (!empty($persona)): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cedula'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Apellido'); ?></th>
                <th><?php echo __('telefono_movil'); ?></th>
		<th><?php echo __('telefono_local'); ?></th>
		<th><?php echo __('Parentesco'); ?></th>
                <th width="20" ></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($persona as $datos): ?>
		<tr>
                    
                    <td><?php echo $datos['Persona']['cedula']; ?>&nbsp;</td>
			<td><?php echo $datos['Persona']['nombre']; ?>&nbsp;</td>
                        <td><?php echo $datos['Persona']['apellido']; ?>&nbsp;</td>
                        <td><?php echo $datos['Persona']['telefono_movil']; ?>&nbsp;</td>
			<td><?php echo $datos['Persona']['telefono_local']; ?>&nbsp;</td>
                        <td><?php $parentesco = $datos['TipoPersona']; if(!empty($parentesco)){ echo $datos['TipoPersona']['0']['descripcion']; }else {echo "Sin especificar";}  ?></td>
                        <td width="20" ></td>
			<td width="150" >
                                <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver', 'url'=>array('controller' => 'personas', 'action' => 'view_ficha_autorizados', $datos['Persona']['id']))); ?>
                                <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Editar', 'alt'=>'Editar', 'url'=>array('controller' => 'personas', 'action' => 'edit_autorizados', $datos['Persona']['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</fieldset>
</div>


    <br><br><br>
	
  <?php endif; 
  
 /* } */?>


