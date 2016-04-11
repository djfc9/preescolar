
<div class="alumnos view">
<!--<h2><?php //echo __('Alumno'); ?></h2> -->
    <fieldset>
        <legend>Datos del Alumno</legend>
    


   <table>
           <tr style ="width :10px;"><td><?php echo __('Cedula Escolar:'); ?></td>
           <td><?php echo h($alumno['Alumno']['cedula_escolar']); ?></td>
           <td width='35' rowspan='3'>
            <div  id="flotando1" width="30" rowspan="3" >
            <?php echo $this->Html->image("./alumno/foto/" . $alumno['Alumno']['foto'], array('class'=>'foto_ficha')); ?>  
            </div>   
           </td>
           </tr>
           <tr><td><?php echo __('Fecha Nacimiento:'); ?></td>
           <td><?php echo h($alumno['Alumno']['fecha_nacimiento']); ?></td></tr>
           <tr><td><?php echo __('Lugar Nacimiento:'); ?></td>
           <td><?php echo h($alumno['Alumno']['lugar_nacimiento']); ?></td></tr>
           <tr><td><?php echo __('Nombre'); ?></td>
           <td><?php echo h($alumno['Alumno']['nombre']); ?></td></tr>
           <tr><td><?php echo __('Apellido'); ?></td>
           <td><?php echo h($alumno['Alumno']['apellido']); ?></td></tr>
           <tr><td><?php echo __('Telefono Habitacion:'); ?></td>
           <td><?php echo h($alumno['Alumno']['telefono_habitacion']); ?></td></tr>

           <tr><td><?php echo __('Peso:'); ?></td>
           <td><?php echo h($alumno['Alumno']['peso']); ?></td></tr>
           <tr><td><?php echo __('Talla:'); ?></td>
           <td><?php echo h($alumno['Alumno']['talla']); ?></td></tr>
           <tr><td><?php echo __('Estado:'); ?></td>
           <td><?php echo h($alumno['Estado']['descripcion']); ?></td></tr>
           <tr><td><?php echo __('Sexo'); ?></td>
           <td><?php echo $this->Html->link($alumno['Sexo']['descripcion'], array('controller' => 'sexos', 'action' => 'view', $alumno['Sexo']['id'])); ?></td></tr>
          </td>
   </table>
        </fieldset>
</div>

<div class="related">
    &nbsp;<br><br/>
    <fieldset>
	<legend>Ficha de Salud</legend>
	<?php if (!empty($alumno['Salud'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
 <?php foreach ($alumno['Salud'] as $salud): ?>
          <?php 
        $ficha_salud['0']['TipoParto']['descripcion'];
        $ficha_salud['0']['TipoProblemaNacimiento']['descripcion'];
        $ficha_salud['0']['ProblemaAprendizaje']['descripion'];
        $ficha_salud['0']['ComplicacionEmbarazo']['nombre'];
        ?>  
		<td><?php echo __('Tipo Parto Id'); ?></td>
                <td><?php  echo $ficha_salud['0']['TipoParto']['descripcion']; ?>&nbsp;</td>
		<td><?php echo __('Problema Nacimiento'); ?></td>
                <td><?php echo $ficha_salud['0']['TipoProblemaNacimiento']['descripcion']; ?></td>
                <td><?php echo __('Problema Aprendizaje'); ?></td>
                <td><?php echo  $ficha_salud['0']['ProblemaAprendizaje']['descripion']; ?></td>
                <td><?php echo __('Tratamiento Problema Aprendizaje'); ?></td>
                <td><?php echo $salud['tratamiento_prob_aprendizaje']; ?></td>
		<td><?php echo __('Control Prenatal'); ?></td>
                 <?php if($salud['control_prenatal'] == 1 ){
                          echo "<td> Si.  </td>";  
                        }
                        else
                        {
                          echo "<td> No.  </td>";   
                        }
                        ?>
		<td><?php echo __('Respiro Lloro Nacer'); ?></td>
                
                        <?php if($salud['respiro_lloro_nacer'] == 1 ){
                          echo "<td> Si.  </td>";  
                        }
                        else
                        {
                          echo "<td> No.  </td>";   
                        }
                        ?>
		<td><?php echo __('Peso Nacer'); ?></td>
                <td><?php echo $salud['peso_nacer']; ?></td>
		<td><?php echo __('Talla Nacer'); ?></td>
                <td><?php echo $salud['talla_nacer']; ?></td>
		<td><?php echo __('Alergico'); ?></td>
                  <?php if($salud['alergico'] == 0 ){
                          echo "<td> No.  </td>";  
                        }
                        else
                        {
                          echo "<td>" .$salud['alergico']. "</td>";   
                        }
                        ?>
		<td><?php echo __('Enfermedad Padecida'); ?></td>
                <td><?php echo $salud['enfermedad_padecida']; ?></td>
		<td><?php echo __('Poliza Seguros'); ?></td>
                <td><?php echo $salud['poliza_seguros']; ?></td>
		<td><?php echo __('Medicamento Fiebre'); ?></td>
                
			<td><?php echo $salud['medicamento_fiebre']; ?></td>
		<td><?php echo __('Grupo Sanguineo'); ?></td>
                <td><?php echo $salud['grupo_sanguineo']; ?></td>
		<td><?php echo __('Control Pediatrico'); ?></td>
                <td><?php echo $salud['control_pediatrico']; ?>&nbsp;</td>
		<td><?php echo __('Complicacion Embarazo'); ?></td>
                <td><?php echo $ficha_salud['0']['ComplicacionEmbarazo']['nombre']; ?></td>
		
	</tr>

	<?php endforeach; ?>
	</table>
        </fielset>
<?php endif; ?>

<br><br/>
</div>
