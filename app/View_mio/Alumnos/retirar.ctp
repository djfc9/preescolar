<div class="contenido_principal">
<?php echo $this->Form->create('Alumno'); ?>
  <? //  echo debug($alumno); ?>
	<fieldset>
		<legend><?php echo __('Retirar Estudiantes'); ?></legend>
                
                <div id="contenedor-principal">
 <table style='width :863px;' ><tr><td>
     
	<?php
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula_escolar', array('style'=>'width: 150px;' ,'placeholder'=>'Ejm. 11209568332', 'autofocus'));
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
                    echo $this->Form->input('fecha_retiro', array('label'=>'Fecha de Retiro','required'));
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

