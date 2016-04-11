<div style="float: right">
<?php echo $this->Html->image('pdf.png', array('class'=>'botones_superiores', 
    'title'=>'Imprimir Reporte','width'=>'52px;', 'heigth'=>'72px;','url'=>array('action'=>'viajes_pdf', $id)));
 ?>
</div>
<center><h2 style="color: green;">Niñ@s Autorizados</h2></center>
<br>
<table align='center'>
    <tr>
    <th>Nombre:</th>
    <th>Apellido:</th>
    <th>Cedula Escolar:</th>
    </tr>
<?php
foreach ($alumnos_aut as $lista_aut):
    //echo debug($lista);
    echo "<tr><td>";
  echo $lista_aut['Alumno']['nombre']."&nbsp;";
  echo "</td><td>";
  echo $lista_aut['Alumno']['apellido']."&nbsp;";
  echo "</td><td>";
  echo $lista_aut['Alumno']['cedula_escolar']."<br>";
  echo "</td><tr>";
endforeach;
?>
    </table>
<br><br>
<center><h2>Niñ@s NO Autorizados</h2></center>
<br>
<table align='center'>
    <tr>
    <th>Nombre:</th>
    <th>Apellido:</th>
    <th>Cedula Escolar:</th>
    </tr>
<?php
foreach ($alumnos as $lista):
    //echo debug($lista);
    echo "<tr><td>";
  echo $lista['Alumno']['nombre']."&nbsp;";
  echo "</td><td>";
  echo $lista['Alumno']['apellido']."&nbsp;";
  echo "</td><td>";
  echo $lista['Alumno']['cedula_escolar']."<br>";
  echo "</td><tr>";
endforeach;
?>
</table>
