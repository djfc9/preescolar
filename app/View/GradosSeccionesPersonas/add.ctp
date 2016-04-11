
<div class="contenido_principal">
<?php echo $this->Form->create('GradosSeccionesPersona'); ?>
	<fieldset>
		<legend><?php echo __('Add Grados Secciones Persona'); ?></legend>
                <?php
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula', array('style'=>'width: 150px;','placeholder'=>'Ejm. 11000000'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busqueda'));
        echo "</div><div id='encontrado'>";

        echo "</div>";
                ?>
	<?php
		//echo $this->Form->input('persona_id');
		echo $this->Form->input('GradosSeccione');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Grados Secciones Personas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
	</ul>
</div>
