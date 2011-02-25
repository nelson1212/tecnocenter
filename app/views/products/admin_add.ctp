<div class="products form">
<?php echo $this->Form->create('Product', array('type'=>'file'));?>
	<fieldset>
 		<legend><?php __('Añadir Producto'); ?></legend>
 		<div class="layer">
 		<?php
			echo $this->Form->input('category_id',array("div"=>"inline"));
			echo $this->Form->input('manufacturer_id',array("div"=>"inline"));
			echo $this->Form->input('estado',array("div"=>"inline","options"=>array("Activo"=>"Activo","Inactivo"=>"Inactivo")));
			echo $this->Form->input('rotacion',array("div"=>"inline","options"=>array("Alta"=>"Alta","Media"=>"Media","Baja"=>"Baja")));
			echo $this->Form->input('nombre');
			echo $this->Form->input('codigo');
			echo $this->Form->input('cod_barras');
			echo $this->Form->input('descripcion');
			echo $this->Form->input('promocionar',array("div"=>"inline"));
			echo $this->Form->input('destacar',array("div"=>"inline"));
		?>
 		</div>
 		<div class="layer">
 		<?php
		
		echo $this->Form->input('inventario');
		echo $this->Form->input('stock_minimo');
		echo $this->Form->input('stock_maximo');
		echo $this->Form->input('costo');
		echo $this->Form->input('costo_promedio');
		echo $this->Form->input('tarifa_iva');
		echo $this->Form->input('valor_iva');
		echo $this->Form->input('porc_utilidad');
		echo $this->Form->input('valor_venta');
		echo $this->Form->input('tiempo_reposicion');
		?>
 		</div>
 		<div class="layer">
 		<?php
 			echo $this->Form->input('ficha_producto', array("type"=>"file", "id"=>"ficha_producto"));
 			echo $this->Form->input('imagen_listado', array("type"=>"file", "id"=>"imagen_listado"));
 			echo $this->Form->input('imagen_principal', array("type"=>"file", "id"=>"imagen_principal"));
			echo $this->Form->input('imagen_destacar', array("type"=>"file","id"=>"imagen_destacar"));
			echo $this->Form->input('imagen_ficha_tecnica', array("type"=>"file","id"=>"imagen_ficha_tecnica"));
		?>
 		</div>

	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>





</div>