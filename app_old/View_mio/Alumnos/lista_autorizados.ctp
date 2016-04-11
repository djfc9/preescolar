
<div class="contenido_principal">
<?php echo $this->Form->create('Alumno'); ?>
  <? //  echo debug($alumno); ?>
	<fieldset>
		<legend><?php echo __('Listar Autorizados de los Alumnos'); ?></legend>
                
              
 <table style='width :880px;'><tr><td>
     

	<?php 
        echo "<div style='float: left'>";
        echo $this->Form->input('cedula_escolar', array('style'=>'width: 150px;','placeholder'=>'Ejm. 11209568332'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busquemos'));
        echo "</div><div id='lista_autorizados'>";
        echo "</div>";
         ?>
        </td></tr>
 </table>
       </fieldset>

</div>     