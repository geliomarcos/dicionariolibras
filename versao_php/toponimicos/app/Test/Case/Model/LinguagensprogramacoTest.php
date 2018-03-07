<?php
App::uses('Linguagensprogramaco', 'Model');

/**
 * Linguagensprogramaco Test Case
 */
class LinguagensprogramacoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.linguagensprogramaco'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Linguagensprogramaco = ClassRegistry::init('Linguagensprogramaco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Linguagensprogramaco);

		parent::tearDown();
	}

}
