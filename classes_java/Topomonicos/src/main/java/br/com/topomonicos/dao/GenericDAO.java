package br.com.topomonicos.dao;

import java.lang.reflect.ParameterizedType;
import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.Transaction;
import org.hibernate.criterion.Restrictions;

import br.com.topomonicos.util.HibernateUtil;

public class GenericDAO<Entidade> {
	private Class<Entidade>  classe;
	
	@SuppressWarnings("unchecked")
	public GenericDAO(){
		this.classe = (Class<Entidade>) ((ParameterizedType) getClass().getGenericSuperclass()).getActualTypeArguments()[0];
	}
	
	
	public void salvar(Entidade entidade) {
		Session secao = HibernateUtil.getFabricaDeSessoes().openSession();
		Transaction transacao = null;

		try {
			transacao = secao.beginTransaction();
			secao.save(entidade);
			transacao.commit();
			
		} catch (RuntimeException erro) {
			if (transacao != null) {
				transacao.rollback();
				
			}
			throw erro;
		}

		finally {
			secao.close();
		}

	}
	
	public List<Entidade> listar() {
		
		Session secao = HibernateUtil.getFabricaDeSessoes().openSession();
		
		try {

			Criteria consulta = secao.createCriteria(classe);
			List<Entidade> resultado = consulta.list();
			
			return resultado;

			
		} catch (RuntimeException erro) {
			
			throw erro;
		}

		finally {
			secao.close();
		}

		
	}
	
	public Entidade buscar(int codigo) {
		
		Session secao = HibernateUtil.getFabricaDeSessoes().openSession();
		
		try {

			Criteria consulta = secao.createCriteria(classe);
			consulta.add(Restrictions.idEq(codigo));
			Entidade resultado = (Entidade) consulta.uniqueResult();
			
			return resultado;

			
		} catch (RuntimeException erro) {
			
			throw erro;
		}

		finally {
			secao.close();
		}

		
	}
}
