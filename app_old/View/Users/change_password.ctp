    
<div class="contenido_principal">
    <fieldset>
        <legend><?php echo __('Cambiar Contraseña'); ?></legend>
       <div id='correo_cambio' style="display: block; width :868px;">
    <div style="float: left; width: 307px;">
    <?php
        echo $this->Form->input('UserEmail', array('style'=>'width: 300px;', 'placeholder'=>'ejemplo@mindeporte.gob.ve','type'=>'email', 'label'=>'Por favor, Ingrese su correo'));
        ?>
        </div>
        <div style="  margin-top: 13px;">
       <?php echo $this->Html->image('consultar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busqueda_correo'));
        ?></div>
           <div style="float: right;">
       <?php echo $this->Html->image('atras.png', array('width'=>'80','height'=>'55','url'=>array('action'=>'login'))); ?>   
           </div>
       </div>
        

        <div id='informacion_user' style="width :868px;"></div>
</fieldset>
     
</div>