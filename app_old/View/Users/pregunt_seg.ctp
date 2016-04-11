
<div class='contenido_principal'>
<?php echo $this->Form->create('User');

?>
	<fieldset>
		<legend><?php echo __('Registrar Pregunta de Seguridad'); ?></legend>
                <center>
                <div class='flotados6'>
	<?php   
                echo $this->Form->input('id');
                echo $this->Form->input('question_id', array('style'=>'width: 260px;', 'label'=>'Pregunta de Seguridad'));
		echo $this->Form->input('respuesta', array('style'=>'width: 250px;', 'label'=>'Respuesta Secreta'));
	?> 
                </div>
                    </center>
	</fieldset>
    <div style='margin-left: 345px; float: left; width:4px; '>
<?php echo $this->Form->end(__('Guardar')); ?>
    <?php echo $this->Html->image('atras.png', array('width'=>'90','height'=>'75','url'=>array('action'=>'login'))); ?>
    </div>
</div>
	
