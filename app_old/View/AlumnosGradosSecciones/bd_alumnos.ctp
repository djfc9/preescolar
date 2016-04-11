<?php ?>
<p style="text-align: center; color: #e32;
	font-size: 90%;
	font-weight: bold;">Registros Encontrados.</p>
<table align="center">
    <tr>
            <th>Nro</th>
            <th>Cédula Escolar</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Teléfono</th>
    </tr>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//debug($gradosSecciones);
$id_g_s = $gradosSecciones['0']['AlumnosGradosSeccione']['grados_seccione_id'];
 echo "<div style='float: right'>";
echo $this->Html->image('pdf_report.png', array('class'=>'botones_superiores', 'title'=>'Imprimir Reporte','width'=>'52px;', 'heigth'=>'72px;','url'=>
     array('controller'=>'AlumnosGradosSecciones', 'action'=>'dbpdf', $id_g_s))); 
echo "</div>";
$i = 0;
 foreach ($gradosSecciones as $datos):
     //echo debug($datos);
     if($datos['Alumno']['estatu_id'] == 2){
     $sexo =$datos['Alumno']['sexo_id'];
     ?>
        <tr>
            <td><?php echo $i = $i+1; ?></td>
            <td><?php echo $datos['Alumno']['cedula_escolar']; ?></td>
            <td><?php echo $datos['Alumno']['nombre']; ?></td>
            <td><?php echo $datos['Alumno']['apellido']; ?></td>
            <td><?php if($sexo == 1){ 
                echo "Masculino";
                 }
                else
                {
                    echo "Femenino";
                }
            ?></td>
            <td><?php echo $datos['Alumno']['telefono_habitacion']; ?></td>
        </tr>
 
 <?php  } endforeach;?>
 </table>