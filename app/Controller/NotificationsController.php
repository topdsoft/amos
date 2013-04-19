<?php
App::uses('AppController', 'Controller');
/**
 * Notifications Controller
 *
 * @property Notification $Notification
 */
class NotificationsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Notification->recursive = 0;
		$this->set('notifications', $this->paginate());
		$this->set('types', $this->Notification->getTypes());
	}

/**
 * edit method
 *
 * @param string $issue_id
 * @return void
 */
	public function edit($issue_id = null) {
		//look for existing issue-user pair
		$notification=$this->Notification->find('first',array('conditions'=>array('issue_id'=>$issue_id,'user_id'=>$this->Auth->user('id'))));
// debug($notification);exit;
		if ($this->request->is('post') || $this->request->is('put')) {
// debug($this->request->data);exit;
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'),'default',array('class'=>'success'));
				$this->redirect(array('controller'=>'issues','action' => 'view',$issue_id));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $notification;
			if(!$notification) {
				//defaults
				$this->request->data['Notification']['threshold']=1;
				$this->request->data['Notification']['issue_id']=$issue_id;
				$this->request->data['Notification']['user_id']=$this->Auth->user('id');
			}
		}
		$issueName = $this->Notification->Issue->field('description',array('id'=>$issue_id));
		$types = $this->Notification->getTypes();
		$this->set(compact('issueName','types'));
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
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->Notification->delete()) {
			$this->Session->setFlash(__('Notification deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Notification was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
