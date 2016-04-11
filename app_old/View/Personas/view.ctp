<?php $sesion = $this->Session->read('Auth'); 
 $usuario = $sesion['User']['id'];
 //echo debug($persona);
?>
<div class="contenido_principal">
    <fieldset> 
        <legend>Datos Personales</legend>
<!--<h2><?php  ?></h2>-->
	
        <div style="float: left;"> 
   <table>
           <tr><td class="negritas"><?php echo __('Nombre'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Persona']['nombre']); ?></td>
           </tr>
           <tr><td class="negritas"><?php echo __('Apellido'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Persona']['apellido']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Cedula'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Persona']['cedula']); ?></td></tr>
         
           <tr><td class="negritas"><?php echo __('Telefono Movil'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Persona']['telefono_movil']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Telefono Local'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Persona']['telefono_local']); ?></td></tr>
           
           <tr><td class="negritas"><?php echo __('Telefono Trabajo'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Persona']['telefono_trabajo']); ?></td></tr>

           <tr><td class="negritas"><?php echo __('Sexo'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Sexo']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Estado'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Estado']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Municipio'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Municipio']['nombre']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Parroquia'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Parroquia']['nombre']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Direccion'); ?></td>
               
           <td style="width: 450px;">&nbsp;&nbsp;<?php echo h($persona['Persona']['direccion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Parentesco'); ?></td>
               
               <td>&nbsp;&nbsp;<?php $tipoP =$persona['TipoPersona'];
               if(empty($tipoP)){
                   echo "No especificado";
                   } 
                   else {
                       echo $parentesco = h($persona['TipoPersona']['0']['descripcion']);
                   }  ?></td></tr>
           <tr><td class="negritas"><?php echo __('Representante'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Persona']['representante']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Autorizado'); ?></td>
               
            <td>&nbsp;&nbsp;<?php echo h($persona['Persona']['autorizado']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Cargo'); ?></td>
               
           <td>&nbsp;&nbsp;<?php echo h($persona['Cargo']['nombre']); ?></td></tr>
          </td>
   </table>
</div>
        <div class="flotando1">
            
            <?php if(!empty($persona['Persona']['foto']))
                {
            
                echo $this->Html->image("/img/persona/foto/". $persona['Persona']['foto'], array('class'=>'foto_ficha')); 
            }
            else
            {
                 echo $this->Html->image("imagen_user.jpg", array('class'=>'foto_ficha'));
                // echo "<p align='center' style='width:150px; margin-top: 0px;'>Cambie su Foto.</p>";
            }?> 
            <?php echo $this->Html->image('editar.png', array('url'=>array('action'=>'edit',  base64_encode($usuario)), 'width'=>'60px;', 'heigth'=>'60px;', 'style'=>'margin-top: 1px;', 'title'=>'Editar', 'alt'=>'editar')); ?>
        </div> 
            

</fieldset> 
			


<div class="related">
<fieldset><legend><?php echo __('Alumnos Representados'); ?></legend>
	<?php if (!empty($persona['Alumno'])){ ?>
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
                                <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;',
                                    'alt'=>'Ver','title'=>'Ver', 'url'=>array('controller' => 'alumnos', 'action' => 'view', base64_encode($alumno['id'])))); ?>
                                <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;',
                                    'title'=>'Editar', 'alt'=>'Editar', 'url'=>array('controller' => 'alumnos', 'action' => 'edit', base64_encode($alumno['id'])))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
   
<?php }else {
    echo "<br></br><div>Usted no tiene alumnos registrados <br> <br> ";
     //echo $this->Html->image('agregar-usuarios.png', array('class'=>'botones_superiores', 'title'=>'Registrar Alumno', 'width'=>'60px;', 'heigth'=>'60px;', 'url'=> array('controller'=>'Alumnos', 'action'=>'add', $id_per)));
     echo "</div>";
} ?>
</fieldset></div></div>
	