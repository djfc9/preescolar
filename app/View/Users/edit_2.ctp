
<div class="contenido_principal">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Cambiar de Grupo'); ?></legend>
                <table style='width :880px;'><tr><td>
	<?php
		echo $this->Form->input('group_id', array('style'=>'width: 300px;','label'=>'Grupos', 'type'=>'select', 'options'=> $groups));
                echo "</td><td>";
		echo $this->Form->input('email', array('style'=>'width: 300px;', 'readonly'=>true));
                echo "</td></tr>";
		echo $this->Form->input('id');
	?>
                    </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

