<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
 		<legend><?php __('Admin Edit Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		//echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
