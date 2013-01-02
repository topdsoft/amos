<?php
App::uses('AppController', 'Controller');
/**
 * Institutions Controller
 *
 * @property Institution $Institution
 */
class InstitutionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Institution->recursive = 0;
		$this->set('institutions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Institution->id = $id;
		if (!$this->Institution->exists()) {
			throw new NotFoundException(__('Invalid institution'));
		}
		$this->set('institution', $this->Institution->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Institution->create();
			if ($this->Institution->save($this->request->data)) {
				$this->Session->setFlash(__('The institution has been saved'),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institution could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Institution->id = $id;
		if (!$this->Institution->exists()) {
			throw new NotFoundException(__('Invalid institution'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Institution->save($this->request->data)) {
				$this->Session->setFlash(__('The institution has been saved'),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institution could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Institution->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Institution->id = $id;
		if (!$this->Institution->exists()) {
			throw new NotFoundException(__('Invalid institution'));
		}
		if ($this->Institution->delete()) {
			$this->Session->setFlash(__('Institution deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Institution was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
