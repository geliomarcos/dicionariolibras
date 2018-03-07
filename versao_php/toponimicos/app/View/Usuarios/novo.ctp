<style type="text/css">
	table {
		border-collapse: collapse;
	}

	table, th, td {

	}
</style>
<div class="row" style="margin-left:10px; margin-right: 10px;">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-header"><div class="table-responsive"><center><h2>Cadastro do Usuário</h2></center></div></div>					
			<div class="panel-body">
				<div class="table-responsive">					
					<div style="margin-left:20%;margin-right:20%;width:60%;height:250px;">
						<form action="" method="POST" class="form center-block horizontal">
							<div class="row">
								<table style="margin-bottom:0px;border-bottom: 0;width:100%">
									<tr>
										<td width="100%"><label for="usuario_nome_label">Nome </label></td>
									</tr>
									<tr>
										<td>
											<input type="text" name="nome" class="form-control" placeholder="Nome do Usuário" maxlength="100" minlength="10" required>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="19%"><label for="usuario_login_label">Login </label></td>
										<td width="1%"></td>
										<td width="20%"><label for="usuario_email_label">Email </label></td>
										<td width="1%"></td>
										<td width="19%"><label for="usuario_perfil_label">Perfil </label></td>
									</tr>	
									<tr>
										<td>
											<input type="text" name="username" class="form-control" placeholder="Login do Usuário" maxlength="50" minlength="5" required>
										</td>
										<td></td>
										<td>
											<input type="email" name="email" class="form-control" placeholder="Email do Usuário" maxlength="50" minlength="10" required>
										</td>
										<td></td>
										<td>
											<select name="perfil" class="form-control">
												<option value="">Selecione...</option>
												<option value="admin">Administrador</option>
												<option value="user">Usuario Comum</option>
											</select>
										</td>
									</tr>
								</table>
							</div>
							<center>
								<table>	
									<tr>
										<td>
											<button id="btnSalvar" type="submit"><span>Salvar</span></button>
										</td>
										<td>
											<button id="btnResetar" type="reset"><span>Limpar</span></button> 
										</td>												
									</tr>
								</table>
							</center>	
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>