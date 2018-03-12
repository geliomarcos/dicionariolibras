package br.com.topomonicos.domain;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Table;

@Entity
@Table(name = "tb_usuario")
public class Usuario extends GenericDomain {

	@Column(length = 45, nullable = false)
	private String login;
	
	@Column(length = 255, nullable = false)
	private String senha;

	public String getLogin() {
		return login;
	}

	public void setLogin(String login) {
		this.login = login;
	}

	public String getSenha() {
		return senha;
	}

	public void setSenha(String senha) {
		this.senha = senha;
	}
	
	 @Override
	 public String toString() {
	  return "Usuario [username=" + login + ", password=" + senha
	    + "]";
	 }
}
