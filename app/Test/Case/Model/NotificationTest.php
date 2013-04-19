<?php
App::uses('Notification', 'Model');

/**
 * Notification Test Case
 *
 */
class NotificationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.notification', 'app.user', 'app.issue', 'app.topic', 'app.meeting', 'app.attendee', 'app.institution', 'app.oneonone', 'app.attendees_meeting', 'app.attendees_issue', 'app.issues_meeting');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Notification = ClassRegistry::init('Notification');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Notification);

		parent::tearDown();
	}

}
