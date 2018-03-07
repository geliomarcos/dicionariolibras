<?php
App::uses('Formascontrataco', 'Model');

/**
 * Formascontrataco Test Case
 */
class FormascontratacoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.formascontrataco'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Formascontrataco = ClassRegistry::init('Formascontrataco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formascontrataco);

		parent::tearDown();
	}

}
