<div class="contenido_principal">
    <fieldset> 
        <legend>Datos del Alumno</legend>
        <div style="float: left;"> 
   <table>
           <tr><td><?php echo __('Cedula Escolar:'); ?></td>
               
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['cedula_escolar']); ?></td>
           </tr>
           <tr><td><?php echo __('Fecha Nacimiento:'); ?></td>
               
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['fecha_nacimiento']); ?></td></tr>
           <tr><td><?php echo __('Lugar Nacimiento:'); ?></td>
               
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['lugar_nacimiento']); ?></td></tr>
         
           <tr><td><?php echo __('Primer Nombre'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['nombre']); ?></td></tr>
           <tr><td><?php echo __('Segundo Nombre'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['segundo_nombre']); ?></td></tr>
           <tr><td><?php echo __('Primer Apellido'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['apellido']); ?></td></tr>
           <tr><td><?php echo __('Segundo Apellido'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['segundo_apellido']); ?></td></tr>
           <tr><td><?php echo __('Fecha Ingreso:'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['fecha_ingreso']); ?></td></tr>
           <tr><td><?php echo __('Direccion:'); ?></td>
           <td style="width: 450px;" class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['direccion']); ?></td></tr> 
           <tr><td><?php echo __('Telefono Habitacion:'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['telefono_habitacion']); ?></td></tr>
           <tr><td><?php echo __('Peso:'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['peso']); ?></td></tr>
           <tr><td><?php echo __('Talla:'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Alumno']['talla']); ?></td></tr>
           <tr><td><?php echo __('Estado:'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Estado']['descripcion']); ?></td></tr>

           <tr><td><?php echo __('Municipio'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Municipio']['nombre']); ?></td></tr>
           <tr><td><?php echo __('Parroquia'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Parroquia']['nombre']); ?></td></tr>
           <tr><td><?php echo __('Estado:'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Estado']['descripcion']); ?></td></tr>
        
           
           <tr><td><?php echo __('Sexo'); ?></td>
           <td class="negritas">&nbsp;&nbsp;<?php echo h($alumno['Sexo']['descripcion']); ?></td>
           </tr>
   </table>
</div>
        <div class="flotando1">
            <?php echo $this->Html->image("/img/alumno/foto/" . $alumno['Alumno']['foto'], array('class'=>'foto_ficha')); ?>  
            <?php echo $this->Html->image('editar.png', array('url'=>array('action'=>'edit',$alumno['Alumno']['id']), 'width'=>'60px;', 'heigth'=>'60px;', 'style'=>'margin-top: 1px;', 'title'=>'Editar', 'alt'=>'editar')); ?>
        </div> 
            

</fieldset> 
			
<div class="related">
    &nbsp;<br><br/>
	<h3><?php echo __('Ficha de Salud'); ?></h3>
	<?php if (!empty($alumno['Salud'])){ ?>
	<table cellpadding = "0" cellspacing = "0" style='width :903px;'>
	<tr>
		<th><?php echo __('Tipo Parto'); ?></th>
		<th><?php echo __('Problema Nacimiento'); ?></th>
                <th><?php echo __('Problema Aprendizaje'); ?></th>
                <th><?php echo __('Tratamiento Problema Aprendizaje'); ?></th>
		<th><?php echo __('Peso Nacer'); ?></th>
		<th><?php echo __('Talla Nacer'); ?></th>
		<th><?php echo __('Alergico'); ?></th>
		<th><?php echo __('Medicamento Fiebre'); ?></th>
		<th><?php echo __('Grupo Sanguineo'); ?></th>
              
		<th class='actions'>   &nbsp;<?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($alumno['Salud'] as $salud): ?>
        <?php //echo debug($ficha_salud);?>
        <?php 
        $ficha_salud['0']['TipoParto']['descripcion'];
        $ficha_salud['0']['TipoProblemaNacimiento']['descripcion'];
        $ficha_salud['0']['ProblemaAprendizaje']['descripion'];
        $ficha_salud['0']['ComplicacionEmbarazo']['nombre'];
        ?>
		<tr>

                        <td><?php  echo $ficha_salud['0']['TipoParto']['descripcion']; ?>&nbsp;</td>
			<td><?php echo $ficha_salud['0']['TipoProblemaNacimiento']['descripcion']; ?></td>
			<td><?php echo  $ficha_salud['0']['ProblemaAprendizaje']['descripion']; ?></td>
                        <td><?php echo $salud['tratamiento_prob_aprendizaje']; ?></td>
			<td><?php echo $salud['peso_nacer']; ?></td>
			<td><?php echo $salud['talla_nacer']; ?></td>
                        <?php if($salud['alergico'] == 0 ){
                          echo "<td> No.  </td>";  
                        }
                        else
                        {
                          echo "<td>" .$salud['alergico']. "</td>";   
                        }
                        ?>
			<td><?php echo $salud['medicamento_fiebre']; ?></td>
			<td><?php echo $salud['grupo_sanguineo']; ?></td>
			<td width='300'>
                            &nbsp;
                                <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver', 'url'=>array('controller'=>'saluds','action' => 'view', $salud['id']))); ?>
                                <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Editar', 'alt'=>'Editar', 'url'=>array('controller'=>'saluds', 'action' => 'edit', $salud['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
        
        <?php } else{
             ?>

<br>
 <?php echo $this->Html->image('Stethoscope.png', array('style'=>'width: 60px; heigth: 60px;','title'=>'Agregar ficha de salud','url'=>array('controller' => 'saluds', 'action' => 'add', $alumno['Alumno']['cedula_escolar']))); 
        } ?>
<br/>
</div>
<div class="related">
	<h3><?php echo __('Normas Aceptadas'); ?></h3>
	<?php if (!empty($alumno['Norma'])): ?>
	<table cellpadding = "0" cellspacing = "0" style='width :903px;'>
	<tr>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($alumno['Norma'] as $norma): ?>
		<tr>
			<td><?php echo $norma['nombre']; ?></td>
			<td width="150" >
                                <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','Denegar'=>'Ver', 'url'=>array('controller'=>'AlumnosNormas','action' => 'view', $norma['id']))); ?>
                                <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Editar', 'alt'=>'Editar', 'url'=>array('controller'=>'AlumnosNormas', 'action' => 'edit', $norma['id']))); ?>
                        </td></tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
</div> <!-- cierre del div principal -->