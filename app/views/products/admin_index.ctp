<div class="products index">
	<h2><?php __('Products');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('manufacturer_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('codigo');?></th>
			<th><?php echo $this->Paginator->sort('cod_barras');?></th>
			<th><?php echo $this->Paginator->sort('clasificacion');?></th>
			<th><?php echo $this->Paginator->sort('promocionar');?></th>
			<th><?php echo $this->Paginator->sort('destacar');?></th>
			<th><?php echo $this->Paginator->sort('ficha_producto');?></th>
			<th><?php echo $this->Paginator->sort('image_producto');?></th>
			<th><?php echo $this->Paginator->sort('inventario');?></th>
			<th><?php echo $this->Paginator->sort('stock_minimo');?></th>
			<th><?php echo $this->Paginator->sort('stock_maximo');?></th>
			<th><?php echo $this->Paginator->sort('costo');?></th>
			<th><?php echo $this->Paginator->sort('costo_promedio');?></th>
			<th><?php echo $this->Paginator->sort('tarifa_iva');?></th>
			<th><?php echo $this->Paginator->sort('valor_iva');?></th>
			<th><?php echo $this->Paginator->sort('porc_utilidad');?></th>
			<th><?php echo $this->Paginator->sort('valor_venta');?></th>
			<th><?php echo $this->Paginator->sort('estado_prod');?></th>
			<th><?php echo $this->Paginator->sort('rotacion');?></th>
			<th><?php echo $this->Paginator->sort('nit_proveedor');?></th>
			<th><?php echo $this->Paginator->sort('tiempo_reposicion');?></th>
			<th><?php echo $this->Paginator->sort('control_invent');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($products as $product):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $product['Product']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Category']['nombre'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['Manufacturer']['nombre'], array('controller' => 'manufacturers', 'action' => 'view', $product['Manufacturer']['id'])); ?>
		</td>
		<td><?php echo $product['Product']['nombre']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['codigo']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['cod_barras']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['clasificacion']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['promocionar']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['destacar']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['ficha_producto']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['image_producto']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['inventario']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['stock_minimo']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['stock_maximo']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['costo']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['costo_promedio']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['tarifa_iva']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['valor_iva']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['porc_utilidad']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['valor_venta']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['estado_prod']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['rotacion']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['nit_proveedor']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['tiempo_reposicion']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['control_invent']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['created']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
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
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturers', true), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer', true), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photo Albums', true), array('controller' => 'photo_albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo Album', true), array('controller' => 'photo_albums', 'action' => 'add')); ?> </li>
	</ul>
</div>