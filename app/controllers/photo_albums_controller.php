<?php
class PhotoAlbumsController extends AppController {

	var $name = 'PhotoAlbums';

	function index() {
		$this->PhotoAlbum->recursive = 0;
		$this->set('photoAlbums', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid photo album', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('photoAlbum', $this->PhotoAlbum->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PhotoAlbum->create();
			if ($this->PhotoAlbum->save($this->data)) {
				$this->Session->setFlash(__('The photo album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo album could not be saved. Please, try again.', true));
			}
		}
		$products = $this->PhotoAlbum->Product->find('list');
		$this->set(compact('products'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid photo album', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PhotoAlbum->save($this->data)) {
				$this->Session->setFlash(__('The photo album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo album could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PhotoAlbum->read(null, $id);
		}
		$products = $this->PhotoAlbum->Product->find('list');
		$this->set(compact('products'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for photo album', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PhotoAlbum->delete($id)) {
			$this->Session->setFlash(__('Photo album deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Photo album was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->PhotoAlbum->recursive = 0;
		$this->set('photoAlbums', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid photo album', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('photoAlbum', $this->PhotoAlbum->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PhotoAlbum->create();
			if ($this->PhotoAlbum->save($this->data)) {
				$this->Session->setFlash(__('The photo album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo album could not be saved. Please, try again.', true));
			}
		}
		$products = $this->PhotoAlbum->Product->find('list');
		$this->set(compact('products'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid photo album', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PhotoAlbum->save($this->data)) {
				$this->Session->setFlash(__('The photo album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photo album could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PhotoAlbum->read(null, $id);
		}
		$products = $this->PhotoAlbum->Product->find('list');
		$this->set(compact('products'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for photo album', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PhotoAlbum->delete($id)) {
			$this->Session->setFlash(__('Photo album deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Photo album was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>