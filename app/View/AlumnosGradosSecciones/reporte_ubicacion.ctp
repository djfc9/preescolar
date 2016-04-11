<?php $uno = Date('Y');
      $dos = 1;
      $cuatro = Date('Y')-1;
      $cinco = Date('Y')-2;
      $tres = Date('Y')+$dos;
      $actual = $uno."-".$tres;
      $anterior = $cuatro."-".$uno;
      $antes_anterior = $cinco."-".$cuatro;
      
      echo $this->Form->create('AlumnosGradosSecciones');

?>
<div class="contenido_principal">

	<fieldset>
		<legend><?php echo __('Generar Base de Datos de Alumnos'); ?></legend>
                <div style="margin-left: 350px;">
                    <div>
                   
	<?php 
               
               
               echo $this->Form->input('ano_escolar', array('empty'=>'Seleccione',
                  'style'=>'width: 150px;',
                   'options'=>array($antes_anterior=>$antes_anterior,$anterior=>$anterior,$actual=>$actual)));
                   echo "</div>";
        //echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'buscar_alumnos'));
               echo "<div id='lista_gs'>";
               echo "</div>";
               ?>
                
                </div>  
                
	</fieldset>

</div>

