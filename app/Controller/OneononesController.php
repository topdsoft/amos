<?php
App::uses('AppController', 'Controller');
/**
 * Oneonones Controller
 *
 * @property Oneonone $Oneonone
 */
class OneononesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Oneonone->recursive = 0;
		$this->set('oneonones', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Oneonone->id = $id;
		if (!$this->Oneonone->exists()) {
			throw new NotFoundException(__('Invalid oneonone'));
		}
		$this->set('oneonone', $this->Oneonone->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Oneonone->create();
			if ($this->Oneonone->save($this->request->data)) {
				$this->Session->setFlash(__('The oneonone has been saved'),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oneonone could not be saved. Please, try again.'));
			}
		}
		$attendee1s = $this->Oneonone->Attendee1->find('list');
		$attendee2s = $this->Oneonone->Attendee2->find('list');
		$this->set(compact('attendee1s', 'attendee2s'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Oneonone->id = $id;
		if (!$this->Oneonone->exists()) {
			throw new NotFoundException(__('Invalid oneonone'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Oneonone->save($this->request->data)) {
				$this->Session->setFlash(__('The oneonone has been saved'),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oneonone could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Oneonone->read(null, $id);
		}
		$attendee1s = $this->Oneonone->Attendee1->find('list');
		$attendee2s = $this->Oneonone->Attendee2->find('list');
		$this->set(compact('attendee1s', 'attendee2s'));
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
		$this->Oneonone->id = $id;
		if (!$this->Oneonone->exists()) {
			throw new NotFoundException(__('Invalid oneonone'));
		}
		if ($this->Oneonone->delete()) {
			$this->Session->setFlash(__('Oneonone deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Oneonone was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
