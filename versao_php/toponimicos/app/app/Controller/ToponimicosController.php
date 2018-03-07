<?php
	App::uses('AppController', 'Controller');
	class ToponimicosController extends AppController {
		public $components = array('Paginator'); 
	    public function beforeFilter() {
	        if (CakeSession::read('Auth.User.perfil') == 'admin') {
	            $this->Auth->allow('index', 
								   'index2', 
	            				   'visualizar', 
	                               'novo', 
	                               'editar',  
	                               'deletar');
	        } else if (CakeSession::read('Auth.User.perfil') == 'user') {            
	            $this->Auth->allow('index', 
								   'index2', 
								   'visualizar', 
	                               'novo', 
	                               'editar', 
	                               'deletar');
            } else {
	            $this->redirect(array('controller' => 'usuarios', 'action' => 'login'));
	        }
	    }
		public function index() {
			$this->Toponimico->recursive = 0;
			$tipos = $this->Toponimico->find('all');
			$this->set(compact('tipos'));
		}
		public function index2() {
			$this->Toponimico->recursive = 0;
			$tipos = $this->Toponimico->find('all');
			$this->set(compact('tipos'));
		}
		public function visualizar($id = null) {
			if (!$this->Toponimico->exists($id)) {
	            $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
				return $this->redirect(array('action' => 'index'));
			}
			$options = array('conditions' => array('Toponimico.' . $this->Toponimico->primaryKey => $id));
			$this->set('tipo', $this->Toponimico->find('first', $options));
		}
		public function novo() {
			if ($this->request->is('post')) {
				$this->Toponimico->create();
				if ($this->Toponimico->save($this->request->data)) {
					$this->Session->setFlash(__('Registro salvo com sucesso'), 'flash/success');
					return $this->redirect(array('action' => 'index'));
				}
			}
			$municipios = $this->Toponimico->Municipio->find('all');
			$this->set(compact('municipios'));
		}
		public function editar($id = null) {
			if (!$this->Toponimico->exists($id)) {
	            $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
				return $this->redirect(array('action' => 'index'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Toponimico->save($this->request->data)) {
					$this->Session->setFlash(__('Registro atualizado com sucesso'), 'flash/success');
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$options = array('conditions' => array('Toponimico.' . $this->Toponimico->primaryKey => $id), 'recursive' => -1);
				$this->request->data = $this->Toponimico->find('first', $options);
				$municipios = $this->Toponimico->Municipio->find('all');
				$this->set(compact('municipios'));
			}
		}
		public function deletar($id = null) {
			$this->Toponimico->id = $id;
			if (!$this->Toponimico->exists()) {
	            $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
				return $this->redirect(array('action' => 'index'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->Toponimico->delete()) {
	            $this->Session->setFlash(__('Registro deletado com sucesso'), 'flash/success');
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Registro não foi deletado. Por favor, tente novamente.'), 'flash/error');
	        return $this->redirect(array('action' => 'index'));
	    }
	}
?>