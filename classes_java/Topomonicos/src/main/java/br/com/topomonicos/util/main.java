package br.com.topomonicos.util;


import br.com.topomonicos.dao.UsuarioDAO;
import br.com.topomonicos.domain.Usuario;

public class main {
	public static void main(String[] args) {
		
		
		Usuario usuario = new Usuario();
		
		usuario.setLogin("ITHALO");
		usuario.setSenha("123456");
		
		UsuarioDAO udao = new UsuarioDAO();	
		
		System.out.println(udao.listar());
	}
}