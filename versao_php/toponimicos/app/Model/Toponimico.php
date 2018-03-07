<?php
	App::uses('AppModel', 'Model');
	class Toponimico extends AppModel {
		public $belongsTo = array(
			'Municipio' => array(
				'className' => 'Municipio',
				'foreignKey' => 'municipios_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
		public function ultimoId() {
			$id = $this->find('first', array('order' => array('Toponimico.id DESC')));
			$id = $id['Toponimico']['id'] + 1;
			return $id;
		}
		public function salvarArquivo($nome_arquivo,$is_tipo,$tipo,$toponimicos_id) {
			$this->query("INSERT INTO uploads (nome_arquivo,is_tipo,tipo,toponimicos_id)
						  VALUES ('".$nome_arquivo."',".$is_tipo.",'".$tipo."',".$toponimicos_id.");");
		}	
		public function infoImagem($id) {
			$resultado = $this->query("SELECT * FROM uploads WHERE is_tipo = 0 and toponimicos_id = ".$id);
			if (empty($resultado)) {
				return null;
			} 
			return $resultado[0];
		}
		public function infoVideo($id) {
			$resultado = $this->query("SELECT * FROM uploads WHERE is_tipo = 1 and toponimicos_id = ".$id);
			if (empty($resultado)) {
				return null;
			} 
			return $resultado[0];
		}
	}
?>