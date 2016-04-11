<?php

echo $this->Form->input('AlumnosGradosSecciones.gradosSecciones',
        array('empty'=>'Seleccione', 'style'=>'width: 150px;','options'=>$gradosSecciones)); 
?>
<div style="margin-left: 30px;">
<?php echo $this->Form->end('Generar'); ?>
</div>