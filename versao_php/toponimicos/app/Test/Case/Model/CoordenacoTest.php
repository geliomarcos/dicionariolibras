<?php
App::uses('Coordenaco', 'Model');

/**
 * Coordenaco Test Case
 */
class CoordenacoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.coordenaco',
		'app.coordenadores'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Coordenaco = ClassRegistry::init('Coordenaco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Coordenaco);

		parent::tearDown();
	}

}
