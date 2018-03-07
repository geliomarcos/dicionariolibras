<?php
	App::uses('AppModel', 'Model');
	class Usuario extends AppModel {
		public function desativar($id) {
		  $this->id = $id;
		  return $this->saveField('status', '0');
		}
		public function reativar($id) {
		  $this->id = $id;
		  return $this->saveField('status', '1');
		}
		public function ultimoId() {
			$id = $this->getLastInsertId();
			return $id;
		}
		public function autenticar($login, $senha) {
			//criptografo a senha
			$senha_atual = $this->cripto($senha);
			$resultado = $this->query("SELECT id, 
											  nome, 
											  username, 
											  perfil, 
											  email, 
											  status 
									   FROM usuarios
								       WHERE username = '".$login."' and 
										     senha = '".$senha_atual."'");
			return $resultado;
		}
		public function verificar_usuario($senha) {
			//criptografo a senha
			$senha_atual = $this->cripto($senha);
			//pega o id do usuario direto da sessão
			$id = CakeSession::read('Auth.User.id');   	
			//pega o status do usuario direto da sessão
			$status = CakeSession::read('Auth.User.status');
			//realiza a consulta sql
			//verifico se o id do usuario da sessao é igual ao id do usuario do banco de dados
			//verfiico se o status do usuario esta ativo e 
			//comparo a senha
			$resultado = $this->query("SELECT count(*) as existe
										 FROM usuarios
										 WHERE id = ".$id." and 
											   status = ".$status." and
											   senha = '".$senha_atual."'");
			//se o existe da consulta for 0, significa que a senha esta errada
			if ($resultado[0][0]['existe'] == 0) {
				return false;
			//senao significa que a senha esta certa
			} else {
				return true;
			}
		}
		public function verificarLogin($login) {
			$resultado = $this->query("SELECT count(*) as existe
									   FROM usuarios
									   WHERE username = '".$login."'");
			$resultado = $resultado[0][0]['existe'];
			return $resultado;
		}
		public function verificarEmail($email) {
			$resultado = $this->query("SELECT count(*) as existe
									   FROM usuarios
									   WHERE email = '".$email."'");
			$resultado = $resultado[0][0]['existe'];
			return $resultado;
		}
		public function cripto($var) {
			return sha1(Configure::read('Security.salt').$var.Configure::read('Security.cipherSeed'));
		}
		public function salvar_senha($senha) {    
			//criptografo a senha
			$nova_senha = $this->cripto($senha);
			//pega o id do usuario direto da sessão
			$id = CakeSession::read('Auth.User.id');   	
			//pega o status do usuario direto da sessão
			$status = CakeSession::read('Auth.User.status');
		    //realiza a consulta sql
		    //salvo a senha 
		    //se o id do usuario estiver igual e o status dele estiver ativo
			$this->query("UPDATE usuarios
						  SET senha = '".$nova_senha."'  
						  WHERE id = ".$id." and 
								status = 1");
		}
	}
?>