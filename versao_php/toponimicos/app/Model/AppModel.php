<?php
	App::uses('Model', 'Model');
	class AppModel extends Model {
		public $actsAs = array('Containable');
		public function beforeSave($options = array()){
			// Importa o componente para acessar os dados da sessão
			App::uses('CakeSession', 'Model/Datasource');			
			// Verifica se a operação é para atualização de registro
			if(isset($this->data[$this->alias]['id'])) {
				// Verifica se o campo 'modificado_usuario' existe na tabela
				if(isset($this->_schema['modificado_usuario'])) { 
					// Altera o valor do campo para nome de 'login' do usuário que fez a alteração
					$this->data[$this->alias]['modificado_usuario'] = CakeSession::read('Auth.User.username'); 
				}
			// Verifica se a operação é para inserção de registro
			}else{// Verifica se o campo 'criado_usuario' existe
				if(isset($this->_schema['criado_usuario'])) { 
					// Altera o valor do campo para o nome de 'login' do usuário que fez a alteração
					$this->data[$this->alias]['criado_usuario'] = CakeSession::read('Auth.User.username'); 
				}
			}
			return parent::beforeSave($options); // Retorna o estado da operação
		}
		public function afterFind($results, $primary = false) {
	        
	        foreach ($results as $key => $val) {
	            if (isset($val[$this->alias]['created'])) {
	                $results[$key][$this->alias]['created'] = date('d/m/Y H:i:s', strtotime($val[$this->alias]['created']));
	            }
	            if (isset($val[$this->alias]['modified'])) {
	                $results[$key][$this->alias]['modified'] = date('d/m/Y H:i:s', strtotime($val[$this->alias]['modified']));
	            }
	        }

			return $results;
	    }
	    protected function dateToUs($data) {
	        $data = explode('/', $data);
			$date = new DateTime();
			$date->setDate($data[2], $data[1], $data[0]);
	        return $date->format('Y-m-d');
	    }
	    public function senhaAleatoria($tamanho) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
			return substr(str_shuffle($chars), 0, $tamanho);
		}
	}
?>