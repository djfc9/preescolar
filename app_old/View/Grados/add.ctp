
<div class="contenido_principal">
    <div style='width :950px;'>
<?php echo $this->Form->create('Grado'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Grado'); ?></legend>
	<?php
		echo $this->Form->input('descripcion', array('type'=>'text','style'=>'width: 250px;','placeholder'=>'Ejm. Maternal'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
        </div>
</div>

