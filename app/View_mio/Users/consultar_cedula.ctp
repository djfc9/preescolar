<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
debug($res);

if(!empty($res)){
                    echo "<p style='font-size: 12px; background-color: lightgreen; color: red;'>Cedula Existe, contacte al Administrador<br>para su veficación</p>";
                    echo $this->Form->input('Persona.nombre', array('style'=>'width: 250px;', 'placeholder'=>''));
                echo $this->Form->input('Persona.apellido', array('style'=>'width: 250px;', 'placeholder'=>''));
                echo $this->Form->input('Persona.user_id', array('type'=>'hidden', 'value'=>$user_id));
            }
            ?>