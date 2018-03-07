<?php
App::uses('CategoriasPaiFilho', 'Model');

/**
 * CategoriasPaiFilho Test Case
 */
class CategoriasPaiFilhoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorias_pai_filho'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriasPaiFilho = ClassRegistry::init('CategoriasPaiFilho');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriasPaiFilho);

		parent::tearDown();
	}

}
