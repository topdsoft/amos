<?php
App::uses('AppModel', 'Model');
/**
 * Oneonone Model
 *
 * @property Attendee1 $Attendee1
 * @property Attendee2 $Attendee2
 */
class Oneonone extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Attendee1' => array(
			'className' => 'Attendee',
			'foreignKey' => 'attendee1_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Attendee2' => array(
			'className' => 'Attendee',
			'foreignKey' => 'attendee2_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)//*/
	);
}
