<?php
App::uses('Coordenadore', 'Model');

/**
 * Coordenadore Test Case
 */
class CoordenadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.coordenadore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Coordenadore = ClassRegistry::init('Coordenadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Coordenadore);

		parent::tearDown();
	}

}
