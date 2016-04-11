
<div class="contenido_principal">
    <fieldset>
	<legend><?php echo __('Listar Alumnos Autorizados a fotografias'); ?></legend>
<br>
<?php
//debug($gradosSec);
        echo "<div style='float: left'>";
        echo $this->Form->input('GradosSeccione_id', array( 'options'=>$gradosSec,'style'=>'width: 150px;', 'empty'=>'Seleccione', 'label'=>'Grado y Sección'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busca_fotografias'));
        echo "</div><br><div id='fotografias'>";

        echo "</div>";
                ?>
    </fieldset>
</div>