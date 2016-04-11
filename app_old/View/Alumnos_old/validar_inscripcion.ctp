
<div class="contenido_principal">
<?php echo $this->Form->create('Alumno'); ?>
  <? //  echo debug($alumno); ?>
	<fieldset>
		<legend><?php echo __('Validar requisitos de Inscripción'); ?></legend>
                
                <div id="contenedor-principal">
 <table style='width :863px;' ><tr><td>
     
	<?php
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula_escolar', array('style'=>'width: 150px;' ,'placeholder'=>'Ejm. 11209568332'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'img_busqueda'));
        echo "</div><div id='contenido'>";

        echo "</div>";
                ?>
        </td></tr>
 </table>
                 <table align="center">
                    <tr>
                    <td align="justify" colspan='3'><p align="justify" >
                    <?php echo $this->Form->input('Requisito', array('style'=>'width: 150px;', 'multiple'=>'checkbox', 'label'=>'Requisitos'));?>
                    </p></td></tr><tr><td>
                    <?php
                    /*
                    echo $this->Form->input('GradosSeccione', array('label'=>'Grado y Secci&oacute;n', 'style'=>'250px;'));
                    echo "</td><td>";
                    echo $this->Form->input('estatu_id', array('label'=>'Estatus de inscripción', 'empty'=>'Seleccione', 'style'=>'250px;'));
                    echo "</td><td><div id='estatus' style='display: none;'>";*/
                    echo $this->Form->input('confirmar', array('label'=> 'Estatus de Requisitos', 'required', 'options'=>array('1'=>'Documentos Completos','2'=> 'Faltan Documentos'), 'empty'=>'Seleccione'));
                    echo "</td></tr>";
                    
                         
	?>
                    
                </table>
<div class="clear"></div>
</div>

                 
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

