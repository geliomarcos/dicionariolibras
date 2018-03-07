<?php
App::uses('Bancodado', 'Model');

/**
 * Bancodado Test Case
 */
class BancodadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bancodado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bancodado = ClassRegistry::init('Bancodado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bancodado);

		parent::tearDown();
	}

}
