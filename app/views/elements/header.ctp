<div class="header_wrap">
     
      <div id="logo" class="sprite logo_tecnocenter">
         
      </div>

      <div class="login">
          <?php echo $form->create("User",array("action"=>"login","controller"=>"users"));?>
            <fieldset>
              <legend>Zona de Usuarios</legend>
              <?php echo $form->input("username",array("label"=>"Nombre:"));?>   
              <?php echo $form->input("password",array("label"=>"Contraseña:"));?>
              <?php echo $form->submit(__('Registrarse', true), array('div' => false));?>
              <?php echo $form->submit(__('Ingresar', true), array('div' => false));?>   
            </fieldset>
          <?php echo $form->end();?>
        </div>  
</div>