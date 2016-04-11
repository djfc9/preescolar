<div class="contenido_principal">
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//debug($data);

echo $this->Form->create('User');
foreach ($data as $datos):
    $id = $datos['User']['id'];
    $pregunta = $datos['Question']['nombre'];
    $respuesta = $datos['User']['respuesta'];
endforeach;

echo $this->Form->input('User.pregunta_de_seguridad', array('value'=>$pregunta, 'style'=>'width: 300px;', 'type'=>'text', 'readonly'=>true));
echo $this->Form->input('User.respuesta', array('value'=>$respuesta, 'style'=>'width: 300px;', 'type'=>'hidden'));
echo $this->Form->input('User.respuesta_del_usuario', array('style'=>'width: 300px;', 'type'=>'text'));
echo $this->Form->input('User.id', array('value'=>$id, 'style'=>'width: 300px;', 'type'=>'hidden'));
echo $this->Form->end(__('Continuar'));
?>
</div>