<?php
    App::uses('Controller', 'Controller');
    App::uses('CakeEmail', 'Network/Email');
    App::uses('CakeSession', 'Model/Datasource');
    class AppController extends Controller {
        public $components = array(
            'Session',
            'RequestHandler',
            'Auth' => array(            
                'loginAction' => array('controller' => 'usuarios', 'action' => 'login'),
                'loginRedirect' => array('controller' => 'toponomicos', 'action' => 'index'),
                'logoutRedirect' => array('controller' => 'usuarios', 'action' => 'login'),
                'authError' => 'Você não possui permissão para executar essa ação.',
                'authorize' => array('Controller')
            )
        );   
        public function isAuthorized() {
            return true;
        }  		
        public function enviarEmailSenha($template, $to, $titulo, $vars = array()) {
            $email = new CakeEmail('email');

            $email->template($template, 'default')
                    ->emailFormat('html')
                    ->viewVars($vars)
                    ->from('josilene.ribeiro1982@gmail.com')
                    ->to($to)
                    ->subject($titulo)
                    ->send();
        }	
		private function checkFilter(){
			if (!in_array($this->action, array('index')) || $this->Session->read('page') != $this->params['controller'])
				$this->Session->write('filter', array());
		}
		protected function setFilter($filter) {
			$this->Session->write('filter', $filter);
			$this->Session->write('page', $this->params['controller']);
		}
		protected function getFilter() {
			$conditions = array();
			if($this->Session->check('filter')) {
				$conditions = $this->Session->read('filter');
			}
			return $conditions;
		}
	}
?>