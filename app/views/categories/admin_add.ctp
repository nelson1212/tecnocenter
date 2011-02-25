<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
 		<legend><?php __('Admin Add Category'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		//echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
