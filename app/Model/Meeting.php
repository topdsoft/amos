<?php
App::uses('AppModel', 'Model');
/**
 * Meeting Model
 *
 * @property Attendee $Attendee
 * @property Issue $Issue
 */
class Meeting extends AppModel {
  var $virtualFields=array(
	 'numAttendees'=>'select count(*) from attendees_meetings where attendees_meetings.meeting_id=Meeting.id',
	 'numIssues'=>'select count(*) from issues_meetings where issues_meetings.meeting_id=Meeting.id'
  );
	public $order=array('date desc');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
/*		'location' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),//*/
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'facilitator' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Attendee' => array(
			'className' => 'Attendee',
			'joinTable' => 'attendees_meetings',
			'foreignKey' => 'meeting_id',
			'associationForeignKey' => 'attendee_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Issue' => array(
			'className' => 'Issue',
			'joinTable' => 'issues_meetings',
			'foreignKey' => 'meeting_id',
			'associationForeignKey' => 'issue_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
