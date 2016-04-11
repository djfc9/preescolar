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
            <?php echo $this->Html->image('editar.png', array('url'=>array('action'=>'edit',  base64_encode($alumno['Alumno']['id'])),
                'width'=>'60px;', 'heigth'=>'60px;', 'style'=>'margin-top: 1px;', 'title'=>'Editar', 'alt'=>'editar')); ?>
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
                                <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                                    'url'=>array('controller'=>'saluds','action' => 'view', base64_encode($salud['id'])))); ?>
                                <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Editar', 'alt'=>'Editar', 
                                    'url'=>array('controller'=>'saluds', 'action' => 'edit', base64_encode($salud['id'])))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
        
        <?php } else{
             ?>

<br>
 <?php echo $this->Html->image('Stethoscope.png', array('style'=>'width: 60px; heigth: 60px;','title'=>'Agregar ficha de salud',
     'url'=>array('controller' => 'saluds', 'action' => 'add', base64_encode($alumno['Alumno']['cedula_escolar'])))); 
        } ?>
<br/>
</div>
<div class="related">
	<h3><?php echo __('Acuerdos de Convivencia Aceptados');?></h3>
	<table cellpadding = "0" cellspacing = "0" style='width :903px;'>
	<tr>
		<th><?php echo __('Nombre'); ?></th>
                <th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Acciones'); ?></th>
	</tr>
		<tr>
                        <td><?php if($alumno['Alumno']['fotografias'] == true){
                          echo "Autorizo a la institución para publicar y difundir fotos de mi representado en medios digitales institucionales e impresos.";  
                        }else {
                          echo "No Autorizo a la institución para publicar y difundir fotos de mi representado en medios digitales institucionales e impresos de Ningun tipo.";  
                        } ?></td>
                        <td><?php if($alumno['Alumno']['viajes'] == true)
                            {
                                echo "Estoy de acuerdo en autorizar a mi representado a asistir a paseos y salidas.";
                            }
                            else
                            {
                                echo "No Estoy de acuerdo en autorizar a mi representado a asistir a paseos y salidas.";
                            }
                                ?></td>
			<td width="150" >
                                <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;', 
                                    'alt'=>'Editar', 'url'=>array('action' => 'edit_normas', base64_encode($alumno['Alumno']['id'])))); ?>
                                <?php //echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Editar', 'alt'=>'Editar', 'url'=>array('controller'=>'AlumnosNormas', 'action' => 'edit', base64_encode($norma['id'])))); ?>
                        </td>
                </tr>
	</table>


</div>
    <br>
<div class="related">
    <h3><?php  echo __('Historicos');?></h3>
       <?php  if (Date('m') >= 7 ) {
                     //Año escolar
                     $ano1=date("Y");
                     $ano2=date("Y")+1;
                     $ano_escolar=$ano1."-".$ano2;
                     }else {
                     //Año escolar
                     $ano1=date("Y")-1;
                     $ano2=date("Y");
                     $ano_escolar=$ano1."-".$ano2;
                     }
       if(!empty($alumno['GradosSeccione'])){ ?>
	<table cellpadding = "0" cellspacing = "0" style='width :903px;'>
	<tr>
		<th><?php echo __('Año Escolar'); ?></th>
                <th><?php echo __('Grado y Sección'); ?></th>
                <th><?php echo __('Inscrito'); ?></th>
		<th><?php echo __('Estatus'); ?></th>
	</tr>
                <?php 
                 foreach ($alumno['GradosSeccione'] as $gradosSeccione):
                     //echo debug($gradosSeccione);
                 ?>
		<tr>
                    <td><?php echo $gradosSeccione['ano_escolar']; ?></td>
                    <td><?php echo $gradosSeccione['descripcion']; ?></td>
                    <td><?php echo $gradosSeccione['AlumnosGradosSeccione']['created']; ?></td>
                    <td><?php if($gradosSeccione['ano_escolar'] < $ano_escolar){
                    echo $this->Html->image('ready.png', array('width'=>'30px;', 'heigth'=>'30px;', 'title'=>'Aprobado', 'alt'=>'Aprobado'));}
                    else{
                    echo $this->Html->image('process.png', array('width'=>'30px;', 'heigth'=>'30px;','title'=>'En Curso','alt'=>'En Curso'));    
                    }?></td>
                </tr>
                <?php endforeach; ?>
	</table>
        <?php } ?>

</div>
</div> <!-- cierre del div principal -->