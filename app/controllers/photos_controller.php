<?php
class PhotosController extends AppController {

	var $name = 'Photos';

	function index() {
		$this->Photo->recursive = 0;
		$this->set('photos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid photo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('photo', $this->Photo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Photo->create();
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The photo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.', true));
			}
		}
		$photoAlbums = $this->Photo->PhotoAlbum->find('list');
		$this->set(compact('photoAlbums'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid photo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The photo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Photo->read(null, $id);
		}
		$photoAlbums = $this->Photo->PhotoAlbum->find('list');
		$this->set(compact('photoAlbums'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for photo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Photo->delete($id)) {
			$this->Session->setFlash(__('Photo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Photo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Photo->recursive = 0;
		$this->set('photos', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid photo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('photo', $this->Photo->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Photo->create();
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The photo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.', true));
			}
		}
		$photoAlbums = $this->Photo->PhotoAlbum->find('list');
		$this->set(compact('photoAlbums'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid photo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The photo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Photo->read(null, $id);
		}
		$photoAlbums = $this->Photo->PhotoAlbum->find('list');
		$this->set(compact('photoAlbums'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for photo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Photo->delete($id)) {
			$this->Session->setFlash(__('Photo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Photo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>