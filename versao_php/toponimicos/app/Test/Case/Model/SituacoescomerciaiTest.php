<?php
App::uses('Situacoescomerciai', 'Model');

/**
 * Situacoescomerciai Test Case
 */
class SituacoescomerciaiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.situacoescomerciai'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Situacoescomerciai = ClassRegistry::init('Situacoescomerciai');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Situacoescomerciai);

		parent::tearDown();
	}

}
