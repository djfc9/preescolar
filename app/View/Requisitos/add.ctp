<div class="contenido_principal">
    <div style='width :950px;'>

<?php echo $this->Form->create('Requisito'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Requisito'); ?></legend>
	<?php
		echo $this->Form->input('descripcion', array('style'=>'width: 350px;','placeholder'=>'Ejm. 4 Fotos tipo Carnet'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>

    </div></div>