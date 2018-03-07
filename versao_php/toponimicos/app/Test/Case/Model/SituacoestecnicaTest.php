<?php
App::uses('Situacoestecnica', 'Model');

/**
 * Situacoestecnica Test Case
 */
class SituacoestecnicaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.situacoestecnica'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Situacoestecnica = ClassRegistry::init('Situacoestecnica');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Situacoestecnica);

		parent::tearDown();
	}

}
