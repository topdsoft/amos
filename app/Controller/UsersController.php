<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow('confirm');
		parent::beforeFilter();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		$this->set('uid',$this->Auth->user('id'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
 */

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['hash']=md5(uniqid(rand(),true));
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'view',$this->User->GetInsertID()));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function view($id=null) {
		//used to show hash and link for emailing to user
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	
/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if($id!=$this->Auth->user('id')) $this->redirect(array('index'));
		if ($this->request->is('post') || $this->request->is('put')) {
			//check pw match
			if ($this->request->data['User']['pw1']===$this->request->data['User']['pw2']) {
				$this->request->data['User']['password']=$this->request->data['User']['pw1'];
				$this->request->data['User']['hash']='';
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved'),'default',array('class'=>'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('Your passwords do not match. Please, try again.'));
			}//endif
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

	public function confirm($hash = null) {
		$id=$this->User->id = $this->User->field('id',array('hash'=>$hash));
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid hash code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//check pw match
			if ($this->request->data['User']['pw1']===$this->request->data['User']['pw2']) {
				$this->request->data['User']['password']=$this->request->data['User']['pw1'];
				$this->request->data['User']['hash']='';
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved'),'default',array('class'=>'success'));
					$this->Auth->login($this->request->data['User']);
					$this->redirect('/');
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('Your passwords do not match. Please, try again.'));
			}//endif
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				//log event
				$eventObj=ClassRegistry::init('Event');
				$eventObj->create();
				$eventObj->save(array('type'=>'LOGIN', 'user_id'=>$this->Auth->user('id')));
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
