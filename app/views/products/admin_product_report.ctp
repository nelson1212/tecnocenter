<div class="users form">
<?php echo $this->Form->create('Product');?>
  <fieldset>
    <legend><?php __('Reportes de productos'); ?></legend>
  <?php
  if(isset($reporte))
  	{
        //debug($reporte);

		echo "<br>";
		for($i=0; $i<count($reporte); $i++)
		{
			foreach($reporte[$i]['Product'] as $indice =>$valor)
			{
				echo $indice." : ".$valor."<br>";
			}
			echo "<br><br>";
		}
		echo $this->Html->link(__('Regresar', true), array('action' => 'admin_product_report'));
	} 
  else 
	{
	
	echo "<h4>Seleciona los parametros para generar el reporte</h4>";
    echo "<hr>"; 
    echo $this->Form->input('Reporte.categoria', 
                            array('label'=>'Selecciona una categoria', 'type'=>'select','empty'=>'','options'=>$categorias));
							
	echo $this->Form->input('Reporte.estado', 
                            array('label'=>'Selecciona un estado', 'type'=>'select','empty'=>'','options'=>array('1'=>'Activo','2'=>'Inactivo')));
							
	echo $this->Form->input('Reporte.fecha_inicial', 
                            array('label'=>'Fecha inicial', 'empty'=>array("")));
							
	echo $this->Form->input('Reporte.fecha_final', 
                            array('label'=>'Fecha final', 'empty'=>array("")));
							
	 echo "<hr>";   
	 echo "<br>"; 
	 echo "<h4>Campos a mostrar en el reporte</h4>";
	 
	    echo $this->Form->input('category_id', array('label'=>'Categoria','type'=>'checkbox'));
		echo $this->Form->input('manufacturer_id', array('label'=>'Manufacturador','type'=>'checkbox') );
		echo $this->Form->input('nombre', array('label'=>'Nombre','type'=>'checkbox'));
		echo $this->Form->input('codigo', array('label'=>'Código','type'=>'checkbox'));
		echo $this->Form->input('cod_barras', array('label'=>'Código de barras','type'=>'checkbox'));
		echo $this->Form->input('clasificacion', array('label'=>'Clasificación','type'=>'checkbox'));
		echo $this->Form->input('ficha_producto', array('label'=>'Ficha del producto','type'=>'checkbox'));
		echo $this->Form->input('image_producto', array('label'=>'Imagen','type'=>'checkbox'));
		echo $this->Form->input('inventario', array('label'=>'Inventario','type'=>'checkbox'));
		echo $this->Form->input('stock_minimo', array('label'=>'Stock minimo','type'=>'checkbox'));
		echo $this->Form->input('stock_maximo', array('label'=>'Stock maximo','type'=>'checkbox'));
		echo $this->Form->input('costo', array('label'=>'Costo','type'=>'checkbox'));
		echo $this->Form->input('costo_promedio', array('label'=>'Costo promedio','type'=>'checkbox'));
		echo $this->Form->input('tarifa_iva', array('label'=>'Tipo IVA','type'=>'checkbox'));
		echo $this->Form->input('valor_iva', array('label'=>'Valor IVA','type'=>'checkbox'));
		echo $this->Form->input('porc_utilidad', array('label'=>'Utilidad','type'=>'checkbox'));
		echo $this->Form->input('valor_venta', array('label'=>'Valor venta','type'=>'checkbox'));
		echo $this->Form->input('estado_prod', array('label'=>'Estado','type'=>'checkbox'));
		echo $this->Form->input('rotacion', array('label'=>'Rotación','type'=>'checkbox'));
		echo $this->Form->input('nit_proveedor', array('label'=>'Nit proveedor','type'=>'checkbox'));
		echo $this->Form->input('tiempo_de_reposicion', array('label'=>'Tiempo de reposición','type'=>'checkbox'));
							      
     echo $this->Form->end(__('Generar reporte', true));	
	 } 
  ?>
  
  
  </fieldset>

</div>