<?php
App::uses('AppModel', 'Model');
/**
 * Attendee Model
 *
 * @property Institution $Institution
 * @property Meeting $Meeting
 */
class Attendee extends AppModel {
/*  public $virtualFields=array(
	 'numAttended'=>'select count(*) from attendees_meetings where attendees_meetings.attendee_id=Attendee.id'
  );
  public $order=array('Attendee.lastName'=>'asc','Attendee.firstName'=>'asc');
//*/  //moved to constructor

	public $displayField = 'name';
	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->virtualFields['numAttended'] = sprintf('select count(*) from attendees_meetings where attendees_meetings.attendee_id=%s.id', $this->alias);
		$this->virtualFields['name']=sprintf('CONCAT(%s.firstName, " ", %s.lastName)', $this->alias, $this->alias);
		$this->order[]= sprintf('%s.lastName',$this->alias);
		$this->order[]= sprintf('%s.firstName',$this->alias);
	}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'lastName' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'firstName' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Institution' => array(
			'className' => 'Institution',
			'foreignKey' => 'institution_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Interviewer' => array(
			'className' => 'Oneonone',
			'foreignKey' => 'attendee1_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Interviewee' => array(
			'className' => 'Oneonone',
			'foreignKey' => 'attendee2_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Meeting' => array(
			'className' => 'Meeting',
			'joinTable' => 'attendees_meetings',
			'foreignKey' => 'attendee_id',
			'associationForeignKey' => 'meeting_id',
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
			'joinTable' => 'attendees_issues',
			'foreignKey' => 'attendee_id',
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
