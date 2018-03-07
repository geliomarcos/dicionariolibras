<?php
/**
 * Agenda Fixture
 */
class AgendaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'dia_semana' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'hora_inicio' => array('type' => 'time', 'null' => true, 'default' => null),
		'hora_termino' => array('type' => 'time', 'null' => true, 'default' => null),
		'numero_cabine' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'criado_usuario' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modificado_usuario' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'coordenacoes_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_agendas_coordenacoes1_idx' => array('column' => 'coordenacoes_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'dia_semana' => 1,
			'hora_inicio' => '15:45:12',
			'hora_termino' => '15:45:12',
			'numero_cabine' => 1,
			'created' => '2016-08-30 15:45:12',
			'criado_usuario' => 'Lorem ipsum dolor sit amet',
			'modified' => '2016-08-30 15:45:12',
			'modificado_usuario' => 'Lorem ipsum dolor sit amet',
			'coordenacoes_id' => 1
		),
	);

}
