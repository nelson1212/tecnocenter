<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Admin Add User'); ?></legend>
 	<div class="layer">
	<?php
		echo $this->Form->input('role_id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('foto');
		
	?>
	</div>
	<div class="layer">
	<?php
		echo $this->Form->input('tipo_identificacion',array("options"=>$tiposIdentificacion));
		echo $this->Form->input('numero_identificacion');
		echo $this->Form->input('primer_nombre');
		echo $this->Form->input('segundo_nombre');
		echo $this->Form->input('primer_apellido');
		echo $this->Form->input('segundo_apellido');
		
		
	?>
	</div>
	<div class="layer">
	<?php
		
		echo $this->Form->input('telefono');
		echo $this->Form->input('telefono_adicional');
		echo $this->Form->input('celular');
		echo $this->Form->input('celular_adicional');
		echo $this->Form->input('direccion');
		
		
	?>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>