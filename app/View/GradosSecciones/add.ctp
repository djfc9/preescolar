<?php
//Año escolar
                        $ano1=date("Y");
                        $ano2=date("Y")+1;
                        $dia = date('d');
                        $mes = date('m');
                        $año = date('Y');  
                        $escolar_a = $mes ; 
                        if ($escolar_a >= 6 ) {
                        //Año escolar
                        $ano1=date("Y");
                        $ano2=date("Y")+1;
                        $ano_escolar=$ano1."-".$ano2;
                        }else {
                        //Año escolar
                        $ano1=date("Y")-1;
                        $ano2=date("Y");
                        $ano_escolar=$ano1."-".$ano2;
                        }
?>
<div class="contenido_principal">
<?php echo $this->Form->create('GradosSeccione'); ?>
	<fieldset>
		<legend><?php echo __('Crear cupos en las secciones'); ?></legend>
                <table align="center" style='width :880px;'>
                    <tr><td>
	<?php
		echo $this->Form->input('grado_id', array('empty'=>'Seleccione'));
                echo "</td><td>";
		echo $this->Form->input('seccion_id', array('empty'=>'Seleccione'));
                echo "</td><td>";
		echo $this->Form->input('cupos', array('style'=>'width: 150px;', 'type'=>'text'));
                echo "</td><td>";
		echo $this->Form->input('ano_escolar', array('value'=>$ano_escolar,'style'=>'width: 150px;'));
	?>
                        </td></tr>
                </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>

