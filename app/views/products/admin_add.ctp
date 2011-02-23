<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
 		<legend><?php __('Admin Add Product'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('manufacturer_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('codigo');
		echo $this->Form->input('cod_barras');
		echo $this->Form->input('clasificacion');
		echo $this->Form->input('promocionar');
		echo $this->Form->input('destacar');
		echo $this->Form->input('ficha_producto');
		echo $this->Form->input('image_producto', array("id"=>"single-field"));
		echo $this->Form->input('inventario');
		echo $this->Form->input('stock_minimo');
		echo $this->Form->input('stock_maximo');
		echo $this->Form->input('costo');
		echo $this->Form->input('costo_promedio');
		echo $this->Form->input('tarifa_iva');
		echo $this->Form->input('valor_iva');
		echo $this->Form->input('porc_utilidad');
		echo $this->Form->input('valor_venta');
		echo $this->Form->input('estado_prod');
		echo $this->Form->input('rotacion');
		echo $this->Form->input('tiempo_reposicion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>


<div class="images">
	<h2>Imagen</h2>
	<div class="preview">
	</div>
	<div id="single-upload">	
</div>
</div>


</div>


<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products', true), array('action' => 'index'));?></li>
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