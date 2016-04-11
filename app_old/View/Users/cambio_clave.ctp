<div class="contenido_principal">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Cambiar Contraseña'); ?></legend>
                <table style='width :880px;'><tr><td>
	<?php
		echo $this->Form->input('username', array('readonly'=>true, 'style'=>'width: 200px;', 'label'=>'Usuario'));
                echo "</td><td>";
		echo $this->Form->input('password', array('style'=>'width: 300px;', 'label'=>'Nueva Contraseña'));
                echo "</td><td>";
		echo $this->Form->input('password_v', array('style'=>'width: 300px;', 'label'=>'Validar Contraseña Nueva', 'type'=>'password'));
                echo "</td></tr>";
		echo $this->Form->input('id');
	?>
                    </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', array('id'=>'enviar'))); ?>
</div>

