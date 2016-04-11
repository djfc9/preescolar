<script>
alert('La carga de esta planilla no garantiza el cupo,\ndebera formalizar su inscripción ante el preescolar.');
</script>
<?php
//debug($representante);
  $tipo_per = $representante['0']['TipoPersona']['0']['id'];  //tipo de persona que es el representante
  $ci_rep = $representante['0']['Persona']['cedula'];
  //$tipo_per1 = $nucleo['0']['TipoPersona']['0']['id'];
  $ci_nuc = $nucleo['0']['Persona']['cedula'];
  //echo debug($nucleo);
?>
<div class="contenido_principal">
<?php echo $this->Form->create('Alumno', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Agregar Representados'); ?></legend>
         <div id="contenedor-principal">
             <table style='width :863px;'><tr><td style='vertical-align: super;'>
     
	<?php
        
        if($tipo_per == 1){
            echo $this->Form->input('cedula_representante', array('style'=>'width: 200px;', 'value'=>  $ci_rep, 'label'=>'C&eacute;dula Madre' , 'readonly'=> true));
        }
        else
        {
            echo $this->Form->input('cedula_representante', array('style'=>'width: 200px;', 'value'=> $ci_nuc , 'label'=>'C&eacute;dula Madre', 'readonly'=> true));
        }
            
		
                echo "</td><td>";
                echo $this->Form->input('nombre', array('style'=>'width: 200px;', 'label'=>'Primer Nombre'));
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 200px;'));
                echo "</td><td>";
                echo $this->Form->input('segundo_nombre', array('style'=>'width: 200px;'));
		//echo $this->Form->input('lugar_nacimiento', array('style'=>'width: 200px;'));
                echo "<td></tr><tr><td>";
                echo $this->Form->input('apellido', array('style'=>'width: 200px;','label'=>'Primer Apellido'));
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 200px;'));
                echo "</td><td>";
                echo $this->Form->input('segundo_apellido', array('style'=>'width: 200px;'));
                echo "</td><td>";
                echo "<p style='font-size:13px; vertical-align: super;'><font color='red'>*</font> Campos obligatorios</p>";
                echo "<td></tr><tr><td>";
                echo $this->Form->input('peso', array('style'=>'width: 200px;','placeholder'=>'Ejm. 5.10'));
                echo "</td><td>";
                echo $this->Form->input('talla', array('style'=>'width: 200px;' ,'placeholder'=>'Ejm. 50.10'));
                echo "</td><td>";
                echo $this->Form->input('sexo_id', array('style'=>'width: 200px;'));
                echo "<td></tr><tr><td style='vertical-align: super;'>";
		echo $this->Form->input('fecha_nacimiento', array('formatDate'=>'DMY','minYear'=>Date("Y")-10, 'maxYear'=>Date("Y")-0, 'monthNames'=>
                    array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto',
                        '09'=>'Septiembre','10'=>'Octubre','11'=>'Nobiembre','12'=>'Diciembre')));
                echo "</td><td>";
                echo $this->Form->input('lugar_nacimiento', array('style'=>'width: 250px;', 'label'=>'Lugar de Nacimiento','placeholder'=>'Ejm. Caracas, Distrito Capital'));
                echo "</td><td>";
		echo $this->Form->input('direccion', array('style'=>'width: 250px;' ,'placeholder'=>'Ejm. Urb. Pedro Perez, Casa 5'));
		echo "<td></tr><tr><td><div style='float:left;'>";
		echo $this->Form->input('estado_id', array('style'=>'width: 200px;'));
                echo "</div></td><td>";
                echo "<div id='imgcarga' style='float:left;'>";
		echo $this->Form->input('municipio_id', array('style'=>'width: 200px;', 'empty'=>'Seleccione'));
                echo "</div>";
                echo "</td><td>";
                echo "<div id='imgcarga1' style='float:left;'>";
		echo $this->Form->input('Alumno.parroquia_id', array('style'=>'width: 200px;', 'empty'=>'Seleccione'));
                echo "</div>";
                echo "<td></tr><tr><td>";
                echo $this->Form->input('Persona', array('style'=>'width: 200px;', 'label'=>'Representante', /*'multiple'=>'checkbox',*/ 'required'));
                echo "</td><td style='vertical-align: super;'>";
                echo $this->Form->input('telefono_habitacion', array('style'=>'width: 200px;' ,'maxlength'=>'12', 'label'=>'Teléfono de Habitación','placeholder'=>'Ejm. 0212-5555555'));
                echo "</td><td style='vertical-align: super;'>";
		echo $this->Form->input('niños_en_el_parto', array('style'=>'width: 200px;', 'required','options'=>array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'), 'empty'=>'Seleccione', 'label'=>'Niños en el parto'));
                echo "<td></tr><tr><td>";
                //echo $this->Form->input('posicion', array('style'=>'width: 200px;', 'options'=>array('1'=>'Primero','2'=>'Segundo','3'=>'Tercero','4'=>'Cuarto','5'=>'Quinto'), 'empty'=>'Seleccione', 'label'=>'Posición'));
                echo "<div id='posiciones'>";
                echo $this->Form->input('posicion_id', array('style'=>'width: 200px;', 'options'=>array(/*'1'=>'Primero','2'=>'Segundo','3'=>'Tercero','4'=>'Cuarto','5'=>'Quinto'*/), 'empty'=>'Seleccione', 'label'=>'Posición'));
                echo "</div>";
                echo "</td><td>";
                echo "<div>";
                echo $this->Form->input('cedula_escolar', array('style'=>'width: 200px;' , 'readonly'=>true));
                echo "</div>";
                echo "</td><td>";
                echo "<div>";
                echo $this->Form->input('foto', array('type'=>'file','required', 'label'=>'Foto (Tipo Carnet)','placeholder'=>'Ejm. Urb'));
                echo "<label style='font-size: 13px; color: firebrick; font-weight: bold;'>FORMATOS: jpg, png o jpeg</label>";
                echo "</div>";
                echo "</td><td>";
                echo "<td></tr><tr><td colspan='3' class='flotados2'>";
                echo $this->Form->input('Norma', array('style'=>'width: 200px;', 'multiple'=>'checkbox', 'label'=>'Acuerdos Internos con el CEIBN'));
                echo "</td></tr>";
	?>
                </table>
   
           
    
<div class="clear"></div>
</div>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
