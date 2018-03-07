<?php
App::uses('Tiposaquisico', 'Model');

/**
 * Tiposaquisico Test Case
 */
class TiposaquisicoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tiposaquisico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tiposaquisico = ClassRegistry::init('Tiposaquisico');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tiposaquisico);

		parent::tearDown();
	}

}
