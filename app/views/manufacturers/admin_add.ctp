<div class="manufacturers form">
<?php echo $this->Form->create('Manufacturer');?>
	<fieldset>
 		<legend><?php __('Añadir Fabricante'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>