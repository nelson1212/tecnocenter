<?php
class ManufacturersController extends AppController {

	var $name = 'Manufacturers';

	function index() {
		$this->Manufacturer->recursive = 0;
		$this->set('manufacturers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid manufacturer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('manufacturer', $this->Manufacturer->read(null, $id));
	}


	function admin_index() {
		$this->Manufacturer->recursive = 0;
		$this->set('manufacturers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid manufacturer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('manufacturer', $this->Manufacturer->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Manufacturer->create();
			if ($this->Manufacturer->save($this->data)) {
				$this->Session->setFlash(__('El fabricante ha sido guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El fabricante no se pudo guardar. Por favor, intente de nuevo.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Fabricante no valido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Manufacturer->save($this->data)) {
				$this->Session->setFlash(__('El fabricante ha sido guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El fabricante no se pudo guardar. Por favor, intente de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Manufacturer->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('id de fabricante no valido', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Manufacturer->delete($id)) {
			$this->Session->setFlash(__('Fabricante borrado', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo borrar el fabricante', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>