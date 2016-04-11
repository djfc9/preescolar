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

echo "Pregunta de seguridad:&nbsp;&nbsp;".$pregunta;
echo $this->From->input('User.respuesta', array('value'=>$respuesta, 'style'=>'width: 300px;'));
echo $this->Form->end(__('Guardar'));