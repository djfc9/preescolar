
<div class="contenido_principal">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Cambiar Clave y/o Pregunta de Seguridad'); ?></legend>
                <table style='width :880px;'><tr><td>
	<?php
		echo $this->Form->input('username', array('readonly'=>true, 'style'=>'width: 200px;', 'label'=>'Usuario'));
                echo "</td><td>";
		echo $this->Form->input('password', array('style'=>'width: 300px;', 'label'=>'Contrseña'));
                echo "</td></tr><tr><td>";
                echo $this->Form->input('question_id', array('style'=>'width: 200px;', 'label'=>'Pregunta de Seguridad'));
                echo "</td><td>";
		echo $this->Form->input('respuesta', array('style'=>'width: 300px;'));
                echo "</td></tr>";
		echo $this->Form->input('id');
	?>
                    </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

