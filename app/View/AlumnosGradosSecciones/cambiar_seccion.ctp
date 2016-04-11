<div class="contenido_principal">
<?php echo $this->Form->create('AlumnosGradosSeccione'); ?>
  <?  ?>
	<fieldset>
		<legend><?php echo __('Inscripción de Estudiantes'); ?></legend>
                
                <div id="contenedor-principal">
 <table style='width :863px;' ><tr><td>
     
	<?php
        echo "<div style='float: left'>";
        echo $this->Form->input('alumno_id', array('style'=>'width: 150px;'));
        //echo debug($grado_y_seccion_actual);
        echo $this->Form->input('actual', array('value'=>$grado_y_seccion_actual['GradosSeccione']['id'], 'type'=>'hidden'));
        echo "</td><td>";
        echo "Grado y Seccion Actual: <font color='blue'>".$grado_y_seccion_actual['GradosSeccione']['descripcion']."</font>";
                ?>
        </td></tr>
 </table>
                 <table>
                    <tr><td>
                    <?php
                    echo $this->Form->input('grados_seccione_id', array('label'=>'Grado y Secci&oacute;n', 'style'=>'width: 250px;', 'type'=>'select', 'empty'=>'Seleccione', 'required'));
                    echo "<div id='cupos_disponibles' style='width: 200px;'></div></td><td>";
                    echo $this->Form->input('Alumno.estatu_id', array('label'=>'Estatus de inscripción', 'empty'=>'Seleccione', 'style'=>'width: 250px;'));
                    echo "</td><td>"; 
                    echo $this->Form->input('AlumnosGradosSeccione.ano_escolar', array('value'=>$ano_escolar, 'readonly'=>TRUE)); 
                    echo "</td><td></td></tr>";
                    

                    
                         
	?>
                </table>
<div class="clear"></div>
</div>

                 
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>


