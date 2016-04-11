<div class="contenido_principal">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('respuesta'); ?></th>
                        <th><?php echo $this->Paginator->sort('email'); ?></th>
			
			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Question']['nombre'], 
                                array('controller' => 'questions', 'action' => 'view', $user['Question']['id'])); ?>
		</td>
                <td><?php echo h($user['User']['respuesta']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		
		
		<td class="actionss"> 
                    <?php echo $this->Html->image('buscar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Ver','title'=>'Ver',
                            'url'=>array('action' => 'view', base64_encode($user['User']['id'])))); ?>
	            <?php echo $this->Html->image('editar.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar','title'=>'Editar',
                            'url'=>array('action' => 'edit', base64_encode($user['User']['id'])))); ?>
                    <?php echo $this->Html->image('editar_todo.png', array('width'=>'40px;', 'heigth'=>'40px;', 'alt'=>'Editar Todo','title'=>'Editar Todo',
                            'url'=>array('action' => 'edit_1', base64_encode($user['User']['id'])))); ?>
		    <?php echo $this->Form->postLink(
                            $this->Html->image('eliminar.png',
                                        array('width'=>'40px;', 'heigth'=>'40px;','title'=>'Eliminar', 'alt'=>'Eliminar')),
                                        array('action' => 'delete', base64_encode($user['User']['id'])),
                                        array('escape'=> false, 'confirm' => 
                                            __('¿Esta seguro que quiere eliminar este Usuario?', base64_encode($user['User']['id'])))); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
