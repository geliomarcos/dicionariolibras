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
	                               'deletar',
	                               'relatorios',  
	                               'sobre');
	        } else if (CakeSession::read('Auth.User.perfil') == 'user') {            
	            $this->Auth->allow('index', 
								   'index2', 
								   'visualizar', 
	                               'novo', 
	                               'editar', 
	                               'deletar',
	                               'relatorios', 
	                               'sobre');
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
			$uploads1 = $this->Toponimico->infoImagem($id);
			$uploads2 = $this->Toponimico->infoVideo($id);
			$this->set(compact('uploads1','uploads2'));
		}
		public function novo() {
			if ($this->request->is('post')) {
				$this->Toponimico->create();
				//debug($this->request->data);exit(0);
				//cria uma variavel para receber os dados do arquivo do formulario
				$documento = $this->request->data['File'];
				//destroi o arquivo no array do formulario
				unset($this->request->data['File']);
				$i=0;
				if ($documento['arquivo'][0]['name'] != '') {
					foreach ($documento['arquivo'] as $arquivo) :
						//separa o tipo do arquivo em um array ex: image/png -> 0-image, 1-png
						$nome = explode('.', $arquivo['name']);
						//contador
						$i = count($nome);
						//tipo do arquivo
						$tipo = $nome[$i-1];
						//destroi a variavel nome
						//unset($nome);
						//ultimo id no banco acrescido de mais 1
						$id = $this->Toponimico->ultimoId();
						$this->request->data['id'] = $id;
						if ($tipo == 'mp4') {
							$nome_arquivo = 'video_'.$i."_".$id."_".$arquivo['name'];
							$is_tipo = 1;
							//caminho absoluto do destino do arquivo
							$local = WWW_ROOT.'files\videos\\'.$nome_arquivo;
						} else if (($tipo == 'png') || ($tipo == 'jpg') || ($tipo == 'jpeg')) {
							$nome_arquivo = 'imagem_'.$i."_".$id."_".$arquivo['name'];
							$is_tipo = 0;
							//caminho absoluto do destino do arquivo
							$local = WWW_ROOT.'files\imagens\\'.$nome_arquivo;
						}
						$type = $arquivo['type'];
						//salvar os dados do arquivo no banco
						$this->Toponimico->salvarArquivo($nome_arquivo, $is_tipo, $type, $id);
						$tmp = $arquivo['tmp_name'];
						//mova o arquivo para a pasta FILES no WEBROOT
						move_uploaded_file($tmp, $local);
						$i++;
					endforeach;
				}
				$i=0;
				if ($documento['arquivo2'][0]['name'] != '') {
					foreach ($documento['arquivo2'] as $arquivo) :
						//separa o tipo do arquivo em um array ex: image/png -> 0-image, 1-png
						$nome = explode('.', $arquivo['name']);
						//contador
						$i = count($nome);
						//tipo do arquivo
						$tipo = $nome[$i-1];
						//destroi a variavel nome
						//unset($nome);
						//ultimo id no banco acrescido de mais 1
						$id = $this->Toponimico->ultimoId();
						$this->request->data['id'] = $id;
						if ($tipo == 'mp4') {
							$nome_arquivo = 'video_'.$i."_".$id."_".$arquivo['name'];
							$is_tipo = 1;
							//caminho absoluto do destino do arquivo
							$local = WWW_ROOT.'files\videos\\'.$nome_arquivo;
						} else if (($tipo == 'png') || ($tipo == 'jpg') || ($tipo == 'jpeg')) {
							$nome_arquivo = 'imagem_'.$i."_".$id."_".$arquivo['name'];
							$is_tipo = 0;
							//caminho absoluto do destino do arquivo
							$local = WWW_ROOT.'files\imagens\\'.$nome_arquivo;
						}
						$type = $arquivo['type'];
						//salvar os dados do arquivo no banco
						$this->Toponimico->salvarArquivo($nome_arquivo, $is_tipo, $type, $id);
						$tmp = $arquivo['tmp_name'];
						//mova o arquivo para a pasta FILES no WEBROOT
						move_uploaded_file($tmp, $local);
						$i++;
					endforeach;
				}
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
		public function relatorios($id = null) {
			$this->layout = 'pdf';
			$options = array('conditions' => array('Toponimico.' . $this->Toponimico->primaryKey => $id));
			$this->set('tipo', $this->Toponimico->find('first', $options));
			$uploads1 = $this->Toponimico->infoImagem($id);
			$uploads2 = $this->Toponimico->infoVideo($id);
			$this->set(compact('uploads1','uploads2'));
			$this->render('relatorios');
	    }
		public function sobre() {
	    }
	}
?>