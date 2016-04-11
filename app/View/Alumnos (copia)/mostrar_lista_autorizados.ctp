 <?php
 //echo debug($personas);
               if(!empty($alumno)){
                foreach ($alumno as $info_alumno): 
                    // debug($info_alumno);
                
  ?>
<table>
     <tr>
         <td colspan="5">
             <?php echo "<h3 align='center'>Autorizados de: ".$info_alumno['Alumno']['nombre']."&nbsp;&nbsp;".$info_alumno['Alumno']['apellido'].".</h3>"; ?>
         </td>
     </tr>
     <tr style="background-color: #08839C;">
         <th>C&eacute;dula</th>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Parentesco</th>
         <th>Teléfono</th>
     </tr>
	<?php
                endforeach; 
                foreach ($personas as $informacion):
                    // debug($informacion);
             $parentesco = $informacion['TipoPersona']['0']['id'];
        ?>
     <tr>
         <th><?php echo $informacion['Persona']['cedula'];  ?></th>
         <th><?php echo $informacion['Persona']['nombre'];  ?></th>
         <th><?php echo $informacion['Persona']['apellido']; ?></th>
         
         <th><?php switch ($parentesco)
         {
                case "1":
                     echo "Madre"; 
                break;
                case "2":
                     echo "Padre";
                break;
                case "3":
                     echo "Caso Especial";
                break;
                case "4":
                     echo "Ti@";
                break;
                case "6":
                    echo "Prim@";
                break;
                case "7":
                    echo "Amig@";
                break;
                case "8":
                    echo "Abuel@";
                break;
         }
         
 ?></th>
         <th><?php echo $informacion['Persona']['telefono_movil'];  ?></th>
         <?php echo "";  endforeach; ?>
    </tr>
 </table>
       </fieldset>
               <?php   }  else {
      echo "<center><h2>No se encontraron registros...</h2></center>";
  }
               ?>
</div>     