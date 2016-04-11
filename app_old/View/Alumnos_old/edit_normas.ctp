
<div class="contenido_principal">
<?php echo $this->Form->create('Alumno', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Acuerdos de Convivencia'); ?></legend>
                
        <table align="center" style='width :880px;'><tr><td>
                <?php echo $this->Form->input('id'); ?>
                <?php echo $this->Form->input('cedula_escolar', array('style'=>'width: 150px;','disabled'=> true)); ?>
                </td><td>
                <?php echo $this->Form->input('nombre', array('style'=>'width: 150px;','disabled'=> true)); ?>
                </td><td>
                <?php echo $this->Form->input('apellido', array('style'=>'width: 150px;','disabled'=> true)); ?>
                </td></tr>
                <tr><td>
                <?php echo $this->Form->input('fotografias', 
                        array('style'=>'width: 150px;',
                            'label'=>'Autorizo a la institución para publicar y difundir fotos de mi representado en medios digitales institucionales e impresos.',
                            'options'=>array('true'=>'Acepto','false'=>'Rechazo'))); ?>
                    </td><td colspan="2">
                <?php echo $this->Form->input('viajes', array('style'=>'width: 150px;',
                    'label'=>'Estoy de acuerdo en autorizar a mi representado a asistir a paseos y salidas.',
                            'options'=>array('true'=>'Acepto','false'=>'Rechazo'))); ?>
                </td>
                </tr>

                </table>
   
           
    
<div class="clear"></div>


                 
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

