<? $ultima_sesion; $user_id = $ultima_sesion + 1; ?>


<div class='contenido_principal'>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Registro de Usuarios'); ?></legend>
                <center>
                <div class='flotados6'>
	<?php
		echo $this->Form->input('username', array('style'=>'width: 250px;', 'label'=>'Usuario', 'autofocus'));
		
                echo $this->Form->input('password', array('style'=>'width: 250px;', 'label'=>'Contraseña'));
                
                echo $this->Form->input('question_id', array('style'=>'width: 260px;', 'label'=>'Pregunta de Seguridad'));
		
                echo $this->Form->input('respuesta', array('style'=>'width: 250px;', 'label'=>'Respuesta Secreta'));
                
                // echo $this->Form->input('group_id', array('type'=>'hidden', 'value'=>'5'));
                echo $this->Form->input('email', array('style'=>'width: 250px;','type'=>'email','label'=>'Correo', 'placeholder'=>'ejemplo@mindeporte.gob.ve'));
                
                echo $this->Form->input('group_id', array('style'=>'width: 250px;','value'=>'5', 'type'=>'hidden'));    
	?> 
                </div>
                    </center>
	</fieldset>
    <div style='float: left; margin-right: 0px; '>
<?php echo $this->Form->end(__('Guardar')); ?>
    </div><div  style=' margin-top: 28px;'>
    <?php echo $this->Html->image('atras.png', array('width'=>'80','height'=>'55','url'=>array('action'=>'login'))); ?>
    </div>
</div>

	
