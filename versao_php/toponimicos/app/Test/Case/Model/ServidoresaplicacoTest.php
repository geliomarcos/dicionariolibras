<?php
App::uses('Servidoresaplicaco', 'Model');

/**
 * Servidoresaplicaco Test Case
 */
class ServidoresaplicacoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.servidoresaplicaco'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Servidoresaplicaco = ClassRegistry::init('Servidoresaplicaco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Servidoresaplicaco);

		parent::tearDown();
	}

}
