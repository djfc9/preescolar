    
<div class="contenido_principal">
    <fieldset>
        <legend><?php echo __('Generar Constancias'); ?></legend>
<div id='buscador_caja'>
<div class="flotados5">

    
    <?php
        echo $this->Form->input('AlumnoCedulaEscolar', array('style'=>'width: 150px;', 'label'=>'Cedula Escolar','placeholder'=>'Ejm. 11209568332'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busqueda_lista_rep'));
        ?></div></div>

<br>
</div>  
        <div id='informacion_rep'></div>
</fieldset>
</div>
