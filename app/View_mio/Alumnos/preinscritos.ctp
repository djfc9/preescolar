

<div class="contenido_principal">
<div id='buscador_caja'>
<div class="flotados5">
    <?php
        echo $this->Form->input('AlumnoCedulaEscolar', array('style'=>'width: 150px;', 'label'=>'Cedula Escolar','placeholder'=>'Ejm. 11209568332'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('consultar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busqueda_lista', 'title'=>'Consultar'));
        echo $this->Html->image('pdf.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'title'=>'Imprimir', 'url'=>array('action'=>'lista_preinscritos')));
        ?></div></div>

<br>
<fieldset>
    <legend><?php echo __('Listado de alumnos preinscritos'); ?></legend>
        <div id="actual" style="display: block;">
	<table style='width :860px;' cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cedula_escolar'); ?></th>
                        <th><?php echo $this->Paginator->sort('nombre'); ?></th>
                        <th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_nacimiento'); ?></th>
			<th><?php echo 'Edad Hoy'; ?></th>
			<th><?php echo 'Edad Septiembre'; ?></th>
			<th><?php echo $this->Paginator->sort('estatus'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
       
	<?php foreach ($alumnos as $alumno): ?>
	<tr>
            <?php
///funcion para calcular la edad del niño en septiembre...
$f_na = $alumno['Alumno']['fecha_nacimiento'];
$fecha_de_hoy = date("Y-m-d");

$hoy1 = getdate();
$dias_del_mes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
 $valores1 = explode('-', $f_na);
 //echo debug($valores);
$año1 = $valores1[0];
$mes1 = $valores1[1];
$dia1 = $valores1[2];

$años1 = $hoy1['year'] - $año1;
$meses1 = 9 - $mes1;
/*$dias1 = 1 - $dia1;

if($dias1 < 0)
{
$mes_anterior = 10;
$dias1 += $dias_del_mes[$mes_anterior];
//$dias += $dias_del_mes[$hoy['mon']];
$meses1--;
}*/
if($meses1 < 0)
{
$meses1 += 12;
$años1--;
}
//echo $años1."-".$meses1."<br>";


///funcion para calcular la edad del niño el dia de hoy
$hoy = getdate();
$dias_del_mes = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
 $valores = explode('-', $f_na);
$año = $valores[0];
$mes = $valores[1];
$dia = $valores[2];

$años = $hoy['year'] - $año;
$meses = $hoy ['mon'] - $mes;
$dias = $hoy['mday'] - $dia;

if($dias < 0)
{
$mes_anterior = $hoy['mon'] -1;
$dias += $dias_del_mes[$mes_anterior];
//$dias += $dias_del_mes[$hoy['mon']];
$meses--;
}
if($meses < 0)
{
$meses += 12;
$años--;
}
?>
		<td><?php echo h($alumno['Alumno']['cedula_escolar']); ?>&nbsp;</td>
                <td><?php echo h($alumno['Alumno']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($alumno['Alumno']['fecha_nacimiento']); ?>&nbsp;</td>
		<td><?php echo "<font color='red'>".$años." Años/ ".$meses."  Meses.</font>"; ?>&nbsp;</td>
		<td><?php echo "<font color='green'>".$años1." años/ ".$meses1."  Meses.</font>";; ?>&nbsp;</td>
                    <?php  $estatus= h($alumno['Estatu']['id']); if ($estatus == 1) 
                {
                echo "<td style='background-color: lightgreen;'>";}
                else {
                    echo "<td  style='background-color: #9CF8EF'>";
                }?>
		<?php  echo h($alumno['Estatu']['nombre']); ?>
		</td>
		<td class="actionsss">
			<?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver', 'url'=>array('action' => 'view', $alumno['Alumno']['id']))); ?>
			<?php // echo $this->Html->link(__('Edit'), array('action' => 'editar', $alumno['Alumno']['id'])); ?>
			<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $alumno['Alumno']['id']), null, __('Are you sure you want to delete # %s?', $alumno['Alumno']['id'])); ?>
		</td>
	</tr>
        
<?php endforeach; ?>
	</table>
         
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>  
        <div id='informacion'></div>
</fieldset>

</div>