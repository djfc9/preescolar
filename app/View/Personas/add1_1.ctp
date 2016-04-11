<div class="contenido_principal">
    <fieldset>
		<legend><?php echo __('Ingrese la cédula de la persona a autorizar'); ?></legend>
<?php echo $this->Form->create('Persona'); ?>
	
                
<div id="autorizado_nuevo">
                <?php 
                echo "<div style='float: left; width: 265px;' >";
                echo $this->Form->input('cedula_p', array('onkeypress'=>"return soloNumeros(event)",'maxLength'=>8,'autofocus', 
                    'style'=>'width: 250px;', 'placeholder'=>'Consultar cédula', 'label'=>'Cédula')); 
                echo "</div><div class='flotados3' style='margin-top: 11px; margin-left: 2px;'>";
                echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'cedula_busqueda'));
                echo "</div>";
                ?>
</div>
                <!-- cuando la persona existe uso esta-->
                <div style="display: none;" id="autorizado_existente">
                </div>
	</fieldset>
</div>
