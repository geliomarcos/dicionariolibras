<?php
App::uses('Estagiosdesenvolvimento', 'Model');

/**
 * Estagiosdesenvolvimento Test Case
 */
class EstagiosdesenvolvimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estagiosdesenvolvimento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Estagiosdesenvolvimento = ClassRegistry::init('Estagiosdesenvolvimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estagiosdesenvolvimento);

		parent::tearDown();
	}

}
