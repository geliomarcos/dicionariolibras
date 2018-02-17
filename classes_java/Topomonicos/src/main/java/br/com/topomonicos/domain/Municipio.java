package br.com.topomonicos.domain;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

@Entity
@Table(name = "tb_municipio")
public class Municipio extends GenericDomain{
	
	@Column(nullable = false)
	private String nome;
	
	@Column(length = 2, nullable = false)
	private String uf;
	
	@Column(nullable = false)
	private int area_territorial;
	
	@Column(nullable = false)
	private int populacao;
	
	@Column(length = 45, nullable = false)
	private String localizacao;
	
	@ManyToOne
	@JoinColumn(nullable = false)
	private Usuario usuario;

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getUf() {
		return uf;
	}

	public void setUf(String uf) {
		this.uf = uf;
	}

	public int getArea_territorial() {
		return area_territorial;
	}

	public void setArea_territorial(int area_territorial) {
		this.area_territorial = area_territorial;
	}

	public int getPopulacao() {
		return populacao;
	}

	public void setPopulacao(int populacao) {
		this.populacao = populacao;
	}

	public String getLocalizacao() {
		return localizacao;
	}

	public void setLocalizacao(String localizacao) {
		this.localizacao = localizacao;
	}

	public Usuario getUsuario() {
		return usuario;
	}

	public void setUsuario(Usuario usuario) {
		this.usuario = usuario;
	}
	
	

}
