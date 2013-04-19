<?php
/**
 * NotificationFixture
 *
 */
class NotificationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'issue_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'threshold' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5),
		'last_sent' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'user_id' => array('column' => 'user_id', 'unique' => 0), 'issue_id' => array('column' => 'issue_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'created' => '2013-04-19 08:15:09',
			'user_id' => 1,
			'issue_id' => 1,
			'threshold' => 1,
			'last_sent' => '2013-04-19 08:15:09',
			'type' => 'Lorem ipsum dolor sit ame'
		),
	);
}
