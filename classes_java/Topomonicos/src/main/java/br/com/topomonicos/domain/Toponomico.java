package br.com.topomonicos.domain;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@Entity
@Table(name = "tb_toponomico")
public class Toponomico extends GenericDomain{

	@Column(columnDefinition = "LONGTEXT", nullable = false)
	public String etimologia;

	@Column(columnDefinition = "LONGTEXT", nullable = false)
	public String taxionomia;

	@Column(columnDefinition = "LONGTEXT", nullable = false)
	public String entrada_lexical;

	@Column(columnDefinition = "LONGTEXT", nullable = false)
	public String estrutura_morfologica;

	@Column(columnDefinition = "LONGTEXT", nullable = false)
	public String historico;

	@Column(columnDefinition = "LONGTEXT", nullable = false)
	public String informacao;

	@Column(nullable = false)
	public String pesquisadora;

	@Column(nullable = false)
	public String revisora;

	@Column(columnDefinition = "LONGTEXT", nullable = false)
	public String fontes;

	@Column(nullable = false)
	@Temporal(TemporalType.DATE)
	public Date data_coleta;

	@ManyToOne
	@JoinColumn(nullable = false)
	public Municipio municipio;

	public String getEtimologia() {
		return etimologia;
	}

	public void setEtimologia(String etimologia) {
		this.etimologia = etimologia;
	}

	public String getTaxionomia() {
		return taxionomia;
	}

	public void setTaxionomia(String taxionomia) {
		this.taxionomia = taxionomia;
	}

	public String getEntrada_lexical() {
		return entrada_lexical;
	}

	public void setEntrada_lexical(String entrada_lexical) {
		this.entrada_lexical = entrada_lexical;
	}

	public String getEstrutura_morfologica() {
		return estrutura_morfologica;
	}

	public void setEstrutura_morfologica(String estrutura_morfologica) {
		this.estrutura_morfologica = estrutura_morfologica;
	}

	public String getHistorico() {
		return historico;
	}

	public void setHistorico(String historico) {
		this.historico = historico;
	}

	public String getInformacao() {
		return informacao;
	}

	public void setInformacao(String informacao) {
		this.informacao = informacao;
	}

	public String getPesquisadora() {
		return pesquisadora;
	}

	public void setPesquisadora(String pesquisadora) {
		this.pesquisadora = pesquisadora;
	}

	public String getRevisora() {
		return revisora;
	}

	public void setRevisora(String revisora) {
		this.revisora = revisora;
	}

	public String getFontes() {
		return fontes;
	}

	public void setFontes(String fontes) {
		this.fontes = fontes;
	}

	public Date getData_coleta() {
		return data_coleta;
	}

	public void setData_coleta(Date data_coleta) {
		this.data_coleta = data_coleta;
	}

	public Municipio getMunicipio() {
		return municipio;
	}

	public void setMunicipio(Municipio municipio) {
		this.municipio = municipio;
	}

}
