<?php
class PassowordChangesController extends AppController {

	var $name = 'PassowordChanges';

	function index() {
		$this->PassowordChange->recursive = 0;
		$this->set('passowordChanges', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid passoword change', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('passowordChange', $this->PassowordChange->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PassowordChange->create();
			if ($this->PassowordChange->save($this->data)) {
				$this->Session->setFlash(__('The passoword change has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passoword change could not be saved. Please, try again.', true));
			}
		}
		$users = $this->PassowordChange->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid passoword change', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PassowordChange->save($this->data)) {
				$this->Session->setFlash(__('The passoword change has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passoword change could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PassowordChange->read(null, $id);
		}
		$users = $this->PassowordChange->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for passoword change', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PassowordChange->delete($id)) {
			$this->Session->setFlash(__('Passoword change deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Passoword change was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->PassowordChange->recursive = 0;
		$this->set('passowordChanges', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid passoword change', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('passowordChange', $this->PassowordChange->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PassowordChange->create();
			if ($this->PassowordChange->save($this->data)) {
				$this->Session->setFlash(__('The passoword change has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passoword change could not be saved. Please, try again.', true));
			}
		}
		$users = $this->PassowordChange->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid passoword change', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PassowordChange->save($this->data)) {
				$this->Session->setFlash(__('The passoword change has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The passoword change could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PassowordChange->read(null, $id);
		}
		$users = $this->PassowordChange->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for passoword change', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PassowordChange->delete($id)) {
			$this->Session->setFlash(__('Passoword change deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Passoword change was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>