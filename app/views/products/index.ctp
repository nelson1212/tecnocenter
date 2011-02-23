<div id="content_wrap">
	<?php echo $this->element("slides");?>
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
	    			foreach($products as $product):?> 
	    		<li>
	    			<div class="producto <?php if($i==0||$i==3) echo "inicio"?>">
		    			<?php echo $this->Html->image($product["Product"]["image_producto"]) ?>
		    			<?php echo $this->Html->para("producto_titulo color",$product["Product"]["nombre"]) ?>
		    			<?php echo $this->Html->para("descripcion",$product["Product"]["descripcion"]) ?>
		    			<?php echo $this->Html->para("precio color",$product["Product"]["valor_venta"]) ?>		
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