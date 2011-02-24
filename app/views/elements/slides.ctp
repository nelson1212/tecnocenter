<div class="images">	
	<div class="producto_destacado">
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
	<div class="producto_destacado">
			<span class="destacado color">Super Producto 2</span>
			<div class="descripcion_producto">
				<p>Blablabla2</p>
			</div>
			<div class="compra_producto">
				<div class="sprite boton_comprar color">
					<span class="compra">Comprar</span>
				</div>
			</div>
	</div>
	<div class="producto_destacado">
			<span class="destacado color">Super Producto 3</span>
			<div class="descripcion_producto">
				<p>Blablabla3</p>
			</div>
			<div class="compra_producto">
				<div class="sprite boton_comprar color">
					<span class="compra">Comprar</span>
				</div>
			</div>
	</div>
</div>	
<div class="slidetabs">
    <a href="#"></a>
    <a href="#"></a>
    <a href="#"></a>
</div>
<script language="JavaScript">
		// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
		$(function() {
		
			$(".slidetabs").tabs(".images > div", {
			
			// enable "cross-fading" effect
			effect: 'fade',
			fadeOutSpeed: "slow",
			
			// start from the beginning after the last tab
			rotate: true
			
			// use the slideshow plugin. It accepts its own configuration
			}).slideshow();
		});
</script>