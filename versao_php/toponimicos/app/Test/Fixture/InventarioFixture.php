<?php
/**
 * Inventario Fixture
 */
class InventarioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'objetivo' => array('type' => 'binary', 'null' => true, 'default' => null),
		'funcionalidades' => array('type' => 'binary', 'null' => true, 'default' => null),
		'dns' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'endereco_ip' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 11, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'porta' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'is_email' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'senha_email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'username_banco' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'senha_banco' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tiposaquisicoes_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'ano_implantacao' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'empresas_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'acordospropriedades_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'formascontratacoes_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'inicio_contrato' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'termino_contrato' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'codigosfontes_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'situacoescomerciais_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'situacoestecnicas_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'estagiosdesenvolvimentos_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'bancodados_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'linguagensprogramacoes_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'documentacao' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'plataformas_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'locaishospedagens_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'servidoresaplicacoes_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'is_sistema_suporte' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'tipossuportes_sistemas_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'valor_suporte_sistema' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'quantidade_meses_contratados_suporte_sistema' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'is_banco_suporte' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'tipossuportes_banco_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'valor_suporte_banco' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'quantidade_meses_contratos_suporte_banco' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'criado_usuario' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modificado_usuario' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_inventarios_formascontratacoes1_idx' => array('column' => 'formascontratacoes_id', 'unique' => 0),
			'fk_inventarios_tiposaquisicoes1_idx' => array('column' => 'tiposaquisicoes_id', 'unique' => 0),
			'fk_inventarios_linguagensprogramacoes1_idx' => array('column' => 'linguagensprogramacoes_id', 'unique' => 0),
			'fk_inventarios_locaishospedagens1_idx' => array('column' => 'locaishospedagens_id', 'unique' => 0),
			'fk_inventarios_situacoescomerciais1_idx' => array('column' => 'situacoescomerciais_id', 'unique' => 0),
			'fk_inventarios_servidoresaplicacoes1_idx' => array('column' => 'servidoresaplicacoes_id', 'unique' => 0),
			'fk_inventarios_situacoestecnicas1_idx' => array('column' => 'situacoestecnicas_id', 'unique' => 0),
			'fk_inventarios_tipossuportes1_idx' => array('column' => 'tipossuportes_sistemas_id', 'unique' => 0),
			'fk_inventarios_estagiosdesenvolvimentos1_idx' => array('column' => 'estagiosdesenvolvimentos_id', 'unique' => 0),
			'fk_inventarios_plataformas1_idx' => array('column' => 'plataformas_id', 'unique' => 0),
			'fk_inventarios_acordospropriedades1_idx' => array('column' => 'acordospropriedades_id', 'unique' => 0),
			'fk_inventarios_bancodados1_idx' => array('column' => 'bancodados_id', 'unique' => 0),
			'fk_inventarios_codigosfontes1_idx' => array('column' => 'codigosfontes_id', 'unique' => 0),
			'fk_inventarios_empresas1_idx' => array('column' => 'empresas_id', 'unique' => 0),
			'fk_inventarios_tipossuportes2_idx' => array('column' => 'tipossuportes_banco_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'objetivo' => 'Lorem ipsum dolor sit amet',
			'funcionalidades' => 'Lorem ipsum dolor sit amet',
			'dns' => 'Lorem ipsum dolor sit amet',
			'endereco_ip' => 'Lorem ips',
			'porta' => 1,
			'is_email' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'senha_email' => 'Lorem ipsum dolor sit amet',
			'username_banco' => 'Lorem ipsum dolor sit amet',
			'senha_banco' => 'Lorem ipsum dolor sit amet',
			'tiposaquisicoes_id' => 1,
			'ano_implantacao' => 1,
			'empresas_id' => 1,
			'acordospropriedades_id' => 1,
			'formascontratacoes_id' => 1,
			'inicio_contrato' => 'Lorem ip',
			'termino_contrato' => 'Lorem ip',
			'codigosfontes_id' => 1,
			'situacoescomerciais_id' => 1,
			'situacoestecnicas_id' => 1,
			'estagiosdesenvolvimentos_id' => 1,
			'bancodados_id' => 1,
			'linguagensprogramacoes_id' => 1,
			'documentacao' => 'L',
			'plataformas_id' => 1,
			'locaishospedagens_id' => 1,
			'servidoresaplicacoes_id' => 1,
			'is_sistema_suporte' => 1,
			'tipossuportes_sistemas_id' => 1,
			'valor_suporte_sistema' => 1,
			'quantidade_meses_contratados_suporte_sistema' => 1,
			'is_banco_suporte' => 1,
			'tipossuportes_banco_id' => 1,
			'valor_suporte_banco' => 1,
			'quantidade_meses_contratos_suporte_banco' => 1,
			'created' => '2016-05-27 15:41:40',
			'criado_usuario' => 'Lorem ipsum dolor sit amet',
			'modified' => '2016-05-27 15:41:40',
			'modificado_usuario' => 'Lorem ipsum dolor sit amet'
		),
	);

}
