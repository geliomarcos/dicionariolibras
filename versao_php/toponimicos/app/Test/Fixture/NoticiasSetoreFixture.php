<?php
/**
 * NoticiasSetore Fixture
 */
class NoticiasSetoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'noticias_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'setores_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'criado_usuario' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modificado_usuario' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_noticias_setores_noticias1_idx' => array('column' => 'noticias_id', 'unique' => 0),
			'fk_noticias_setores_setores1_idx' => array('column' => 'setores_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB', 'comment' => 'os setores que podem visualizar a noticia')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'noticias_id' => 1,
			'setores_id' => 1,
			'created' => '2015-11-30 21:24:58',
			'criado_usuario' => 'Lorem ipsum dolor sit amet',
			'modified' => '2015-11-30 21:24:58',
			'modificado_usuario' => 'Lorem ipsum dolor sit amet'
		),
	);

}
