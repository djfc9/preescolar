
<div class="contenido_principal">
<?php echo $this->Form->create(Null, array('type'=>'post', 'action'=>'reposos_pdf')); ?>
	<fieldset>
		<legend><?php echo __('Planilla de Reposos M&eacute;dicos'); ?></legend>
	<table align='center'>
            <tr>
                <td>
                    <?php echo $this->Form->input('alumno_id', array('empty'=>'Seleccione','style'=>'width: 250px;')); ?>    
                </td>
                <td>
                    <?php echo $this->Form->input('fecha', array('type'=>'date')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <p align='center'>El paciente necesita estar en reposo por</p>
                </td>
                 <td>
                <?php echo $this->Form->input('dias', array('options'=>array('1 Dia'=>'1 Dia','2 Dias'=>'2 Dias','3 Dias'=>'3 Dias'),'empty'=>'Seleccione'/*,'style'=>'width: 200px;','label'=>'Cantidad de Tiempo'*/)); ?> 
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <?php echo $this->Form->input('por',array('type'=>'textarea', 'label'=>'Motivo del rep&oacute;so')); ?>
                </td>
            </tr>

		
                
		
		
                
        </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?> 
</div>

