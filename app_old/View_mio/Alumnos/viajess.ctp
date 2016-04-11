<div style="float: right">
<?php echo $this->Html->image('pdf.png', array('class'=>'botones_superiores', 
    'title'=>'Imprimir Reporte','width'=>'52px;', 'heigth'=>'72px;','url'=>array('action'=>'viajes_pdf', $id)));
 ?>
</div>
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
