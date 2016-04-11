
<div id='flashmen'><?php echo $this->Session->flash(); ?></div>
<div id="login">
    <p id="titulo_login"><font color="black">Iniciar Sesión</font></p>
        <?php //echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User'); ?>
	<?php echo $this->Form->input('username', array('type' => 'text','label'=>'Usuario', 'autofocus', 'style' => 'width: 150px;')); ?>	
        <?php echo $this->Form->input('password', array('type' => 'password','label' => 'Contraseña', 'style' => 'width: 150px;')); ?>
        
        <?php echo $this->Form->end(__('Entrar'));?>
    </div>
 
