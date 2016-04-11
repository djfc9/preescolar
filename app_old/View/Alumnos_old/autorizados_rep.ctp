<div style="float: right">
<?php echo $this->Html->image('pdf.png', array('class'=>'botones_superiores', 
    'title'=>'Imprimir Reporte','width'=>'52px;', 'heigth'=>'72px;','url'=>array('action'=>'autorizadoss_pdf', $id)));
 ?>
</div>
<div class="autorizados list">
    <h3 align="center"><?php echo __('Listado de Autorizados:'); ?></h3>
	<table cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="4" border='2' bordercolor="blue"><h2 id='diferencia1' align='center'>Datos del Alumno</h2></td>
                <td></td>
                <td colspan="4" border='2' bordercolor="blue"><h2 id='diferencia1' align='center'>Datos del Autorizado</h2></td>
            </tr>
	<tr> 
			<th id='diferencia2'><?php echo "Nombre"; ?></th>
                        <th id='diferencia2'><?php echo "Apellido"; ?></th>
                        <th id='diferencia2'><?php echo "Cédula Escolar"; ?></th>
                        <th id='diferencia2'><?php echo "Teléfono Habitación"; ?></th>
                        <td>&nbsp;</td>
                        <th id='diferencia3'><?php echo "Nombre"; ?></th>
			<th id='diferencia3'><?php echo "Apellido"; ?></th>
                        <th id='diferencia3'><?php echo "Cédula"; ?></th>
                        <th id='diferencia3'><?php echo "Teléfono"; ?></th>
	</tr>
	<?php
        $ci2 = $alumnos['0']['Alumno']['cedula_escolar'];
        $i =1;
        foreach ($alumnos as $person): 
        ?> 
            <?php  if(!empty($person['Persona'])) {
                       $autorizados = $person['Persona'];
                        foreach ($autorizados as  $autorizado):
                            
        $ci = $person['Alumno']['cedula_escolar'];
        if($ci2 != $ci){
            $i = $i+1;
            $ci2 = $person['Alumno']['cedula_escolar'];
        }
        ////obtener los numeros pares////
        if (($i % 2) == 0) { $color = "#FFF;";}else{$color = "#CEE0E2;";}              
                           
            ?>
        <tr style=" background-color: <?php echo $color; ?> ">
                <td><?php echo h( $person['Alumno']['nombre']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo h( $person['Alumno']['apellido']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo h( $person['Alumno']['cedula_escolar']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo h( $person['Alumno']['telefono_habitacion']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>&nbsp;</td>
                
                <td><?php echo h( $autorizado['nombre']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>	
                <td><?php echo h( $autorizado['apellido']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>	
		<td><?php echo h( $autorizado['cedula']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo h( $autorizado['telefono_movil']); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <?php  endforeach; } ?>

        <?php endforeach; ?>
	</table>

</div>

