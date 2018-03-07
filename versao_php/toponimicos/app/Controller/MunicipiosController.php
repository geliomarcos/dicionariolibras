<?php
	App::uses('AppController', 'Controller');
	class MunicipiosController extends AppController {
		public $components = array('Paginator');
	    public function beforeFilter() {
	        if (CakeSession::read('Auth.User.perfil') == 'admin') {
	            $this->Auth->allow('index', 
	            				   'visualizar', 
	                               'novo', 
	                               'editar',  
	                               'deletar');
            } else if (CakeSession::read('Auth.User.perfil') == 'operador') {            
                $this->redirect(array('controller' => 'participantes', 'action' => 'index'));
	        } else if (CakeSession::read('Auth.User.perfil') == 'user') {            
	            $this->Auth->allow('index', 
	            				   'visualizar', 
	                               'novo', 
	                               'editar', 
	                               'deletar');
            } else {
	            $this->redirect(array('controller' => 'usuarios', 'action' => 'login'));
	        }
	    }
		public function index() {
			$this->Municipio->recursive = 0;
			$tipos = $this->Municipio->find('all');
			$this->set(compact('tipos'));
		}
		public function visualizar($id = null) {
			if (!$this->Municipio->exists($id)) {
	            $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
				return $this->redirect(array('action' => 'index'));
			}
			$options = array('conditions' => array('Municipio.' . $this->Municipio->primaryKey => $id));
			$this->set('tipo', $this->Municipio->find('first', $options));
		}
		public function novo() {
			if ($this->request->is('post')) {
				$this->Municipio->create();
				if ($this->Municipio->save($this->request->data)) {
					$this->Session->setFlash(__('Registro salvo com sucesso'), 'flash/success');
					return $this->redirect(array('action' => 'index'));
				}
			}
		}
		public function editar($id = null) {
			if (!$this->Municipio->exists($id)) {
	            $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
				return $this->redirect(array('action' => 'index'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Municipio->save($this->request->data)) {
					$this->Session->setFlash(__('Registro atualizado com sucesso'), 'flash/success');
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$options = array('conditions' => array('Municipio.' . $this->Municipio->primaryKey => $id), 'recursive' => -1);
				$this->request->data = $this->Municipio->find('first', $options);
			}
		}
		public function deletar($id = null) {
			$this->Municipio->id = $id;
			if (!$this->Municipio->exists()) {
	            $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
				return $this->redirect(array('action' => 'index'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->Municipio->delete()) {
	            $this->Session->setFlash(__('Registro deletado com sucesso'), 'flash/success');
				return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Registro não foi deletado. Por favor, tente novamente.'), 'flash/error');
            return $this->redirect(array('action' => 'index'));
	    }
	}
?>