<?php
App::uses('AppModel', 'Model');
/**
 * Institution Model
 *
 * @property Attendee $Attendee
 */
class Institution extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $order = 'name';
	
	public $virtualFields=array(
		'attendees'=>'select count(*) from attendees where institution_id=Institution.id',
		'total'=>'select count(*) from attendees_meetings where attendees_meetings.attendee_id in (select attendees.id from attendees where institution_id=Institution.id)',
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please Enter an Institution Name here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Attendee' => array(
			'className' => 'Attendee',
			'foreignKey' => 'institution_id',
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
 * checkadd method
 * @property institution $name
 * if $name is not allready a institution it will be added and the new id will be returned
 * if it is existing the id will be returned
 * if adding name fails returns null
 */

	public function checkadd($name) {
		$institution=$this->find('first',array('conditions'=>array('Institution.name'=>$name)));
		$id=null;
		if($institution) {
			//institution found
			$id=$institution['Institution']['id'];
		} else {
			//add institution
			if($this->save(array('id'=>null,'name'=>$name))) $id=$this->getInsertId();
		}//endif
		return $id;
	}

}
