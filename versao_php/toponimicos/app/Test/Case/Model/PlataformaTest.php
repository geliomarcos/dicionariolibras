<?php
App::uses('Plataforma', 'Model');

/**
 * Plataforma Test Case
 */
class PlataformaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.plataforma'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Plataforma = ClassRegistry::init('Plataforma');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Plataforma);

		parent::tearDown();
	}

}
