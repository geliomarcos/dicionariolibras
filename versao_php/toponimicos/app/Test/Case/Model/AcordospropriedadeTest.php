<?php
App::uses('Acordospropriedade', 'Model');

/**
 * Acordospropriedade Test Case
 */
class AcordospropriedadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acordospropriedade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Acordospropriedade = ClassRegistry::init('Acordospropriedade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Acordospropriedade);

		parent::tearDown();
	}

}
