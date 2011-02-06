<?php
class UsersController extends AppController {

	var $name = 'Users';
  
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
	  
		if (!empty($this->data)) 
		{
		  //debug($this->data); exit;
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

	function admin_edit($id = null) {
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
}
?>