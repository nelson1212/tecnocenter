<?php
class UsersController extends AppController {

	var $name = 'Users';
  	private $directorioFoto="";
  
    function beforeFilter()
	{
		$this->Auth->allow('add','view','index','delete','edit',
							'admin_userReports','admin_selectReport',
							'register', 'admin_edit',
							'rememberPassword');
	}
	
	function init()
	{
		$aro =& $this->Acl->Aro;
		$aco =& $this->Acl->Aco;

		$firstAroId=$aro->id;
		$roles=array("Super Administrator","Administrator", "Vendedor", "Web", "Clientes");
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
		/*	0=>array(
				"alias"=>"Mensajes"
			)		*/	
		);
		foreach($firsAcos as $newAro){
			$aco->create();
			$aco->save($newAro);
		}
		
	}
  
  
	function reset()
	{
		$this->User->query("TRUNCATE TABLE `fields_forms_users`");
		$this->User->query("TRUNCATE TABLE `forms_users`");
		$this->User->query("TRUNCATE TABLE `users`");
		$this->User->query("TRUNCATE TABLE `aros`");
		$this->User->query("TRUNCATE TABLE `acos`");
		$aro =& $this->Acl->Aro;
		$this->init();
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
				/*$aro =& $this->Acl->Aro;
				 * $elaro=$aro->find("first",array("conditions"=>array("Model"=>"Role","foreign_key"=>$this->data["Role"]["id"])));
				$newAro=array(
					"alias"=>$this->data["User"]["username"],
					"parent_id"=>$elaro["Aro"]["id"],
					"foreign_key"=>$this->User->id,
					"model"=>"User",
				);
				$aro->create();
				$aro->save($newAro);*/
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$roles = $this->User->Role->find('list');
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
	function login()
	{
		
	}
	
	//LOGOUT USER
	function logout() 
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
			$email=$this->User->find("first", array('fields'=>array('email'), 
									'conditions'=>array('User.email'=>trim($this->data['User']['email']))));
									
			if($email['User']['email'])
			{
				$datos=$this->User->find("first", array('fields'=>array('username','password'), 
									'conditions'=>array('User.email'=>trim($this->data['User']['email']))));
									
				$para      = $email['User']['email'];
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
}
?>