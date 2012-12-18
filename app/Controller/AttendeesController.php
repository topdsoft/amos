<?php
App::uses('AppController', 'Controller');
/**
 * Attendees Controller
 *
 * @property Attendee $Attendee
 */
class AttendeesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Attendee->recursive = 0;
		$this->set('attendees', $this->paginate());
	}

/**
 * popup method
 *
 */
  public function popup($id= null) {
		if ($this->request->is('post')) {
			$this->Attendee->create();
			$this->request->data['Meeting']=array('Meeting'=>array($id));
//debug($this->request->data);exit;
			if ($this->Attendee->save($this->request->data)) {
				$this->Session->setFlash(__('The attendee has been saved'));
				$this->set('return',true);
			} else {
				$this->Session->setFlash(__('The attendee could not be saved. Please, try again.'));
				$this->set('retry',true);
			}
		}//endif
		//find what attendees are already in this meeting
		$attendeesList=$this->Attendee->AttendeesMeeting->find('list',array('fields'=>'attendee_id','conditions'=>array('meeting_id'=>$id)));
		$this->Attendee->recursive = 0;
		$this->set('attendees', $this->paginate(array('not'=>array('Attendee.id'=>$attendeesList))));
		$institutions = $this->Attendee->Institution->find('list');
//		$meetings = $this->Attendee->Meeting->find('list');
//		$this->set(compact('institutions', 'meetings'));
		$this->set(compact('institutions'));
		$this->set('meeting_id',$id);
  }

  public function addatom($attendee_id=null, $meeting_id=null) {
	 //add attendee to meeting
	 $this->Attendee->AttendeesMeeting->create();
	 $this->Attendee->AttendeesMeeting->save(array('attendee_id'=>$attendee_id,'meeting_id'=>$meeting_id));
  }

  public function removefrommeeting($id = null) {
	 $this->Attendee->AttendeesMeeting->id=$id;
	 $this->Attendee->AttendeesMeeting->delete();
	 $this->redirect($this->referer());
  }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Attendee->id = $id;
		if (!$this->Attendee->exists()) {
			throw new NotFoundException(__('Invalid attendee'));
		}
		$this->set('attendee', $this->Attendee->read(null, $id));
		$attendees=$this->Attendee->find('list');
		$this->set(compact('attendees'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Attendee->create();
			if ($this->Attendee->save($this->request->data)) {
				$this->Session->setFlash(__('The attendee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendee could not be saved. Please, try again.'));
			}
		}
		$institutions = $this->Attendee->Institution->find('list');
		$meetings = $this->Attendee->Meeting->find('list');
		$this->set(compact('institutions', 'meetings'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Attendee->id = $id;
		if (!$this->Attendee->exists()) {
			throw new NotFoundException(__('Invalid attendee'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Attendee->save($this->request->data)) {
				$this->Session->setFlash(__('The attendee has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attendee could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Attendee->read(null, $id);
		}
		$institutions = $this->Attendee->Institution->find('list');
		$meetings = $this->Attendee->Meeting->find('list');
		$this->set(compact('institutions', 'meetings'));
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
		$this->Attendee->id = $id;
		if (!$this->Attendee->exists()) {
			throw new NotFoundException(__('Invalid attendee'));
		}
		if ($this->Attendee->delete()) {
			$this->Session->setFlash(__('Attendee deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Attendee was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
