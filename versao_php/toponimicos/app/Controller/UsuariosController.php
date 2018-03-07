<?php
    App::uses('AppController', 'Controller');
    class UsuariosController extends AppController {
        public $components = array('Paginator');
        public function beforeFilter() {
            if (CakeSession::read('Auth.User.perfil') == 'admin') {
                $this->Auth->allow('login', 
                                   'logout',
                                   'index', 
                                   'visualizar', 
                                   'novo', 
                                   'editar',
                                   'desativar', 
                                   'reativar',
                                   'alterar_senha', 
                                   'resetar_senha', 
                                   'primeira_senha', 
                                   'enviarEmailSenha');
            } else if (CakeSession::read('Auth.User.perfil') == 'user') {
                $this->Auth->allow('login', 
                                   'logout', 
                                   'alterar_senha');
            } else {
                $this->Auth->allow('login');
            }
        }
        public function login() {
            //layout da pagina de login
            $this->layout = 'login_user';
            if ($this->request->is('post')) {
                //chama a função para autenticar o usuario
                $resultado = $this->Usuario->autenticar($this->request->data['Usuario']['username'],$this->request->data['Usuario']['senha']);
  
                //se o resultado da consulta for diferente de nulo, significa que existe um usuario
                //com aquele usaurio  e senha
                if ($resultado != null) {
                    //se o status do usuario for igual a 1, significa que ele esta ativo no sistema
                    //caso contraria, efetua um logout.
                    if ($resultado[0]['usuarios']['status'] == 1) {
                        // Salva o id do usuario na sessão
                        $this->Session->write('Auth.User.id', $resultado[0]['usuarios']['id']);
                        // Salva o nome do usuario na sessão
                        $this->Session->write('Auth.User.nome', $resultado[0]['usuarios']['nome']);
                        // Salva o login do usuario na sessão
                        $this->Session->write('Auth.User.username', $resultado[0]['usuarios']['username']);
                        // Salva o email do usuario na sessão
                        $this->Session->write('Auth.User.email', $resultado[0]['usuarios']['email']);
                        // Salva o perfil do usuario na sessão
                        $this->Session->write('Auth.User.perfil', $resultado[0]['usuarios']['perfil']);
                        // Salva o status do usuario na sessão
                        $this->Session->write('Auth.User.status', $resultado[0]['usuarios']['status']);
                        // Redireciona o usuário
                        $this->redirect(array('controller' => 'toponimicos', 'action' => 'index'));                       
                    } else {
                        $this->Session->setFlash('Usuário foi desativado!', 'flash/login_warning');
                        $this->redirect(array('action' => 'login'));
                    }
                } else {
                    $this->Session->setFlash('Usuário ou senha inválido(s)!', 'flash/login_error');
                    $this->redirect(array('action' => 'login'));
                }
            }
        }
        public function logout() {
            $this->Session->destroy();
            $this->Session->setFlash('A sessão foi finalizada', 'flash/login_info');
            $this->redirect(array('action' => 'login'));
        }
        public function index() {
            $this->Usuario->recursive = 0;
            $usuarios = $this->Usuario->find('all');                               
            $this->set(compact('usuarios'));
        }
        public function visualizar($id = null) {
            if (!$this->Usuario->exists($id)) {
                $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
            }
            $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
            $this->set('usuario', $this->Usuario->find('first', $options));
        }
        public function novo() {
            if ($this->request->is('post')) {
                $this->Usuario->create();
                //verifica se o login já existe no banco de dados
                if ($this->Usuario->verificarLogin($this->request->data('username')) == 0) {
                    if ($this->Usuario->verificarEmail($this->request->data('email')) == 0) {    
                        if ($this->Usuario->save($this->request->data)) {
                            //pega o ultimo id inserido no banco
                            $id = $this->Usuario->ultimoId();    
                            //chama a funçao para gerar, salvar e enviar por email 
                            //uma senha para o usuario 
                            $this->primeira_senha($id);
                        }
                    } else {
                        $this->Session->setFlash(__('Email já existe no sistema!'), 'flash/info');
                        return $this->redirect(array('action' => 'novo'));
                    }
                } else {
                    $this->Session->setFlash(__('Login de usuário já existe no sistema!'), 'flash/info');
                    return $this->redirect(array('action' => 'novo'));
                }
            }
        }
        public function editar($id = null) {
            if (!$this->Usuario->exists($id)) {
                $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
            }
            if ($this->request->is(array('post', 'put'))) {
                if ($this->Usuario->save($this->request->data)) {
                    $this->Session->setFlash(__('Registro atualizado com sucesso'), 'flash/success');
                    return $this->redirect(array('action' => 'index'));
                }
            } else {
                $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
                $this->request->data = $this->Usuario->find('first', $options);
            }
        }
        public function desativar($id = null) {
            if (!$this->Usuario->exists($id)) {
                $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
            }

            if ($this->Usuario->desativar($id)) {
                $this->Session->setFlash(__('O usuário foi desativado'), 'flash/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Ocorreu um erro ao ativar o usuário. 
                                             Por favor, tente novamente.'), 'flash/error');
                return $this->redirect(array('action' => 'index'));
            }
        }
        public function reativar($id = null) {
            if (!$this->Usuario->exists($id)) {
                $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
            }

            if ($this->Usuario->reativar($id)) {
                $this->Session->setFlash(__('O usuário foi reativado'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Ocorreu um erro ao reativar o usuário. 
                                             Por favor, tente novamente.'), 'flash/error');
                $this->redirect(array('action' => 'index'));
            }
        }
        public function alterar_senha() {
            if ($this->request->is('post')) {
                //seta as variaveis do formulario
                $senha_atual         = $this->request->data('senha_atual');
                $nova_senha          = $this->request->data('nova_senha');
                $confirmar_nova_senha = $this->request->data('confirmar_nova_senha');
                //se a nova senha não pode ser vazia e 
                //o usuario tem que informar a nova senha e confirma-la, ou seja, 
                //informa novamente para compararmos 
                if (isset($nova_senha)) {
                    if ($nova_senha == $confirmar_nova_senha) {
                        //chama a função que realiza uma consulta no banco de dados para verificar 
                        //se a sua senha de usuario atual confere com a salva no banco
                        $verificarsenha = $this->Usuario->verificar_usuario($senha_atual);
                        //se a variavel verificarsenha for true, significa que a senha esta correta
                        if ($verificarsenha) {
                            //chama a funçao para salvar no banco de dados a nova senha
                            $this->Usuario->salvar_senha($nova_senha);
                            $this->Session->setFlash(__('Sua senha foi alterada com sucesso!'), 'flash/success');
                            return $this->redirect(array('controller' => 'eventos', 'action' => 'index'));
                        //senao, significa que esta errada
                        } else {
                            $this->Session->setFlash(__('Sua senha atual não é válida!'), 'flash/error');
                            $this->redirect(array('action' => 'alterar_senha'));
                        }
                    //senao, significa que as senhas informadas não são iguais
                    } else {
                        $this->Session->setFlash(__('Sua nova senha não está igual a senha de confirmação!'), 'flash/error');
                        $this->redirect(array('action' => 'alterar_senha'));                
                    }
                //senao, significa que as senhas informadas esta vazia
                } else {
                    $this->Session->setFlash(__('Sua nova senha está vazia!'), 'flash/error');
                    $this->redirect(array('action' => 'alterar_senha'));                
                }
            }
        }
        public function resetar_senha($id = null) {
            if (!$this->Usuario->exists($id)) {
                $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
            }
            $this->Usuario->id = $id;
            if ($this->request->is('get')) {
                $senha    = $this->Usuario->senhaAleatoria(8);
                $nome     = $this->Usuario->field('nome');
                $login    = $this->Usuario->field('username');
                $to       = $this->Usuario->field('email');
                $titulo   = 'Restauração de Senha';
                $template = 'resetar_senha';
                if (!empty($to)) {
                    if ($this->Usuario->saveField('senha', $this->Usuario->cripto($senha))) {
                        $status = $this->enviarEmailSenha($template, $to, $titulo, array('usuario' => $nome, 'login' => $login, 'senha' => $senha));
                        
                        $this->Session->setFlash(__('Registro salvo com sucesso. 
                                                     Uma senha de acesso foi enviada ao e-mail do usuário '.$nome.''), 
                                                     'flash/success');
                    } else {
                        $this->Session->setFlash(__('Ocorreu um erro ao resetar a senha.'), 'flash/error');
                    }
                } else {
                    $this->Session->setFlash(__('O usuário não possui email cadastrado.'), 'flash/warning');
                }
            }

            $this->redirect(array('action' => 'index'));  
        }
        public function primeira_senha($id = null) {
            if (!$this->Usuario->exists()) {
                $this->Session->setFlash(__('Registro não encontrado!'), 'flash/error');
            }    
            $this->Usuario->id = $id;
            if ($this->request->is('post')) {
                $senha    = $this->Usuario->senhaAleatoria(8);
                $nome     = $this->Usuario->field('nome');
                $login    = $this->Usuario->field('username');
                $to       = $this->Usuario->field('email');
                $titulo   = 'Nova Senha';
                $template = 'nova_senha';
                if (!empty($to)) {
                    if ($this->Usuario->saveField('senha', $this->Usuario->cripto($senha))) {
                        $status = $this->enviarEmailSenha($template, $to, $titulo, array('usuario' => $nome, 'login' => $login, 'senha' => $senha));
                        
                        $this->Session->setFlash(__('Registro salvo com sucesso. 
                                                     Uma senha de acesso foi enviada ao seu email!'), 
                                                    'flash/success');
                    } else {
                        $this->Session->setFlash(__('Ocorreu um erro ao criar a senha.'), 'flash/error');
                    }
                } else {
                    $this->Session->setFlash(__('O usuário não possui email cadastrado.'), 'flash/warning');
                }
            }
            $this->redirect(array('action' => 'index'));
        }
    }
?>