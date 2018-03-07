<?php
/**
 * CategoriasPaiFilho Fixture
 */
class CategoriasPaiFilhoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'categorias_pai_filho';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'categorias_pai' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'categorias_filho' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_categorias_pai_filho_categorias1_idx' => array('column' => 'categorias_pai', 'unique' => 0),
			'fk_categorias_pai_filho_categorias2_idx' => array('column' => 'categorias_filho', 'unique' => 0)
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
			'categorias_pai' => 1,
			'categorias_filho' => 1
		),
	);

}
