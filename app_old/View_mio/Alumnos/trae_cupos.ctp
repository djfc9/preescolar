<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
foreach ($cupos as $cupo)
//echo debug($cupo);
$dis = $cupo['GradosSeccione']['cupos_asignados'];
$dis = $dis +1;
echo $this->Form->input('GradosSeccione.cupos_asignados', array('type'=>'hidden', 'value'=> $dis));
?>