
<div class="contenido_principal">
    <h2>Registrar núcleo familiar</h2>
<?php echo $this->Form->create('Persona', array('type'=>'file')); ?>
    
        
        <?php //debug($tipo_per);
        $id_representante = $tipo_per['0']['Persona']['user_id'];
        $parentesco = $tipo_per['0']['TipoPersona']['0']['PersonasTipoPersona']['tipo_persona_id'];
        if(empty($parentesco))
        {
            echo "<script> alert('Debe especificar el parentesco'); document.location=('/preescolar/personas/edit/$id_representante');</script>";   
        }
        else {
        $nombre = $personas['0']['Persona']['nombre'];
        $apellido = $personas['0']['Persona']['apellido'];
        $ci = $personas['0']['Persona']['cedula'];
        $movil = $personas['0']['Persona']['telefono_movil'];
        $local = $personas['0']['Persona']['telefono_local'];
        $trabajo = $personas['0']['Persona']['telefono_trabajo'];
        $autorizado = $personas['0']['Persona']['autorizado'];
         $representante = $personas['0']['Persona']['representante'];
         $vive_con = $personas['0']['Persona']['vive_con_el_niño'];
         $profesion = $personas['0']['Persona']['profesion'];
        
         
         ///////nucleo familiar registrado
         //foreach ($nucleo_fam as $nuc):
            // echo debug($nucleo_fam);
         if($nucleo_fam != null)
         {
        $nuc_id = $nucleo_fam['0']['Persona']['id'];
        $nuc_parentesco = $nucleo_fam['0']['TipoPersona']['0']['id'];
        $nuc_nombre = $nucleo_fam['0']['Persona']['nombre'];
        $nuc_apellido = $nucleo_fam['0']['Persona']['apellido'];
        $nuc_ci = $nucleo_fam['0']['Persona']['cedula'];
        $nuc_movil = $nucleo_fam['0']['Persona']['telefono_movil'];
        $nuc_local = $nucleo_fam['0']['Persona']['telefono_local'];
        $nuc_trabajo = $nucleo_fam['0']['Persona']['telefono_trabajo'];
        $nuc_autorizado = $nucleo_fam['0']['Persona']['autorizado'];
        $nuc_representante = $nucleo_fam['0']['Persona']['representante'];
        $nuc_vive_con = $nucleo_fam['0']['Persona']['vive_con_el_niño'];
        $nuc_profesion = $nucleo_fam['0']['Persona']['profesion'];
        $nuc_nucleo_fam = $nucleo_fam['0']['Persona']['nucleo_familiar_ref'];
         }
        
        switch ($parentesco)
        {
        case  "1":  //madre
        ?>
    
    
        <fieldset style='width :880px;'>
		<legend><?php echo __('Madre'); ?></legend>
                
            <div style="float: left;"> 
   <table>
       <tr><td class="negritas"><?php echo __('Nombre'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['nombre']); ?></td>
           </tr>
           <tr><td class="negritas"><?php echo __('Apellido'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['apellido']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Cedula'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['cedula']); ?></td></tr>
         
           <tr><td class="negritas"><?php echo __('Telefono Movil'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_movil']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Telefono Local'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_local']); ?></td></tr>
           
           <tr><td class="negritas"><?php echo __('Telefono Trabajo'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_trabajo']); ?></td></tr>

           <tr><td class="negritas"><?php echo __('Sexo'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Sexo']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Estado'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Estado']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Municipio'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Municipio']['nombre']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Parroquia'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Parroquia']['nombre']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Direccion'); ?></td>
               <td>&nbsp;&nbsp;</td>
               <td style="width: 450px;"><?php echo h($persona['Persona']['direccion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Parentesco'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['TipoPersona']['0']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Representante'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['representante']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Autorizado'); ?></td>
               <td>&nbsp;&nbsp;</td>
            <td><?php echo h($persona['Persona']['autorizado']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Cargo'); ?></td>
               <td>&nbsp;&nbsp;</td>
        <td><?php echo $persona['Cargo']['nombre']; ?></td></tr>
          </td>
   </table>
</div>
        <div class="flotando1">
            <?php if(!empty($persona['Persona']['foto']))
                {
            
                echo $this->Html->image("/img/persona/foto/". $persona['Persona']['foto'], array('class'=>'foto_ficha')); 
            }
            else
            {
                 echo $this->Html->image("imagen_user.jpg", array('class'=>'foto_ficha'));
                // echo "<p align='center' style='width:150px; margin-top: 0px;'>Cambie su Foto.</p>";
            }?>   
        </div> 
            

</fieldset> 
        
        <fieldset style='width :880px;'>
            <p style="font-size: 18px; text-align: center; color: #008000; display: block; background-color: #dcdcdc;">(Ingrese los datos del Padre.)</p>
		<legend><?php echo __('Padre'); ?></legend>
                
                 <table style='width :880px;' align="center"><tr><td>
     
	<?php
        //echo debug($persona);
		echo $this->Form->input('Persona.nombre', array('style'=>'width: 150px;', 'value'=> $nuc_nombre,
                                'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)'));
                echo "</td><td>";
                echo $this->Form->input('Persona.apellido', array('style'=>'width: 150px;', 'value'=> $nuc_apellido,
                                'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)'));
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 150px;'));
                echo "</td><td>";
                echo $this->Form->input('Persona.cedula', array('onkeypress'=>"return soloNumeros(event)",'maxLength'=>8, 'style'=>'width: 150px;', 'value'=> $nuc_ci));
		//echo $this->Form->input('lugar_nacimiento', array('style'=>'width: 150px;'));
                echo "</td><td>";
                 echo $this->Form->input('Persona.telefono_movil', array('maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)", 'style'=>'width: 150px;','placeholder'=>'Ejm. 0416-5555555', 'value'=> $nuc_movil));
                echo "</tr><tr><td>";
                echo $this->Form->input('Persona.telefono_local', array('maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)", 'style'=>'width: 150px;','placeholder'=>'Ejm. 0212-5555555', 'value'=> $nuc_local));
                echo "</td><td>";
                echo $this->Form->input('Persona.telefono_trabajo', array('maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)",'style'=>'width: 150px;' ,'placeholder'=>'Ejm. 0212-5555555', 'value'=> $nuc_trabajo));
                echo "</td><td>";
		echo $this->Form->input('TipoPersona.PersonaTipoPersona', array('style'=>'width: 150px;','label'=>'Parentesco','type'=>'select', 'options'=>array('1'=>'Padre')));
                echo "</td><td>";
                echo $this->Form->input('Persona.autorizado', array('value'=> $nuc_autorizado, 'style'=>'width: 150px;','options'=>array('SI'=>'Si', 'No'=>'No'), 'empty'=>'Seleccione' ));
                echo "</td></tr><tr><td>";
                echo $this->Form->input('Persona.vive_con_el_niño', array('value'=> $nuc_vive_con, 'style'=>'width: 150px;',  'options'=>array('Si'=>'Si', 'No'=>'No'), 'empty'=>'Selecione'  ));
		echo "</td><td>";
                echo $this->Form->input('Persona.profesion', array('style'=>'width: 150px;' , 'value'=> $nuc_profesion));
               /* echo "</td><td>";
                echo $this->Form->input('Persona.correo', array('style'=>'width: 150px;','type'=>'email'));*/
                echo "</td><td colspan='2'>";
                echo $this->Form->input('Persona.foto', array('type'=>'file','required', 'label'=>'Foto (Tipo Carnet)', 'style'=>'width: 300px;'));
                echo "<label style='font-size: 13px; color: firebrick; font-weight: bold;'>FORMATOS: jpg, png o jpeg</label>";
		//echo $this->Form->input('foto', array('type'=>'file', 'style'=>'width: 300px;')); 
                //echo $this->Form->input('Persona.foto', array('style'=>'width: 300px;','type'=>'file'));
                echo "</td></tr>";
                echo $this->Form->input('Persona.id', array('style'=>'width: 150px;', 'value'=> $nuc_id));
                echo $this->Form->input('Persona.cargo_id', array('style'=>'width: 150px;', 'value'=> 6, 'type'=>'hidden'));
                echo $this->Form->input('Persona.sexo_id', array('type'=>'hidden', 'value'=>'1'));
                echo $this->Form->input('Persona.nucleo_familiar_ref', array('style'=>'width: 150px;', 'value'=> $id_representante , 'type'=>'hidden'));
                echo $this->Form->input('Persona.representante', array('style'=>'width: 150px;', 'type'=>'hidden','value'=>'No'));
                echo $this->Form->input('Persona.direccion', array('style'=>'width: 150px;', 'type'=>'hidden','value'=>'nucleo familiar'));
                
	?>
                </table>

                
	</fieldset>
       <?php break;  
        case "2": //padre
   ?>
        
        
        <fieldset style='width :880px;'>
		<legend><?php echo __('Padre'); ?></legend>
                
           <div style="float: left;"> 
   <table>
           <tr><td class="negritas"><?php echo __('Nombre'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['nombre']); ?></td>
           </tr>
           <tr><td class="negritas"><?php echo __('Apellido'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['apellido']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Cedula'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['cedula']); ?></td></tr>
         
           <tr><td class="negritas"><?php echo __('Telefono Movil'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_movil']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Telefono Local'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_local']); ?></td></tr>
           
           <tr><td class="negritas"><?php echo __('Telefono Trabajo'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_trabajo']); ?></td></tr>

           <tr><td class="negritas"><?php echo __('Sexo'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Sexo']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Estado'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Estado']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Municipio'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Municipio']['nombre']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Parroquia'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Parroquia']['nombre']); ?></td></tr>
           <tr ><td class="negritas" ><?php echo __('Direccion'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td style="width: 450px;"><?php echo h($persona['Persona']['direccion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Parentesco'); ?></td>
               <td>&nbsp;&nbsp;</td>
        <td><?php echo h($persona['TipoPersona']['0']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Representante'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['representante']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Autorizado'); ?></td>
               <td>&nbsp;&nbsp;</td>
            <td><?php echo h($persona['Persona']['autorizado']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Cargo'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo $persona['Cargo']['nombre']; ?></td></tr>
          </td>
   </table>
</div>
        <div class="flotando1">
            <?php if(!empty($persona['Persona']['foto']))
                {
            
                echo $this->Html->image("/img/persona/foto/". $persona['Persona']['foto'], array('class'=>'foto_ficha')); 
            }
            else
            {
                 echo $this->Html->image("imagen_user.jpg", array('class'=>'foto_ficha'));
                // echo "<p align='center' style='width:150px; margin-top: 0px;'>Cambie su Foto.</p>";
            }?> 
        </div> 
            

</fieldset> 
        
        <fieldset style='width :880px;'>
            <p style="font-size: 18px; text-align: center; color: #008000; display: block; background-color: #dcdcdc;">(Ingrese los datos de la Madre.)</p>
		<legend><?php echo __('Madre'); ?></legend>
                
                 <table style='width :880px;' align="center"><tr><td>
     
	<?php
        //echo debug($persona);
		echo $this->Form->input('Persona.nombre', array('style'=>'width: 150px;', 'value'=> $nuc_nombre,
                                'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)'));
                echo "</td><td>";
                echo $this->Form->input('Persona.apellido', array('style'=>'width: 150px;', 'value'=> $nuc_apellido,
                                'onkeypress'=>'return soloLetras(event)', 'onchange'=>'conMayusculas(this)'));
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 150px;'));
                echo "</td><td>";
                echo $this->Form->input('Persona.cedula', array('style'=>'width: 150px;', 'value'=> $nuc_ci, 'onkeypress'=>"return soloNumeros(event)",'maxLength'=>8,));
		//echo $this->Form->input('lugar_nacimiento', array('style'=>'width: 150px;'));
                echo "</td><td>";
                 echo $this->Form->input('Persona.telefono_movil', array('maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)", 'style'=>'width: 150px;','placeholder'=>'Ejm. 0416-5555555', 'maxlengt'=>'12', 'value'=> $nuc_movil));
                echo "</tr><tr><td>";
                echo $this->Form->input('Persona.telefono_local', array('maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)", 'style'=>'width: 150px;','placeholder'=>'Ejm. 0212-5555555', 'maxlengt'=>'12', 'value'=> $nuc_local));
                echo "</td><td>";
                echo $this->Form->input('Persona.telefono_trabajo', array('maxLength'=>12,
                                'onkeyUp'=>"telefono(this,'-',patron, true)", 'style'=>'width: 150px;','placeholder'=>'Ejm. 0212-5555555', 'maxlengt'=>'12' , 'value'=> $nuc_trabajo));
                echo "</td><td>";
		echo $this->Form->input('TipoPersona.PersonaTipoPersona', array('style'=>'width: 150px;','type'=>'select', 'options'=>array('1'=>'Madre'), 'label'=>'Parentesco'));
                echo "</td><td>";
                echo $this->Form->input('Persona.autorizado', array('value'=> $nuc_autorizado, 'style'=>'width: 150px;','options'=>array('SI'=>'Si', 'No'=>'No'), 'empty'=>'Seleccione' ));
                echo "</td></tr><tr><td>";
                echo $this->Form->input('Persona.vive_con_el_niño', array('value'=> $nuc_vive_con, 'style'=>'width: 150px;',  'options'=>array('Si'=>'Si', 'No'=>'No'), 'empty'=>'Selecione'  ));
		echo "</td><td>";
                echo $this->Form->input('Persona.profesion', array('style'=>'width: 150px;' , 'value'=> $nuc_profesion));
               /* echo "</td><td>";
                echo $this->Form->input('Persona.correo', array('style'=>'width: 150px;','type'=>'email'));*/
                echo "</td><td colspan='2'>";
                echo $this->Form->input('Persona.foto', array('type'=>'file','required', 'label'=>'Foto (Tipo Carnet)', 'style'=>'width: 300px;'));
                echo "<label style='font-size: 13px; color: firebrick; font-weight: bold;'>FORMATOS: jpg, png o jpeg</label>";
                echo "</td></tr>";
                echo $this->Form->input('Persona.id', array('style'=>'width: 150px;', 'value'=> $nuc_id));
                echo $this->Form->input('Persona.cargo_id', array('style'=>'width: 150px;', 'value'=> 6, 'type'=>'hidden'));
                echo $this->Form->input('Persona.sexo_id', array('type'=>'hidden', 'value'=>'1'));
                echo $this->Form->input('Persona.nucleo_familiar_ref', array('style'=>'width: 150px;', 'value'=> $id_representante , 'type'=>'hidden'));
                echo $this->Form->input('Persona.representante', array('style'=>'width: 150px;', 'type'=>'hidden','value'=>'No'));
                echo $this->Form->input('Persona.direccion', array('style'=>'width: 150px;', 'type'=>'hidden','value'=>'nucleo familiar'));
	?>
                </table>

                
	</fieldset>
      
        <?php break;
        case "8": //abuel@
   ?>
        
        
        <fieldset style='width :880px;'>
		<legend><?php echo __('Abuel@'); ?></legend>
                
           <div style="float: left;"> 
   <table>
           <tr><td class="negritas"><?php echo __('Nombre'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['nombre']); ?></td>
           </tr>
           <tr><td class="negritas"><?php echo __('Apellido'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['apellido']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Cedula'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['cedula']); ?></td></tr>
         
           <tr><td class="negritas"><?php echo __('Telefono Movil'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_movil']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Telefono Local'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_local']); ?></td></tr>
           
           <tr><td class="negritas"><?php echo __('Telefono Trabajo'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['telefono_trabajo']); ?></td></tr>

           <tr><td class="negritas"><?php echo __('Sexo'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Sexo']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Estado'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Estado']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Municipio'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Municipio']['nombre']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Parroquia'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Parroquia']['nombre']); ?></td></tr>
           <tr ><td class="negritas" ><?php echo __('Direccion'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td style="width: 450px;"><?php echo h($persona['Persona']['direccion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Parentesco'); ?></td>
               <td>&nbsp;&nbsp;</td>
        <td><?php echo h($persona['TipoPersona']['0']['descripcion']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Representante'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo h($persona['Persona']['representante']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Autorizado'); ?></td>
               <td>&nbsp;&nbsp;</td>
            <td><?php echo h($persona['Persona']['autorizado']); ?></td></tr>
           <tr><td class="negritas"><?php echo __('Cargo'); ?></td>
               <td>&nbsp;&nbsp;</td>
           <td><?php echo $persona['Cargo']['nombre']; ?></td></tr>
          </td>
   </table>
</div>
        <div class="flotando1">
            <?php if(!empty($persona['Persona']['foto']))
                {
            
                echo $this->Html->image("/img/persona/foto/". $persona['Persona']['foto'], array('class'=>'foto_ficha')); 
            }
            else
            {
                 echo $this->Html->image("imagen_user.jpg", array('class'=>'foto_ficha'));
                // echo "<p align='center' style='width:150px; margin-top: 0px;'>Cambie su Foto.</p>";
            }?> 
        </div> 
            

</fieldset> 
        
        <fieldset style='width :880px;'>
            <p style="font-size: 18px; text-align: center; color: #008000; display: block; background-color: #dcdcdc;">Casos Especiales. (Ingrese los datos de la Madre.)</p>
            <br>
		<legend><?php echo __('Madre'); ?></legend>
                
                 <table style='width :880px;' align="center"><tr><td>
     
	<?php
        //echo debug($persona);
		echo $this->Form->input('Persona.nombre', array('style'=>'width: 150px;', 'value'=> $nuc_nombre));
                echo "</td><td>";
                echo $this->Form->input('Persona.apellido', array('style'=>'width: 150px;', 'value'=> $nuc_apellido));
		//echo $this->Form->input('fecha_nacimiento', array('style'=>'width: 150px;'));
                echo "</td><td>";
                echo $this->Form->input('Persona.cedula', array('style'=>'width: 150px;', 'value'=> $nuc_ci, 'maxlength'=>'8'));
		//echo $this->Form->input('lugar_nacimiento', array('style'=>'width: 150px;'));
                echo "</td><td>";
                 echo $this->Form->input('Persona.telefono_movil', array('style'=>'width: 150px;','placeholder'=>'Ejm. 0416-5555555', 'maxlengt'=>'12', 'value'=> $nuc_movil));
                echo "</tr><tr><td>";
                echo $this->Form->input('Persona.telefono_local', array('style'=>'width: 150px;','placeholder'=>'Ejm. 0212-5555555', 'maxlengt'=>'12', 'value'=> $nuc_local));
                echo "</td><td>";
                echo $this->Form->input('Persona.telefono_trabajo', array('style'=>'width: 150px;','placeholder'=>'Ejm. 0212-5555555', 'maxlengt'=>'12' , 'value'=> $nuc_trabajo));
                echo "</td><td>";
		echo $this->Form->input('TipoPersona.PersonaTipoPersona', array('style'=>'width: 150px;','type'=>'select', 'options'=>array('1'=>'Madre'), 'label'=>'Parentesco'));
                echo "</td><td>";
                echo $this->Form->input('Persona.autorizado', array('value'=> $nuc_autorizado, 'style'=>'width: 150px;','options'=>array('SI'=>'Si', 'No'=>'No'), 'empty'=>'Seleccione' ));
                echo "</td></tr><tr><td>";
                echo $this->Form->input('Persona.vive_con_el_niño', array('value'=> $nuc_vive_con, 'style'=>'width: 150px;',  'options'=>array('Si'=>'Si', 'No'=>'No'), 'empty'=>'Selecione'  ));
		echo "</td><td>";
                echo $this->Form->input('Persona.profesion', array('style'=>'width: 150px;' , 'value'=> $nuc_profesion));
               /* echo "</td><td>";
                echo $this->Form->input('Persona.correo', array('style'=>'width: 150px;','type'=>'email'));*/
                echo "</td><td colspan='2'>";
                echo $this->Form->input('Persona.foto', array('type'=>'file','required', 'label'=>'Foto (Tipo Carnet)', 'style'=>'width: 300px;'));
                echo "<label style='font-size: 13px; color: firebrick; font-weight: bold;'>FORMATOS: jpg, png o jpeg</label>";
                echo "</td></tr>";
                echo $this->Form->input('Persona.id', array('style'=>'width: 150px;', 'value'=> $nuc_id));
                echo $this->Form->input('Persona.cargo_id', array('style'=>'width: 150px;', 'value'=> 6, 'type'=>'hidden'));
                echo $this->Form->input('Persona.sexo_id', array('type'=>'hidden', 'value'=>'1'));
                echo $this->Form->input('Persona.nucleo_familiar_ref', array('style'=>'width: 150px;', 'value'=> $id_representante , 'type'=>'hidden'));
                echo $this->Form->input('Persona.representante', array('style'=>'width: 150px;', 'type'=>'hidden','value'=>'No'));
                echo $this->Form->input('Persona.direccion', array('style'=>'width: 150px;', 'type'=>'hidden','value'=>'nucleo familiar'));
	?>
                </table>

                
	</fieldset>
      
        <?php break;} 
        
        } //cierre del if($parentesco)
        echo $this->Form->end(__('Guardar')); ?>
</div>

