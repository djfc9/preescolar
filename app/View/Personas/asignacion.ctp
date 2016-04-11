
<div class="contenido_principal">
<?php echo $this->Form->create('Persona'); ?>
  <? //  echo debug($alumno); ?>
	<fieldset>
		<legend><?php echo __('Asignacion de Grados y Secciones'); ?></legend>
                
                <div id="contenedor-principal">
 <table align="center" style='width :863px;'><tr><td>
     
	<?php
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula', array('onkeypress'=>"return soloNumeros(event)",'maxLength'=>8,'autofocus','style'=>'width: 150px;','placeholder'=>'Ejm. 11000000'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busqueda'));
        echo "</div><div id='encontrado'>";

        echo "</div>";
                ?>
 
             <table><tr><td>  
        <?php if(!empty($gradosSecciones))
        { 
            echo $this->Form->input('GradosSeccione', array('label'=>'Grado y Secci&oacute;n', 'style'=>'width: 150px;')); 
            echo "</td><td>";
            echo $this->Form->input('Persona.docente', array('label'=>'Cargo de Maestra', 
                'style'=>'width: 150px;', 'options'=>array('1'=>'Docente', '0'=>'Auxiliar'), 'empty'=>'Seleccione'));
            echo "</td></tr>";
        }  else {
              echo "<script>alert('Todas las secciones de este año escolar\nfueron asignadas a sus profesores');
            document.location=('/preescolar/GradosSeccionesPersonas/index/');
            </script>";
        }
           ?>
    
<div class="clear"></div>
</table>
                </div>      
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>


