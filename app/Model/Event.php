<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property User $User
 */
class Event extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $order = array('Event.created'=>'desc');
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
		)
	);
}
