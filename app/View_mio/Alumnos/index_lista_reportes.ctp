<?php if(!empty($alumnos)){ ?>
<div class="contenido_principal">
	<table style='width :896px;' cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cédula_escolar'); ?></th>
                        <th style="width: 100px;"><?php echo $this->Paginator->sort('nombre'); ?></th>
                        <th style="width: 100px;"><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('ingreso'); ?></th>
			<th><?php echo $this->Paginator->sort('telf habitacion'); ?></th>
			<th><?php echo $this->Paginator->sort('estatus'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
       
	<?php foreach ($alumnos as $alumno): ?>
	<tr>
            <td>&nbsp;<?php echo h($alumno['Alumno']['cedula_escolar']); ?>&nbsp;</td>
                <td style="width: 100px;">&nbsp;<?php echo h($alumno['Alumno']['nombre']); ?>&nbsp;</td>
		<td style="width: 100px;">&nbsp;<?php echo h($alumno['Alumno']['apellido']); ?>&nbsp;</td>
		<td>&nbsp;<?php echo h($alumno['Alumno']['fecha_ingreso']); ?>&nbsp;</td>
		<td>&nbsp;<?php echo h($alumno['Alumno']['telefono_habitacion']); ?>&nbsp;</td>
		<td>
			<?php  echo h($alumno['Estatu']['nombre']); ?>
		</td>
		<td class="actionsss">
			<?php $this->Form->create(); 
                        $id = $alumno['Alumno']['id'];
                        if ($alumno['Alumno']['estatu_id'] == 2)
                        {
                        ?>
                            <?php echo $this->Form->input('acciones_rep',array('type'=>'select','options'=>array(
                                '/preescolar/alumnos/c_estudio/'."$id"=>'Constancia de estudios',
                                '/preescolar/alumnos/c_inscripcion/'."$id"=>'Constancia de inscripcion',
                                '/preescolar/alumnos/c_conducta/'."$id"=>'Constancia de conducta',
                                /*'/preescolar/alumnos/c_asistencia/'."$id"=>'Constancia de asistencia diaria',*/
                                '/preescolar/alumnos/c_ced_escolar/'."$id"=>'Constancia de cédula escolar',
                                '/preescolar/alumnos/c_solvencia/'."$id"=>'Constancia de solvencia',
                                '/preescolar/alumnos/c_retiro/'."$id"=>'Constancia de retiro'),'empty'=>'Seleccione','label'=>false) ); ?>

                        <?php  }else{
                            echo $this->Form->input('acciones_rep',array('type'=>'select','options'=>array(
                                '/preescolar/alumnos/c_conducta/'."$id"=>'Constancia de conducta',
                                '/preescolar/alumnos/c_ced_escolar/'."$id"=>'Constancia de cédula escolar',
                                '/preescolar/alumnos/c_solvencia/'."$id"=>'Constancia de solvencia',
                                '/preescolar/alumnos/c_retiro/'."$id"=>'Constancia de retiro'),'empty'=>'Seleccione','label'=>false) );
                        }// echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $alumno['Alumno']['id']), null, __('Are you sure you want to delete # %s?', $alumno['Alumno']['id'])); ?>
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
<?php }
        else
        {
          echo "<center>Busqueda no produjo resultados</center>";  
        }
        ?>