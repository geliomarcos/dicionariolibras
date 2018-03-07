<?php
App::uses('Tipossuporte', 'Model');

/**
 * Tipossuporte Test Case
 */
class TipossuporteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipossuporte'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipossuporte = ClassRegistry::init('Tipossuporte');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipossuporte);

		parent::tearDown();
	}

}
