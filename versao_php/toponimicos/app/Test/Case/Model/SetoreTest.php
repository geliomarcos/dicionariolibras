<?php
App::uses('Setore', 'Model');

/**
 * Setore Test Case
 */
class SetoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.setore',
		'app.noticia',
		'app.setores',
		'app.noticias_setore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Setore = ClassRegistry::init('Setore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Setore);

		parent::tearDown();
	}

}
