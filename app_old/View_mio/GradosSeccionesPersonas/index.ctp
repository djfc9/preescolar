
<div class="contenido_principal">
	<h2><?php echo __('Grados y Secciones Asignadas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Profesor'); ?></th>
                        <th><?php echo "Descripción"; ?></th>
	</tr>
	<?php foreach ($gradosSeccionesPersonas as $gradosSeccionesPersona): ?>
        <?php $descripcion = $gradosSeccionesPersona['Persona']['GradosSeccione']['0']['descripcion']; ?>
	<tr>
		<td>
			<?php 
                        $foto = $gradosSeccionesPersona['Persona']['foto'];
                        if(!empty($foto))
                {
            
                echo $this->Html->image("/img/persona/foto/". $foto, array('class'=>'foto_ficha1', 'style'=>'vertical-align: central;'))."&nbsp;"; 
            }
            else
            {
                 echo $this->Html->image("imagen_user.jpg", array('class'=>'foto_ficha1', 'style'=>'vertical-align: central;'))."&nbsp;";
                // echo "<p align='center' style='width:150px; margin-top: 0px;'>Cambie su Foto.</p>";
            } 
                    
                        echo $this->Html->link($gradosSeccionesPersona['Persona']['nombre'], array('controller' => 'personas', 'action' => 'view', $gradosSeccionesPersona['Persona']['id']));
                        echo "&nbsp;";
                        echo $this->Html->link($gradosSeccionesPersona['Persona']['apellido'], array('controller' => 'personas', 'action' => 'view', $gradosSeccionesPersona['Persona']['id']));
                            ?>
		</td>
                <td><?php echo $descripcion; ?>&nbsp;</td>
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

