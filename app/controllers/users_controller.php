<?php
class UsersController extends AppController {

	var $name = 'Users';
  	private $directorioFoto="";
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add','view','index','delete','edit',
							'admin_userReports','admin_selectReport',
							'register', 'admin_edit',
							'rememberPassword');
	}
 	 function menu()
 	 {
		if(!$this->Acl->check(array('model' => 'User', 'foreign_key' => $this->Session->read("Auth.User.id")), 'menu')){
			$this->Session->setFlash(__($this->Auth->authError, true));
			$this->redirect($this->referer());
		}
	}
	 
	function admin_menu()
	{
		if(!$this->Acl->check(array('model' => 'User', 'foreign_key' => $this->Session->read("Auth.User.id")), 'admin_menu')){
			$this->Session->setFlash(__($this->Auth->authError, true));
			$this->redirect($this->referer());
		}
	}
	
	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
  
	function register()
	{
	  //debug($this->data); exit;
		if (!empty($this->data)) 
		{
		  $this->User->recursive = 0;
		  
		  //Buscamos el nombre de usuario y el email
		  $datos = $this->User->find("first", array('fields'=>array('username','email'),"conditions"=>array("User.username"=>$this->data["User"]["username"])));				
		
		  //Comprobamos si el nombre de usuario existe
		  if($datos['User']['username'])
		  {
		  	$this->Session->setFlash(__("El nombre de usuario ya existe", true));
			return;
		  }
		  
		    //Comprobamos el email del usuario existe
		  if($datos['User']['email'])
		  {
		  	$this->Session->setFlash(__("Ya existe un usuario con ese Email", true));
			return;
		  }
		  
		  //Subir foto
		  $arrayFoto = $this->data['User']['foto'];
		  $nombreFoto = $this->data["User"]["username"]; //Igual al username, ya que es unico
		  
		  if( ($this->data['User']['foto']['name']) && $this->uploadPicture($arrayFoto, $nombreFoto)==false)
		  {
		  	$this->Session->setFlash(__('Error al cargar la foto.', true));
			$this->data["User"]["foto"]=$this->directorioFoto; //Ubicación de la foto
		  	return;
		  }
		  
			$this->User->create();
			$this->data["User"]["role_id"]=4;// Is set as a Basic user for default
			
		  if ($this->User->save($this->data)) 
			{
				$aro =& $this->Acl->Aro;
				$newAro=array(
					"alias"=>$this->data["User"]["username"],
					"parent_id"=>4,
					"foreign_key"=>$this->User->id,
					"model"=>"User",
				);
				$aro->create();
				$aro->save($newAro);
				
				//ENVIAR EMAIL CON CONTRASEÑA Y NOMBRE DE USUARIO
				$datos=$this->User->find("first", array('fields'=>array('email','username','password'), 
									'conditions'=>array('User.id'=>$this->User->id)));
									
		        $para      = $datos['User']['email'];
				$asunto    = 'Datos logueo';
				$mensaje   = 'Hola, sus datos de logueo son :<br> Nombre de usuario :'.$datos['User']['username'].
							 '<br>Contraseña: '.$datos['User']['password'];
						 
				$cabeceras = 'From: webmaster@example.com' . "\r\n" .
				    		 'Reply-To: webmaster@example.com' . "\r\n" .
				    		 'X-Mailer: PHP/' . phpversion();

				if(mail($para, $asunto, $mensaje, $cabeceras))
				{
					$this->Session->setFlash(__('Datos de logueo enviados a su correo', true));
				}else 
				{
					$this->Session->setFlash(__('Datos de logueo no enviados a su correo, por favor intenta mas tarde', true));
				}
			
		
			
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'view', $this->User->id));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		
	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	
	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$aro =& $this->Acl->Aro;
				 $elaro=$aro->find("first",array("conditions"=>array("Model"=>"Role","foreign_key"=>$this->data["User"]["role_id"])));
				$newAro=array(
					"alias"=>$this->data["User"]["username"],
					"parent_id"=>$elaro["Aro"]["id"],
					"foreign_key"=>$this->User->id,
					"model"=>"User",
				);
				$aro->create();
				$aro->save($newAro);
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$roles = $this->User->Role->find('list',array("conditions"=>array("id >"=>"1")));
		$this->set(compact('roles'));
	}

	function admin_edit($id = null) 
	{
		
		//$foto['user']['foto'] = $this->User->find("first", array('fields'=>'foto','conditions'=>array('User.id'=>'$id')));
		
		if (!$id && empty($this->data)) 
		{
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) 
		{
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function admin_delete($id = null) 
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	//LOGIN USER
	function login(){
		$this->set("login",true);
		
	}
	function admin_login(){
		$this->set("login",true);
	}
	
	//LOGOUT USER
	function logout() 
	{
	   $this->redirect($this->Auth->logout());    
	}
	
	function admin_logout() 
	{
	   $this->redirect($this->Auth->logout());    
	}
	
	//Configurar el reporte
	function admin_selectReport()
	{
		$roles=$this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	//Reporte por tipos de usuario
	function admin_userReports()
	{
		$this->User->recursive = 0;
		$rol = $this->data['User']['role_id'];	
		foreach($this->data['User'] as $indice =>$valor)
		{
			if($valor==1)
			{
				$array[] = $indice;
			}
		}
		$reporte = $this->User->find('all', array('fields'=>$array,'conditions'=>array('User.role_id'=>$rol)));
		$this->set(compact('reporte'));
	}
	
	//$foto array del archivo
    //nombre_foto es igual al username ya que sera unico
	function uploadPicture($foto, $nombre_foto)
	{
		//Caracteristicas de la imagen
		$nombre = $foto['name'];
		$tipo = $foto['type'];
		$tamano = $foto['size'];
		
		//Comprobamos la extensión de la  imagen
		if(strpos($tipo, "gif")) {
			$nombre_foto=$nombre_foto.".gif";
		} else if(strpos($tipo, "jpeg")) {
			$nombre_foto=$nombre_foto.".jpg";
		}
		
		//Directorio donde sera guardada la imagen
		$directorio = WWW_ROOT."img\\fotos\\".$nombre_foto;
		
		//Comprobamos que la extensión y el tamaño sean los adecuados
		if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg")) && ($tamano < 2000000))) 
		{
			$this->Session->setFlash(__("La extensión o el tamaño de la imagen no es correcta, 
						solo se permiten imagenes .gif o .jpg y el tamaño es de 2 mb máximo.", true)); 
		}
		else
		{
			//Copiamos la imagen al directorio, especificado
	   		if (copy($foto["tmp_name"], $directorio))
	   		{
	   			$this->directorioFoto=$directorio;
			   return true;  
	   		}
	   		else
	   		{ 
			   return false; 
	   		}
		}
		
	}

    //Recordar email
	function rememberPassword()
	{
		if (!empty($this->data)) 
		{
			$datos=$this->User->find("first", array('fields'=>array('email','username','password'), 
									'conditions'=>array('User.email'=>trim($this->data['User']['email']))));
									
			if($datos['User']['email'])
			{				
				$para      = $datos['User']['email'];
				$asunto    = 'Recuperación de datos logueo';
				$mensaje   = 'Hola, sus datos de logueo son :<br> Nombre de usuario :'.$datos['User']['username'].
							 '<br>Contraseña: '.$datos['User']['password'];
						 
				$cabeceras = 'From: webmaster@example.com' . "\r\n" .
				    		 'Reply-To: webmaster@example.com' . "\r\n" .
				    		 'X-Mailer: PHP/' . phpversion();

				if(mail($para, $asunto, $mensaje, $cabeceras))
				{
					$this->Session->setFlash(__('Datos enviados a su correo', true));
				}else 
				{
					$this->Session->setFlash(__('Datos no enviados a su correo, por favor intenta mas tarde', true));
				}
				return;
			}
			else 
			{
				$this->Session->setFlash(__('No existe ningun usuario registrado con ese email', true));
				return;
			}
		}	
	}

	
	function init()
	{
		$aro =& $this->Acl->Aro;
		$aco =& $this->Acl->Aco;

		$firstAroId=$aro->id;
		$roles=array("Super_Administrador","Administrador", "Vendedor", "Web", "Clientes");
		
		foreach($roles as $theRole){
			$role["Role"]["name"]=$theRole;
			$this->User->Role->create();
			if($this->User->Role->save($role)){
				$newAro=array(
					"alias"=>$role["Role"]["name"],
					"model"=>"Role",
					"foreign_key"=>$this->User->Role->id,
					);
				$aro->create();
				$aro->save($newAro);
			}
			$this->User->Role->id=0;
		}
		
		$firsAcos=array(
			0=>array(
				"alias"=>"admin_menu"				
			),
			1=>array(
				"alias"=>"menu"	
			)	
		);
		foreach($firsAcos as $newAro){
			$aco->create();
			$aco->save($newAro);
		}
		$this->Acl->allow('Super_Administrador', 'admin_menu');
		$this->Acl->allow('Administrador', 'admin_menu');
		$this->Acl->allow('Vendedor', 'admin_menu');
		$this->Acl->allow('Web', 'menu');
		$this->Acl->allow('Clientes', 'menu');
		//$this->User->query("INSERT INTO `users` (`id`, `role_id`, `tipo_identificacion`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `email`, `direccion`, `pais`, `departamento`, `ciudad`, `telefono`, `telefono_adicional`, `celular`, `celular_adicional`, `foto`, `username`, `password`) VALUES(1, 1, 'C. ', 'Super', '', 'Administrador', '', 'superadministrador@tecnocenter.com', '', '', '', '', 5555555, 55555555, 2147483647, 2147483647, '', 'superadmistrador', 'cdc097124bc6e6637abefa0f584fe8720b729bbe'),(2, 2, 'C. ', 'administrador', '', 'Administrador', '', 'administrador@tecnocenter.com', '', '', '', '', 5555555, 55555555, 2147483647, 2147483647, '', 'administrador', '681e76a4bb4926746ed071cdae432aa2702d3af4'),(3, 3, 'C. ', 'vendedor', '', 'vendedor', '', 'vendedor@tecnocenter.com', '', '', '', '', 5555555, 55555555, 2147483647, 2147483647, '', 'vendedor', 'e7f8fdafa72a45dea5369fcf90dc1eac45c7fb58');");		
	}
	function reset(){
		$this->User->query("TRUNCATE TABLE `users`");
		$this->User->query("TRUNCATE TABLE `roles`");
		$this->User->query("TRUNCATE TABLE `aros_acos`");
		$this->User->query("TRUNCATE TABLE `aros`");
		$this->User->query("TRUNCATE TABLE `acos`");
		$this->init();
		$this->redirect($this->referer());
	}
}
?>