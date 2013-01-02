<?php
App::uses('AppController', 'Controller');
/**
 * Meetings Controller
 *
 * @property Meeting $Meeting
 */
class MeetingsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Meeting->recursive = 0;
		$this->set('meetings', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Meeting->id = $id;
		$this->Meeting->recursive = 2;
		if (!$this->Meeting->exists()) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		$this->set('meeting', $this->Meeting->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Meeting->create();
			if ($this->Meeting->save($this->request->data)) {
				$this->Session->setFlash(__('The meeting has been saved'),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'edit',$this->Meeting->getInsertId()));
			} else {
				$this->Session->setFlash(__('The meeting could not be saved. Please, try again.'));
			}
		}
		$attendees = $this->Meeting->Attendee->find('list');
//		$issues = $this->Meeting->Issue->find('list');
		$this->set(compact('attendees'/*, 'issues'*/));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Meeting->id = $id;
		if (!$this->Meeting->exists()) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Meeting->save($this->request->data)) {
				$this->Session->setFlash(__('The meeting has been saved'),'default',array('class'=>'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meeting could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Meeting->read(null, $id);
		}
		$attendees = $this->Meeting->Attendee->find('list');
//		$issues = $this->Meeting->Issue->find('list');
		$topics = $this->Meeting->Issue->Topic->find('list');
		$institutions= $this->Meeting->Attendee->Institution->find('list');
		$this->set(compact('attendees', 'topics','institutions'));
		$this->set('meeting',$this->Meeting->read(null,$id));
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
		$this->Meeting->id = $id;
		if (!$this->Meeting->exists()) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		if ($this->Meeting->delete()) {
			$this->Session->setFlash(__('Meeting deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Meeting was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
