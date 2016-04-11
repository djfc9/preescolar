
<div class="contenido_principal">
<?php echo $this->Form->create('Alumno'); ?>
  <? //  echo debug($alumno); ?>
	<fieldset>
		<legend><?php echo __('Inscripción de Estudiantes'); ?></legend>
                
                <div id="contenedor-principal">
 <table style='width :863px;' ><tr><td>
     
	<?php
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula_escolar', array('style'=>'width: 150px;' ,'placeholder'=>'Ejm. 11209568332', 'autofocus'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'img_busqueda1'));
        echo "</div><div id='contenido1'>";

        echo "</div>";
                ?>
        </td></tr>
 </table>
                 <table>
                    <tr><td>
                    <?php
                    echo $this->Form->input('GradosSeccione', array('label'=>'Grado y Secci&oacute;n', 'style'=>'width: 250px;', 'type'=>'select', 'empty'=>'Seleccione', 'required'));
                    echo "<div id='cupos_disponibles' style='width: 200px;'></div></td><td>";
                    /*$options = array('1' => 'Si', '2' => 'No');
                                    $attributes = array('legend' => false, 'required');
                                    echo $this->Form->radio('caso_especial', $options, $attributes);*/
                    echo $this->Form->input('caso_especial');
                    echo "</td><td><div id= 'motivo_casos_especial' style='display: none;'>";
                    echo $this->Form->input('motivo_caso_especial', array('label'=>'Motivo del caso especial'));
                    echo"</div></td></tr><tr><td>";
                    echo $this->Form->input('estatu_id', array('label'=>'Estatus de inscripción', 'empty'=>'Seleccione', 'style'=>'width: 250px;'));
                    echo "</td><td></td><td></td></tr>";
                    echo $this->Form->input('AlumnosGradosSeccione.ano_escolar', array('value'=>$ano_escolar));

                    
                         
	?>
                </table>
<div class="clear"></div>
</div>

                 
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

