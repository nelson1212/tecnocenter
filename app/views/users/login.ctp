<div class="">
<?php if ($session->check('Message.auth')) $session->flash('auth');?>
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend>Iniciar sesión</legend>
	<?php
		echo $this->Form->input('username', array('label'=>'Usuario'));
		echo $this->Form->input('password',array('type'=>'password'));
		//echo $this->Form->input('rol',array('type'=>'hidden','value'=>'x'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar', true));?>
</div>