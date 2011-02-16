<?php if(!isset($products)){
  $products=array(
    "0"=>array(
        "Product"=>array(
            "id"=>"1","nombre"=>"Computador HP","descripcion"=>"El computador perfecto","precio"=>"$1.200.000","image"=>"../img/impresora.jpg"
          )
       ),
    "1"=>array(
        "Product"=>array(
            "id"=>"1","nombre"=>"Impresora Epson","descripcion"=>"La impresora perfecta","precio"=>"$500.000","image"=>"../img/impresora.jpg"
           )
       ),
     "2"=>array(
        "Product"=>array(
            "id"=>"1","nombre"=>"Computador Acer","descripcion"=>"El computador perfecto","precio"=>"$1.500.000","image"=>"../img/impresora.jpg"
           )
       ),
      "3"=>array(
        "Product"=>array(
            "id"=>"1","nombre"=>"Computador Asus","descripcion"=>"El computador perfecto","precio"=>"$1.700.000","image"=>"../img/impresora.jpg"
           )
       ),    
  );
}?>


<div id="content_wrap">
	<div id="producto_destacado">
		<span class="destacado color">Super Producto</span>
		<div class="descripcion_producto">
			<p>Blablabla</p>
		</div>
		<div class="compra_producto">
			<div class="sprite boton_comprar color">
				<span class="compra">Comprar</span>
			</div>
		</div>
	</div>
	<div id="buscar_producto">
		<?php echo $form->create("Search",array("action"=>"search","controller"=>"searchs"));?>
            <fieldset>
              <?php echo $form->input("search",array("label"=>"Buscar productos:"), array('div' => false));?>
              <?php echo $form->submit(__('Buscar', true), array('div' => false));?>   
            </fieldset>
        <?php echo $form->end();?>
	</div>	
	<div id="productos">
		        <span class="separador_horizontal top"></span>
	    		<span class="separador_horizontal middle"></span>
	    		<span class="separador_horizontal bottom"></span>
			<ul class="productos_nav">
	    		<?php 
	    			$i=0;
	    			foreach($products as $products):?> 
	    		<li>
	    			<div class="producto <?php if($i==0||$i==3) echo "inicio"?>">
		    			<?php echo $this->Html->link(
						$this->Html->image($products["Product"]["image"], array("alt" => "producto")),
						"#",
						array('escape' => false)
						);?>
		    			<?php echo $this->Html->para("producto_titulo color",$products["Product"]["nombre"]) ?>
		    			<?php echo $this->Html->para("descripcion",$products["Product"]["descripcion"]) ?>
		    			<?php echo $this->Html->para("precio color",$products["Product"]["precio"]) ?>		
	    			</div> 
	    		</li>
	    		<?php 
	    			$i++;
	    			endforeach;?>
	    		<li> 
	    		
	    			
	    		</li>
	    		
    		</ul>  
	</div>
</div>
