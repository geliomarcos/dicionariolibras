<?php
App::uses('Locaishospedagen', 'Model');

/**
 * Locaishospedagen Test Case
 */
class LocaishospedagenTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.locaishospedagen'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Locaishospedagen = ClassRegistry::init('Locaishospedagen');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Locaishospedagen);

		parent::tearDown();
	}

}
