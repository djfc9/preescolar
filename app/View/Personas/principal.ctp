           <?php
              $nombre =  $datos['0']['Persona']['nombre'];
              $apellido =  $datos['0']['Persona']['apellido'];

              
           ?>
<div class="flotados1" style="vertical-align: central;">
               
               <div style="float: left; clear: both; margin-left: 475px; margin-top: 5px;">
                   <p>
                       Bienvenid@, <?php echo $nombre."&nbsp;&nbsp;".$apellido."&nbsp;al Sistema.&nbsp;&nbsp;<br>";?>
                   </p>
                   <br>
               </div>
    <div style="float: right; margin-right: 5px; margin-top: 5px;">
         <?php  if(!empty($datos['0']['Persona']['foto']))
                {
            
                echo $this->Html->image("/img/persona/foto/". $datos['0']['Persona']['foto'], array('class'=>'foto_ficha1')); 
            }
            else
            {
                 echo $this->Html->image("imagen_user.jpg", array('class'=>'foto_ficha1'));
                // echo "<p align='center' style='width:150px; margin-top: 0px;'>Cambie su Foto.</p>";
            } 
            
            
            //echo $datos['0']['Persona']['id'];  ?> 
        <br>
        <a href="/preescolar/comidas/index" title="Ver el Menú diario" style="float: right;">
            <?php  echo $this->Html->image("menu.png", array('class'=>'foto_ficha1')); ?>
        </a>
    </div>
    <br><center>
        <?php echo $this->Html->image('/img/provervios/efesios6-4.jpg', array('style'=>'width: auto; height: 190px;')); ?>
        
        
        <!--<br><br>
        <p style="font-family: arial,verdana,helvetica,sans-serif;
                font-size: 25px;
                color: #757575;
                width: 550px;
                text-align: justify;
                height: 20px !important;">El superpoder más importante de un papá es convertirse en un niño mientras juega y en un gigante sabio cuando tiene que proteger y enseñar.</p>
    --></center>
    
   
		   </div>

   
<div class="clear"></div>
 <?php
    $pregunta_seguridad = $sesion['question_id'];
    $respuesta_seguridad = $sesion['respuesta'];
    $sesion_persona = $sesion['id'];
    if($pregunta_seguridad == '6' && $respuesta_seguridad ==','){
        $sesion_persona = base64_encode($sesion_persona);
        echo "<script type='text/javascript'>"
                    . "var confirmar = confirm('Por motivos de Seguridad es necesario registrar una pregunta y respuesta de seguridad, desea registrarlas ahora?');"
                    ."if(confirmar == true){"
                    . "document.location=('/preescolar/users/pregunt_seg/$sesion_persona'); }"
                    . "</script>";
    }
    ?>