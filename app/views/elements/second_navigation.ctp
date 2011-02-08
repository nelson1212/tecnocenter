
<div id="second-navigation">
  <div id="left-header">
  <div class="separ sprite separador_nav color">
    <div class="icon sprite carrito_compras"></div><div class="separ_tittle">Canasta de compras</div>
  </div>
  </div>   
  <div id="left-content">
  	<div class="separ sprite separador_nav color">
    	<div class="separ_tittle">Productos</div>
    </div>
    <div class="button_wrap">
	  	<ul class="second_nav">
		    <?php foreach($menuCategories as $menuCategory):?> 
		    <li> <?php echo $this->Html->link($menuCategory["Category"]["nombre"],array("controller"=>"categories","action"=>"view",$menuCategory["Category"]["id"])) ?></li>
		    <?php endforeach;?>
		    <li><a>Otros</a>
		    	<div class="sprite triangulo_tooltip punta_tooltip"></div>
		    	
		    	<div class="punta_tooltip tooltip">
		    		<div class="tooltip_menu">
		    			<ul class="tooltip_nav">
		    				<?php foreach($otherCategories as $menuCategory):?> 
		    				<li> <?php echo $this->Html->link($menuCategory["Category"]["nombre"],array("controller"=>"categories","action"=>"view",$menuCategory["Category"]["id"])) ?></li>
		    				<?php endforeach;?>
		    			</ul>
		    		</div>
		    	</div>
		    </li>
	    </ul>
   </div>
   <div class="separ sprite separador_nav color">
    	<div class="separ_tittle">Servicios</div>
   </div>
   <div class="button_wrap">
	  	<ul class="second_nav">
		    <li><a>Otros</a>
		    	<div class=" sprite triangulo_tooltip punta_tooltip"></div>
		    	<div class="punta_tooltip tooltip">
		    		<div class="tooltip_menu">
		    			<ul class="tooltip_nav">
		    				<?php foreach($otherCategories as $menuCategory):?> 
		    				<li> <?php echo $this->Html->link($menuCategory["Category"]["nombre"],array("controller"=>"categories","action"=>"view",$menuCategory["Category"]["id"])) ?></li>
		    				<?php endforeach;?>
		    			</ul>
		    		</div>
		    	</div>
		    </li>
	    </ul>
   </div>
  <div class="separ sprite separador_nav color">
    	<div class="separ_tittle">Promociones</div>
   </div>  
   	<ul class="promocion_nav">
    		<li> <a></a> </li>
    		<li> <a></a> </li>
    		<li> <a></a> </li>
    		<li> <a></a> </li>
    		<li> <a></a> </li>
    		<li> <a></a> </li>
    	</ul>   
  </div>
  <div id="left-footer"></div>
</div>