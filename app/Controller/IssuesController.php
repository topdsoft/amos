<?php
App::uses('AppController', 'Controller');
/**
 * Issues Controller
 *
 * @property Issue $Issue
 */
class IssuesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Issue->recursive = 0;
		$this->set('issues', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Issue->id = $id;
		if (!$this->Issue->exists()) {
			throw new NotFoundException(__('Invalid issue'));
		}
		$this->set('issue', $this->Issue->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Issue->create();
			if ($this->Issue->save($this->request->data)) {
				$this->Session->setFlash(__('The issue has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The issue could not be saved. Please, try again.'));
			}
		}
		$topics = $this->Issue->Topic->find('list');
		$meetings = $this->Issue->Meeting->find('list');
		$this->set(compact('topics', 'meetings'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Issue->id = $id;
		if (!$this->Issue->exists()) {
			throw new NotFoundException(__('Invalid issue'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Issue->save($this->request->data)) {
				$this->Session->setFlash(__('The issue has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The issue could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Issue->read(null, $id);
		}
		$topics = $this->Issue->Topic->find('list');
		$meetings = $this->Issue->Meeting->find('list');
		$this->set(compact('topics', 'meetings'));
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
		$this->Issue->id = $id;
		if (!$this->Issue->exists()) {
			throw new NotFoundException(__('Invalid issue'));
		}
		if ($this->Issue->delete()) {
			$this->Session->setFlash(__('Issue deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Issue was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
