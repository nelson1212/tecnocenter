<div class="products index">
	<h2><?php __('Productos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort("Fabricante",'manufacturer_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('codigo');?></th>
		
	

			<th class="actions"><?php __('Acciones');?></th>
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


		<td class="actions">
			<?php 
				if($product['Product']['destacar']){
					echo $this->Html->link(__('No Destacar', true), array('action' => 'nodestacar', $product['Product']['id'])); 
				}else{
					echo $this->Html->link(__('Destacar', true), array('action' => 'destacar', $product['Product']['id'])); 
				}
			?>
			
			<?php 
				if($product['Product']['estado_prod']){
					echo $this->Html->link(__('Desactivar', true), array('action' => 'desactivar', $product['Product']['id'])); 
				}else{
					echo $this->Html->link(__('Activar', true), array('action' => 'activar', $product['Product']['id'])); 
				}
			?>
			
			<?php 
				if($product['Product']['promocionar']){
					echo $this->Html->link(__('No Promocionar', true), array('action' => 'nopromocionar', $product['Product']['id'])); 
				}else{
					echo $this->Html->link(__('Promocionar', true), array('action' => 'promocionar', $product['Product']['id'])); 
				}
			?>
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Producto', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorías', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoría', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Fabricantes', true), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Fabricante', true), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
		
		<!--
		
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photo Albums', true), array('controller' => 'photo_albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo Album', true), array('controller' => 'photo_albums', 'action' => 'add')); ?> </li>
		-->
	</ul>
</div>