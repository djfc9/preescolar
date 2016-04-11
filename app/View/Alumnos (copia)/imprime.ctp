<div class="contenido_principal">
    <br>
    <br>
<center>
<?php

//echo "Imprimir constancia de Promoción<br>";
echo 
$this->Html->image('promover.png',
 array('width'=>'90px;', 'heigth'=>'90px;','title'=>'Promover Otro','id'=>'promover' ,'alt'=>'Promover Otro'/*,
     'url'=>array('action'=>'promover')*/));

echo 
$this->Html->image('pdf.png',
 array('width'=>'90px;', 'heigth'=>'90px;','title'=>'Imprimir Constancia', 
     'alt'=>'Imprimir Constancia','url'=>array('action'=>'c_promocion',$alumno)));
  /*array('action' => 'c_promocion', $alumno), array('escape'=> false, 'confirm' => __('Seguro desea Imprimir?', $alumno)));*/
echo $this->Form->create('Alumno');
echo $this->Form->input('id_alumno', array('type'=>'hidden', 'value'=>$alumno));
?>
    <br>
    <br>

</center>
</div>