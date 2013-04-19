<?php
App::uses('AppModel', 'Model');
/**
 * Notification Model
 *
 * @property User $User
 * @property Issue $Issue
 */
class Notification extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Issue' => array(
			'className' => 'Issue',
			'foreignKey' => 'issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function getTypes() {
		return array(
			'E'=>'Email',
			'L'=>'On Login',
		);
	}
}
