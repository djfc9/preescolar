<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *///echo $posiciones;
   echo $this->Form->input('Alumno.posicion_id', array('style'=>'width: 200px;', 'options'=> $posiciones, 'empty'=>'Seleccione', 'label'=>'Posición'));


?>