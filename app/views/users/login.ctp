<div class="login">
	<h1> <?php __("Acces to de CMS")?> </h1>

<?php echo $this->Form->create('User');?>
	<fieldset>
 	
	<?php
		echo $this->Form->input('username', array('label'=>'Usuario'));
		echo $this->Form->input('password',array('type'=>'password'));
		//echo $this->Form->input('rol',array('type'=>'hidden','value'=>'x'));
		echo $this->Html->link(__('Recuperar contraseña', true), 
								array('controller' => 'users', 'action' => 'remenberPassword')); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar', true));?>
</div>