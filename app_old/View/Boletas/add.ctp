<div class="contenido_principal" >
<?php echo $this->Form->create('Boleta');
if (Date('m') >= 7) {
            //Año escolar
            $ano1 = date("Y");
            $ano2 = date("Y") + 1;
            $ano_escolar = $ano1 . "-" . $ano2;
        } else {
            //Año escolar
            $ano1 = date("Y") - 1;
            $ano2 = date("Y");
            $ano_escolar = $ano1 . "-" . $ano2;
        }

?>
    
	<fieldset>
		<legend><?php echo __('Crear Boleta'); ?></legend>
                <table style='width :877px;'>
                    <tr><td colspan='3'>
     
	<?php
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula_escolar', array('style'=>'width: 150px;' ,'placeholder'=>'Ejm. 11209568332', 'autofocus','onkeypress'=>"return soloNumeros(event)"));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'img_busqueda_boleta'));
        echo "</div><div id='contenido_boletas'>";

        echo "</div>";
                ?>
        </td></tr>
                    
                    
                <?php 
                echo $this->Form->input('ano_escolar', array('value'=>$ano_escolar, 'type'=>'hidden'));
                ?>
                    <tr><td><?php echo $this->Form->input('lapsos',
                        array('options'=>
                             array('Primer'=>'Primer', 'Segundo'=>'Segundo', 'Tercero'=>'Tercero'),
                             'empty'=>'Seleccione')); ?></td>
                        <td><?php echo $this->Form->input('calificacion', array('maxlength'=>'400', 'placeholder'=>'Máximo 400 caracteres', 'lablel'=>'Califiación')); ?></td>
                        <td><?php echo $this->Form->input('relacion_ambiente', array('maxlength'=>'100', 
                            'placeholder'=>'Máximo 100 caracteres','label'=>'Relación componentes del ambiente','type'=>'textarea')); ?></td>
                    </tr><tr>       
                        <td><?php echo $this->Form->input('dias_habiles', array('placeholder'=>'Dias Hábiles', 'type'=>'text','onkeypress'=>"return soloNumeros(event)")); ?></td>
                        <td><?php echo $this->Form->input('inasistencias', array('placeholder'=>'inasistencias', 'type'=>'text','onkeypress'=>"return soloNumeros(event)")); ?></td>
                        <td><?php echo $this->Form->input('fecha_entrega', array('formatDate'=>'DMY','minYear'=>Date("Y")-10, 'maxYear'=>Date("Y")-0, 'monthNames'=>
                    array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto',
                        '09'=>'Septiembre','10'=>'Octubre','11'=>'Nobiembre','12'=>'Diciembre'))); ?></td>
                    </tr>
                </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

