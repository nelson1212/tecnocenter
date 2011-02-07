<div class="services form">
<?php echo $this->Form->create('Service');?>
	<fieldset>
 		<legend><?php __('Admin Add Service'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('description');
		echo $this->Form->input('content');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Services', true), array('action' => 'index'));?></li>
	</ul>
</div>