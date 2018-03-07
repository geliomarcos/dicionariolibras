<?php
App::uses('Inventario', 'Model');

/**
 * Inventario Test Case
 */
class InventarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.inventario',
		'app.tiposaquisicoes',
		'app.empresas',
		'app.acordospropriedades',
		'app.formascontratacoes',
		'app.codigosfontes',
		'app.situacoescomerciais',
		'app.situacoestecnicas',
		'app.estagiosdesenvolvimentos',
		'app.bancodados',
		'app.linguagensprogramacoes',
		'app.plataformas',
		'app.locaishospedagens',
		'app.servidoresaplicacoes',
		'app.tipossuportes_sistemas',
		'app.tipossuportes_banco'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Inventario = ClassRegistry::init('Inventario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Inventario);

		parent::tearDown();
	}

}
