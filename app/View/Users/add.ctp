<? $ultima_sesion; $user_id = $ultima_sesion + 1; ?>


<div class='contenido_principal'>
<?php echo $this->Form->create('User');

?>
	<fieldset>
		<legend><?php echo __('Registro de Usuarios'); ?></legend>
                <center>
                <div class='flotados6'>
	<?php
		echo $this->Form->input('username', array('style'=>'width: 250px;', 'label'=>'Usuario', 'autofocus'));
		
                echo $this->Form->input('password', array('style'=>'width: 250px;', 'label'=>'Contraseña'));
                
                echo $this->Form->input('question_id', array('style'=>'width: 260px;', 'label'=>'Pregunta de Seguridad','value'=>6,'type'=>'hidden'));
		echo $this->Form->input('respuesta', array('style'=>'width: 250px;', 'label'=>'Respuesta Secreta','value'=>',','type'=>'hidden'));
                
                
                // echo $this->Form->input('group_id', array('type'=>'hidden', 'value'=>'5'));
                echo $this->Form->input('email', array('style'=>'width: 250px;','type'=>'email','label'=>'Correo', 'placeholder'=>'ejemplo@mindeporte.gob.ve'));
                
                echo $this->Form->input('group_id', array('style'=>'width: 250px;','value'=>'5', 'type'=>'hidden'));   
                
                echo "<label><b>Correos: mindeporte.gob.ve, hotmail.com, gmail.com</label>";
	?> 
                </div>
                    </center>
	</fieldset>
    <div style='margin-left: 345px; float: left; width:4px; '>
<?php echo $this->Form->end(__('Guardar')); ?>
    <?php echo $this->Html->image('atras.png', array('width'=>'90','height'=>'75','url'=>array('action'=>'login'))); ?>
    </div>
</div>
	
