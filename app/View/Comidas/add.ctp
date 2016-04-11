<div class="contenido_principal">
<?php echo $this->Form->create('Comida'); ?>
	<fieldset style='width :877px;'>
		<legend><?php echo __('Agregar Menú de Comida'); ?></legend>
	<?php
		echo $this->Form->input('sopa');
		echo $this->Form->input('seco');
		echo $this->Form->input('jugo');
		echo $this->Form->input('fruta');
		echo $this->Form->input('merienda');
                echo $this->Form->input('created', array(/*'type'=>'hidden',*/'readonly'=>true, 'value'=>Date('Y-m-d')));
?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

