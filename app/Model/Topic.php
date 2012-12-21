<?php
App::uses('AppModel', 'Model');
/**
 * Topic Model
 *
 * @property Issue $Issue
 */
class Topic extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $virtualFields = array(
		'issues'=>'select count(*) from issues where topic_id=Topic.id',
	);
	public $order = array('Topic.name');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Issue' => array(
			'className' => 'Issue',
			'foreignKey' => 'topic_id',
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
 * @property topicname $name
 * if $name is not allready a topic it will be added and the new id will be returned
 * if it is existing the id will be returned
 * if adding name fails returns null
 */

	public function checkadd($name) {
		$topic=$this->find('first',array('conditions'=>array('Topic.name'=>$name)));
		$id=null;
		if($topic) {
			//topic found
			$id=$topic['Topic']['id'];
		} else {
			//add topic
			if($this->save(array('id'=>null,'name'=>$name))) $id=$this->getInsertId();
		}//endif
		return $id;
	}

}
