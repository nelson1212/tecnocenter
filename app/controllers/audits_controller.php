<?php
class AuditsController extends AppController {

	var $name = 'Audits';

	function index() {
		$this->Audit->recursive = 0;
		$this->set('audits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid audit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('audit', $this->Audit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Audit->create();
			if ($this->Audit->save($this->data)) {
				$this->Session->setFlash(__('The audit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Audit->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid audit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Audit->save($this->data)) {
				$this->Session->setFlash(__('The audit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Audit->read(null, $id);
		}
		$users = $this->Audit->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for audit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Audit->delete($id)) {
			$this->Session->setFlash(__('Audit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Audit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Audit->recursive = 0;
		$this->set('audits', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid audit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('audit', $this->Audit->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Audit->create();
			if ($this->Audit->save($this->data)) {
				$this->Session->setFlash(__('The audit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Audit->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid audit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Audit->save($this->data)) {
				$this->Session->setFlash(__('The audit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Audit->read(null, $id);
		}
		$users = $this->Audit->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for audit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Audit->delete($id)) {
			$this->Session->setFlash(__('Audit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Audit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>