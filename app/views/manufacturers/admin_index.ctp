<div class="manufacturers index">
	<h2><?php __('Fabricantes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($manufacturers as $manufacturer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $manufacturer['Manufacturer']['id']; ?>&nbsp;</td>
		<td><?php echo $manufacturer['Manufacturer']['nombre']; ?>&nbsp;</td>
		<td><?php echo $manufacturer['Manufacturer']['created']; ?>&nbsp;</td>
		<td><?php echo $manufacturer['Manufacturer']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $manufacturer['Manufacturer']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $manufacturer['Manufacturer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $manufacturer['Manufacturer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Fabricante', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>