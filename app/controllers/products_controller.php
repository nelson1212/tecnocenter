<?php
class ProductsController extends AppController {

	var $name = 'Products';

   function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('add','view','index','delete','edit','admin_index');
	}
	
	
	function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		$categories = $this->Product->Category->find('list');
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('categories', 'manufacturers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$categories = $this->Product->Category->find('list');
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('categories', 'manufacturers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('Product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}
	function admin_activar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
 		$this->Product->id=$id;
    	$this->Product->saveField("estado_prod",true);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_desactivar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("estado_prod",false);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_destacar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("destacar",true);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_nodestacar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("destacar",false);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_promocionar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("promocionar",true);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_nopromocionar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("promocionar",false);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		$categories = $this->Product->Category->find('list');
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('categories', 'manufacturers'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$categories = $this->Product->Category->find('list');
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('categories', 'manufacturers'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('Product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>