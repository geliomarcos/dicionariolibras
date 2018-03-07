<?php
App::uses('NoticiasSetore', 'Model');

/**
 * NoticiasSetore Test Case
 */
class NoticiasSetoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.noticias_setore',
		'app.noticias',
		'app.setores'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NoticiasSetore = ClassRegistry::init('NoticiasSetore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NoticiasSetore);

		parent::tearDown();
	}

}
