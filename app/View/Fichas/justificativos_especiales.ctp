
<div class="contenido_principal">
<?php echo $this->Form->create(Null, array('type'=>'post','controller'=>'Fichas', 'action'=>'justificativos_pdf_especiales')); ?>
	<fieldset>
		<legend><?php echo __('Planilla de Justificativos Especiales'); ?></legend>
                <div id='buscador_caja'>
<div class="flotados5">
    <?php
        echo $this->Form->input('Ficha.Alumno.cedula_escolar', array('style'=>'width: 150px;', 'label'=>'Cedula Escolar','placeholder'=>'Ejm. 11209568332'));
        echo "</div><div class='flotados3'>";
        echo $this->Html->image('buscar.png', array('class'=>'flotados3', 'width'=>'40px;', 'heigth'=>'40px;', 'id'=>'busqueda_lista_aut_niño'));
        ?></div></div>
                
                <table cellpadding="0" cellspacing="0" style="width: 880px;">
                
            <tr>
                <td border='1' class='flotados2'>
                    <div id='lista_autorizados' style='float: left'>
                     <?php echo $this->Form->input('Autorizados', array('type'=>'checkbox')); ?>
                    </div>
                </td>
                <td colspan="2" border='1' class='flotados2'>
                    <p align='center'>Asistio esta institución en el horario comprendido</p>
                </td>
            </tr>
            <tr>
                <td style ='width: 250px;'>
                    <?php echo $this->Form->input('fecha', array('type'=>'date')); ?>
                </td>
                 <td style ='width: 250px;'>
                <?php echo $this->Form->input('desde', array('type'=>'time','style'=>'width: 50px;', 'label'=>'Desde')); ?> 
                </td>
                <td style ='width: 250px;'>
                  <?php echo $this->Form->input('hasta', array('type'=>'time','style'=>'width: 50px;', 'label'=>'Hasta')); ?> 
                </td>
            </tr>

		
                
		
		
                
        </table>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?> 
</div>

