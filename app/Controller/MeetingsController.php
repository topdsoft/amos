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
// debug($this->request->data);exit;
			if(isset($this->request->data['AttendeesIssue'])) {
				//go through AttendeesIssue data and save ranks
				$this->AttendeesIssue=ClassRegistry::init('AttendeesIssue');
				foreach($this->request->data['AttendeesIssue'] as $issue_id=>$issue) {
					foreach($issue as $attendee_id =>$attendee) {
						if($attendee['rank']!='') {
							$ai=$this->AttendeesIssue->find('first',array('conditions'=>array('attendee_id'=>$attendee_id,'issue_id'=>$issue_id)));
							if($ai) {
								//attendee has already been linked to this issue
								$ai['AttendeesIssue']['rank']=$attendee['rank'];
								$this->AttendeesIssue->save($ai);
							} else {
								//issue is new to this attendee
								$this->AttendeesIssue->create();
// debug($attendee);exit;
								$this->AttendeesIssue->save(array(
									'issue_id'=>$issue_id,
									'attendee_id'=>$attendee_id,
									'rank'=>$attendee['rank']
								));
							}//endif
						}//endif
					}//end foreach
				}//end foreach
			}//endif
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
		$this->Meeting->recursive=2;
		$meeting=$this->Meeting->read(null,$id);
		$this->set('meeting',$meeting);
		if(!($this->request->is('post') || $this->request->is('put'))) {
			//set attendee current interest levels
			foreach($meeting['Attendee'] as $a) {
				//loop for all attendees
				foreach($a['Issue'] as $i) {
					//loop for each issue this attendee is interested in and set default for that issue
					$this->request->data['AttendeesIssue'][$i['id']][$a['id']]['rank']=$i['AttendeesIssue']['rank'];
				}//end foreach issue
			}//end foreach attendee
		}//endif
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
