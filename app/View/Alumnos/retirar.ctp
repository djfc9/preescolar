<div class="contenido_principal">
<?php echo $this->Form->create('Alumno'); ?>
  <? //  echo debug($alumno); ?>
	<fieldset>
		<legend><?php echo __('Retirar Estudiantes'); ?></legend>
                
                <div id="contenedor-principal">
 <table style='width :863px;' ><tr><td>
     
	<?php
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula_escolar', array('onkeypress'=>"return soloNumeros(event)",'maxLength'=>11,'style'=>'width: 150px;' ,'placeholder'=>'Ejm. 11209568332', 'autofocus'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'img_retirar'));
        echo "</div><div id='contenido_alumno'>";

        echo "</div>";
                ?>
        </td></tr>
 </table>
                 <table align="center">
                    <tr><td>
                    <?php
                    echo $this->Form->input('fecha_retiro', array('label'=>'Fecha de Retiro','required','formatDate'=>'DMY','minYear'=>Date("Y")-10, 'maxYear'=>Date("Y")-0, 'monthNames'=>
                    array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto',
                        '09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre')));
                    echo "</td><td>";
                    echo $this->Form->input('motivo_retiro', array('label'=>'Motivo de Retiro', 'style'=>'width: 250px;','required'));
                    echo "</td></tr>";
                    
                         
	?>
                </table>
<div class="clear"></div>
</div>

                 
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

