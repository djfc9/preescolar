           <?php
           //debug($datos);
              foreach ($datos as $datosp):
              $id= $datos['0']['Persona']['id'];
              $nombre =  $datos['0']['Persona']['nombre'];
              $apellido =  $datos['0']['Persona']['apellido'];
              endforeach;
              
           ?>
<div class="flotados1" style="vertical-align: central;">
               
               <div style="float: left; clear: both; margin-left: 475px; margin-top: 5px;"><p>Bienvenid@, <?php echo $nombre."&nbsp;&nbsp;".$apellido."&nbsp;al Sistema.&nbsp;&nbsp;<br>";?></p><br>
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
    </div>
    <br><center>
        <br><br>
        <p style="font-family: arial,verdana,helvetica,sans-serif;
                font-size: 25px;
                color: #757575;
                width: 550px;
                text-align: center;
                height: 25px !important;">Se conceden 2 dias de prórroga y Quedan</p>
        <div id='contador' style="font-family: arial,verdana,helvetica,sans-serif;
                font-size: 25px;
                color: #757575;
                width: 500px;
                background: url(../img/nodo_bg.jpg) repeat-x scroll left top transparent;
                border: 1px solid #D8D8D8;
                height: 25px !important;
                margin: 0 10px;
                padding: 2px 10px 5px !important;">
        
        </div>
        <br>
        <p style="font-family: arial,verdana,helvetica,sans-serif;
                font-size: 25px;
                color: #757575;
                height: 25px !important;">Parar terminar el proceso de preinscripción.</p>
    </center>
		   </div>
   
<div class="clear"></div>
</div>
