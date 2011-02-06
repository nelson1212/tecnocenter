<div class="users form">
<?php echo $this->Form->create('User');?>
  <fieldset>
    <legend><?php __('Agregar Usuarios'); ?></legend>
  <?php
    //echo $this->Form->input('empleado_id',array('options'=>$usuarios));
    echo "<br>";
    echo $this->Form->input('tipo_identificacion', 
                            array('label'=>'Tipo de indentificación', 
                            'type'=>'select',
                            'options'=>array(1=>'Cedula',2=>'Nit')));      
                                             
    echo $this->Form->input('primer_nombre', array('label'=>'Primer nombre'));    
    echo $this->Form->input('segundo_nombre', array('label'=>'Segundo nombre')); 
    echo $this->Form->input('primer_apellido', array('label'=>'Primer apellido'));     
    echo $this->Form->input('segundo_apellido', array('label'=>'Segundo apellido')); 
    echo $this->Form->input('email', array('label'=>'E-mail'));    
    echo $this->Form->input('direccion', array('label'=>'Dirección')); 
    echo $this->Form->input('pais', array('label'=>'Pais'));     
    echo $this->Form->input('departamento', array('label'=>'Departamento'));  
    echo $this->Form->input('ciudad', array('label'=>'Ciudad'));    
    echo $this->Form->input('telefono', array('label'=>'Telefono')); 
    echo $this->Form->input('telefono_adicional', array('label'=>'Telefono adicional'));     
    echo $this->Form->input('celular', array('label'=>'Celular'));      
    echo $this->Form->input('celular_adicional', array('label'=>'Celular adicional'));  
    echo $this->Form->input('foto', array('label'=>'Foto'));  
    echo $this->Form->input('username', array('label'=>'Username'));  
    echo $this->Form->input('password', array('label'=>'Password'));  
    
  ?>
  </fieldset>
<?php echo $this->Form->end(__('Registrar', true));?>
</div>