<div class="audits form">
<?php echo $this->Form->create('Audit');?>
	<fieldset>
 		<legend><?php __('Edit Audit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('foreing_key');
		echo $this->Form->input('model');
		echo $this->Form->input('alias');
		echo $this->Form->input('action');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Audit.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Audit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Audits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>