<?php
App::uses('Atendimentosecretaria', 'Model');

/**
 * Atendimentosecretaria Test Case
 */
class AtendimentosecretariaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.atendimentosecretaria',
		'app.cursos'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Atendimentosecretaria = ClassRegistry::init('Atendimentosecretaria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Atendimentosecretaria);

		parent::tearDown();
	}

}
