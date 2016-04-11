
<div class="contenido_principal">
<?php echo $this->Form->create('Persona'); ?>
  <? //  echo debug($alumno); ?>
	<fieldset>
		<legend><?php echo __('Registrar Empleados del Preescolar'); ?></legend>
                
                <div id="contenedor-principal">
 <table align="center" style='width :863px;'><tr><td>
     
	<?php
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula', array('onkeypress'=>"return soloNumeros(event)",'maxLength'=>8, 'style'=>'width: 150px;','placeholder'=>'Ejm. 11000000'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busqueda_trabajador'));
        echo "</div><div id='trabajador_encontrado'>";

        echo "</div>";
                ?>
    
<div class="clear"></div>
</table>
                </div>      
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>


