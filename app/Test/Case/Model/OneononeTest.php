<?php
App::uses('Oneonone', 'Model');

/**
 * Oneonone Test Case
 *
 */
class OneononeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.oneonone', 'app.attendee1', 'app.attendee2');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Oneonone = ClassRegistry::init('Oneonone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Oneonone);

		parent::tearDown();
	}

}
