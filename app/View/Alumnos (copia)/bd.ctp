
<div class="contenido_principal">
<?php echo $this->Form->create(NULL, array('action'=>'bd_generar')); ?>
	<fieldset>
		<legend><?php echo __('Generar Base de Datos de Alumnos'); ?></legend>
                <div style="float: left; ">
	<?php echo $this->Form->input('gradosSecciones', array('empty'=>'Seleccione', 'style'=>'width: 150px;')); 
               echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'imgbusqueda'));
        echo "</div><div id='listado' style='width: 863px;'>";

        echo "</div>";?>
	</fieldset>

</div>

