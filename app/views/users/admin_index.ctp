<div class="users index">
	<h2><?php __('Usuarios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('role_id');?></th>
			<th><?php echo $this->Paginator->sort('primer_nombre');?></th>
			<th><?php echo $this->Paginator->sort('segundo_nombre');?></th>
			<th><?php echo $this->Paginator->sort('primer_apellido');?></th>
			<th><?php echo $this->Paginator->sort('segundo_apellido');?></th>	
			<th><?php echo $this->Paginator->sort('foto');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Role']['name'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
		</td>
		<td><?php echo $user['User']['primer_nombre']; ?>&nbsp;</td>
		<td><?php echo $user['User']['segundo_nombre']; ?>&nbsp;</td>
		<td><?php echo $user['User']['primer_apellido']; ?>&nbsp;</td>
		<td><?php echo $user['User']['segundo_apellido']; ?>&nbsp;</td>
		<td><?php echo $user['User']['foto']; ?>&nbsp;</td>
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Usuario', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Reporte', true), array('action' => 'selectReport')); ?></li>
		<!--
		<li><?php echo $this->Html->link(__('List Roles', true), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role', true), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Audits', true), array('controller' => 'audits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Audit', true), array('controller' => 'audits', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Passoword Changes', true), array('controller' => 'passoword_changes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passoword Change', true), array('controller' => 'passoword_changes', 'action' => 'add')); ?> </li>
		-->
	</ul>
</div>