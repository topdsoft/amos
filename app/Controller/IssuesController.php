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
		$this->Issue->order=array('Topic.name','description');
		$this->set('issues', $this->paginate());
	}

/**
 * popup method
 *
 */
  public function popup($id=null) {
		if ($this->request->is('post')) {
//debug($this->request->data);exit;
			$topic_id=$this->request->data['Issue']['topic_id'];
			if($this->request->data['Issue']['changetopic']) {
				//user has clicked a different topic
				$this->request->data['Issue']['changetopic']=false;
			} else {
				//user wants to add a new issue
				$this->Issue->create();
				$this->request->data['Meeting']=array('Meeting'=>array($id));
				if ($this->Issue->save($this->request->data)) {
					$this->Session->setFlash(__('The issue has been saved'),'default',array('class'=>'success'));
					$this->set('return',true);
				} else {
					$this->Session->setFlash(__('The issue could not be saved. Please, try again.'));
					$this->set('retry',true);
				}
			}//endif
		} else {
			//default topic is 13
			$topic_id=13;
		}//endif
		//find what issues are already with this meeting
		$issuesList=$this->Issue->IssuesMeeting->find('list',array('fields'=>'issue_id','conditions'=>array('meeting_id'=>$id)));
//debug($issuesList);exit;
		$this->Issue->recursive = 0;
		$this->set('issues', $this->paginate(array('topic_id'=>$topic_id,'not'=>array('Issue.id'=>$issuesList))));
		$topics = $this->Issue->Topic->find('list');
		$this->set(compact('topics'));
		$this->set('meeting_id',$id);
  }

  public function additom($issue_id=null, $meeting_id=null) {
	 //add issue to meeting
	 $this->Issue->IssuesMeeting->create();
	 $this->Issue->IssuesMeeting->save(array('issue_id'=>$issue_id,'meeting_id'=>$meeting_id));
  }

	public function additoa($issue_id=null, $attendee_id=null) {
		//add issue to attendee
		$this->Issue->AttendeesIssue->create();
		$this->Issue->AttendeesIssue->save(array('issue_id'=>$issue_id,'attendee_id'=>$attendee_id));
	}

  public function removefrommeeting($id = null) {
	 $this->Issue->IssuesMeeting->id=$id;
	 $this->Issue->IssuesMeeting->delete();
	 $this->redirect($this->referer());
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
				$this->Session->setFlash(__('The issue has been saved'),'default',array('class'=>'success'));
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
				$this->Session->setFlash(__('The issue has been saved'),'default',array('class'=>'success'));
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
