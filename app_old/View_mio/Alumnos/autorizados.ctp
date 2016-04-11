<div class="contenido_principal">
    <fieldset>
	<legend><?php echo __('Autorizados de los Alumnos por Grado y Sección'); ?></legend>
<br>
<?php
//debug($gradosSec);
        echo "<div style='float: left'>";
        echo $this->Form->input('GradosSeccione_id', array( 'options'=>$gradosSec,'style'=>'width: 150px;', 'empty'=>'Seleccione', 'label'=>'Grado y Sección'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'autorizados_db'));
        echo "</div><br><div id='aut'>";

        echo "</div>";
                ?>
    </fieldset>
</div>