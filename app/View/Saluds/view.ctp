<div class="contenido_principal">
<h2><?php echo __('Ficha de Salud'); ?></h2>

         <table>
           <tr style ="width :10px;">
           <td><?php echo __('Alumno'); ?></td>
           <td><?php echo $this->Html->link($salud['Alumno']['nombre'], array('controller' => 'alumnos', 'action' => 'view', base64_encode($salud['Alumno']['id']))); ?></td>
           </tr>
           <tr><td><?php echo __('Control Prenatal'); ?></td>
           <td>  <?php if($salud['Salud']['control_prenatal'] == 1 ){
                          echo "Si.";  
                        }
                        else
                        {
                          echo " No. ";   
                        }
                        ?></td></tr>
           <tr><td><?php echo __('Complicacion(es) durante el Embarazo'); ?></td>
           <td><?php echo h($salud['ComplicacionEmbarazo']['nombre']); ?></td></tr>
           <tr><td><?php echo __('Parto'); ?></td>
           <td><?php echo h($salud['TipoParto']['descripcion']); ?></td></tr>
           <tr><td><?php echo __('Problema en el Nacimiento'); ?></td>
           <td><?php echo h($salud['TipoProblemaNacimiento']['descripcion']); ?></td></tr>
           
          
           <tr><td><?php echo __('Respiro/Lloro al Nacer'); ?></td>
           <td><?php if($salud['Salud']['respiro_lloro_nacer'] == 1 ){
                          echo "Si. ";  
                        }
                        else
                        {
                          echo " No.";   
                        }
                        ?></td></tr>
           <tr><td><?php echo __('Peso al Nacer'); ?></td>
           <td><?php echo h($salud['Salud']['peso_nacer']); ?></td></tr>
           <tr><td><?php echo __('Talla al Nacer'); ?></td>
           <td><?php echo h($salud['Salud']['talla_nacer']); ?></td></tr>
           <tr><td><?php echo __('Grupo Sanguineo'); ?></td>
           <td><?php echo h($salud['Salud']['grupo_sanguineo']); ?></td></tr>
           <tr><td><?php echo __('Alergico'); ?></td>
           <td> <?php $alergico = $salud['Salud']['alergico']; if($alergico == 0 ){
                          echo " No.";  
                        }
                        else
                        {
                           echo h($salud['Salud']['alergico']); 
                        }
                        ?></td></tr>
           <tr><td><?php echo __('Problema de Aprendizaje'); ?></td>  
           <td><?php echo h($salud['ProblemaAprendizaje']['descripion']); ?></td></tr>
           <tr><td><?php echo __('Tratamiento de Problema de Aprendizaje'); ?></td>
           <td><?php echo h($salud['Salud']['tratamiento_prob_aprendizaje']); ?></td></tr>
           <tr><td><?php echo __('Control Pediatrico'); ?></td>
           <td><?php echo h($salud['Salud']['control_pediatrico']); ?></td></tr>
           <tr><td><?php echo __('Enfermedad(es) Padecida(s)'); ?></td>
           <td><?php echo h($salud['Salud']['enfermedad_padecida']); ?></td></tr>
           <tr><td><?php echo __('Poliza Seguros'); ?></td>
           <td><?php echo h($salud['Salud']['poliza_seguros']); ?></td></tr>
           <tr><td><?php echo __('Medicamento para Fiebre'); ?></td>
           <td><?php echo h($salud['Salud']['medicamento_fiebre']); ?></td></tr>
           

   </table>


</div>