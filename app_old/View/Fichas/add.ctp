
<div class="fichas form">
<?php echo $this->Form->create('Ficha'); ?>
	<fieldset>
		<legend><?php echo __('Ficha de Casos Medicos'); ?></legend>
	<table align='center'>
            <tr>
                <td>
                    <?php echo  $this->Form->input('descripcion', array('label'=>'Descripcion del Caso / Sintomas', 'style'=>'width: 300px;')); ?>
                </td>
                <td>
                    <?php echo  $this->Form->input('diagnostico', array('label'=>'Diagnostico Post Evaluacion', 'style'=>'width: 300px;')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('medicamentos', array('label'=>'Medicamentos / Tratamiento', 'style'=>'width: 300px;')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('referenciado', array('options'=>array('Si'=>'Si', 'No'=>'No'), 'empty'=>'Seleccione')); ?>
                
                </td>
            <tr>
                 <td>
                     <div id='referencia' style='display: none'>
                <?php echo $this->Form->input('referido', array('style'=>'width: 300px;', 'label'=>'Especialista / Examenes')); ?> 
                     </div>
                </td>
                <td>
                    
                <?php 
                echo $this->Form->input('Alumno'); ?>    
                </td>
            </tr>

		
                
		
		
                
        </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?> 
</div>

