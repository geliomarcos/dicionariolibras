<?php
App::uses('Agenda', 'Model');

/**
 * Agenda Test Case
 */
class AgendaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agenda',
		'app.coordenacoes'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Agenda = ClassRegistry::init('Agenda');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Agenda);

		parent::tearDown();
	}

}
