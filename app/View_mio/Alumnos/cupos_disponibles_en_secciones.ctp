<?php
//echo debug($gradosSecciones);
//echo debug($gradosSecciones);
$cupos = $gradosSecciones['GradosSeccione']['cupos'];
$disponibles = $gradosSecciones['GradosSeccione']['cupos_asignados'];
$restantes = $cupos - $disponibles;
if($restantes == 0)
{
    echo "<p style='color: red; font-weigth: bold;'>Esta seccion no tiene cupos disponibles.</p>";
}
 else {
    echo "<p style='color: green; font-weigth: bold;'>Esta seccion le quedan $restantes &nbsp; cupos disponibles.</p>";
}
?>
