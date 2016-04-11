<div class="contenido_principal">
<?php echo $this->Form->create('Alumnos'); ?>
  <?  ?>
	<fieldset>
		<legend><?php echo __('Promover Alumnos'); ?></legend>
                
                <div id="contenedor-principal">
 <table style='width :863px;' ><tr><td>
     
	<?php
        //Año escolar
$ano1=date("Y");
$ano2=date("Y")+1;
$ano_escolar=$ano1."-".$ano2;


 $dia = date('d');
 $mes = date('m');
 $año = date('Y');
 $escolar_a = $mes ;   
 if ($escolar_a >= 7 ) {
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
        
        echo "<div style='float: left'>";
        echo $this->Form->input('Alumno.cedula_escolar', array('style'=>'width: 150px;' ,'placeholder'=>'Ejm. 11209568332', 'autofocus'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'img_busqueda_pro'));
        echo "</div><div id='contenido2'>";

        echo "</div>";
                ?>
        </td></tr>
 </table>
                 <table>
                    <tr><td>
                    <?php
                    echo $this->Form->input('Alumno.estatu_id', array('label'=>'Estatus de inscripción', 'empty'=>'Seleccione', 'style'=>'width: 250px;'));
                    echo "</td><td>"; 
                    echo $this->Form->input('Alumno.fecha_promocion', array('formatDate'=>'DMY','minYear'=>Date("Y")-0, 'maxYear'=>Date("Y")-0, 'monthNames'=>
                    array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto',
                        '09'=>'Septiembre','10'=>'Octubre','11'=>'Nobiembre','12'=>'Diciembre')));
                    echo "</td><td>"; 
                    echo $this->Form->input('Alumno.ano_escolar', array('value'=>$ano_escolar, 'readonly'=>TRUE)); 
                    echo "</td><td></td></tr>";
                    

                    
                         
	?>
                </table>
<div class="clear"></div>
</div>

                 
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>


