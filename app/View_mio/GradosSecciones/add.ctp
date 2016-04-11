
<div class="contenido_principal">
<?php echo $this->Form->create('GradosSeccione'); ?>
	<fieldset>
		<legend><?php echo __('Crear cupos en las secciones'); ?></legend>
                <table align="center" style='width :880px;'>
                    <tr><td>
	<?php
		echo $this->Form->input('grado_id', array('empty'=>'Seleccione'));
                echo "</td><td>";
		echo $this->Form->input('seccion_id', array('empty'=>'Seleccione'));
                echo "</td><td>";
		echo $this->Form->input('cupos', array('style'=>'width: 150px;'));
	?>
                        </td></tr>
                </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

