<div class="contenido_principal">
    <div style='width :950px;'>
<?php echo $this->Form->create('Seccion'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Seccion'); ?></legend>
	<?php
		echo $this->Form->input('descripcion', array('type'=>'text','style'=>'width: 250px;','placeholder'=>'Ejm. A'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
    </div></div>

