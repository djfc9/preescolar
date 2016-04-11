<div class="contenido_principal">
<?php 
   $nombre = $persona['Persona']['nombre'];
    $apellido = $persona['Persona']['apellido'];
    $id = $persona['Persona']['id'];

?>
<embed src="<?php echo $this->webroot; ?>files/normas/normas.pdf" type="application/pdf" width="899px;"
height="500"></embed>
<?php echo $this->Form->create('Persona',array('div'=>false));   ?>
<p style="font-size: 18px; text-align: center; margin: 0;">Se&ntilde;or (a) <b><?php echo $nombre."&nbsp".$apellido ?></b> desea aceptar estas normas?</p>
   <?php echo $this->Form->input('id', array('value'=>$id, 'type'=>'hidden','div'=>false,)); ?>
    <?php echo $this->Form->input('norma_convivencia', array('style'=>'margin-left: 340px;','type'=>'radio','legend'=>false, 'required', 'options'=>array('No','Si')));?>
<div style="margin-left: 320px;"
        <?php echo $this->Form->end('Guardar', array('type'=>'button','div'=>false)); ?>
</div>
</div>



