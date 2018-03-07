<?php
App::uses('Codigosfonte', 'Model');

/**
 * Codigosfonte Test Case
 */
class CodigosfonteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.codigosfonte'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Codigosfonte = ClassRegistry::init('Codigosfonte');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Codigosfonte);

		parent::tearDown();
	}

}
