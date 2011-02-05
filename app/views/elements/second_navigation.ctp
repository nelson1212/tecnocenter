
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
  	<ul class="second_nav">
    <?php foreach($menuCategories as $menuCategory):?> 
    <li> <?php echo $this->Html->link($menuCategory["Category"]["nombre"],array("controller"=>"categories","action"=>"view",$menuCategory["Category"]["id"])) ?></li>
    <?php endforeach;?>
    <li><a>Otros</a><div class=" sprite triangulo_tooltip punta_tooltip"></div><div class="punta_tooltip tooltip"></div></li>
   </ul>
   
   <div class="separ sprite separador_nav color">
    	<div class="separ_tittle">Servicios</div>
   </div>    
  </div>
  <div id="left-footer"></div>
</div>