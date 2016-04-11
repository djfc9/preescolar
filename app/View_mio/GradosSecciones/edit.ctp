
<div class="contenido_principal">
<?php echo $this->Form->create('GradosSeccione'); ?>
	<fieldset>
		<legend><?php echo __('Editar Cupos'); ?></legend>
                <table style='width :880px;' cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
		<?php echo $this->Form->input('id'); ?>
		<?php echo $this->Form->input('grado_id', array('readonly'=>true, 'style'=>'width: 150px;')); ?>
                        </td><td>
		<?php echo $this->Form->input('seccion_id', array('readonly'=>true, 'style'=>'width: 150px;')); ?>
                        </td><td> 
		<?php echo $this->Form->input('cupos', array('style'=>'width: 150px;')); ?>
                        </td>
                    </tr>
                </table>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
