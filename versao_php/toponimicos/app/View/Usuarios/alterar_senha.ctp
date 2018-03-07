		<div class="row" 
			 style="margin-left: 20px; 
			 		margin-right: 10px;
			 		margin-top: 3%;">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-header">
						<form action="" 
							  method="POST" 
							  class="form center-block horizontal">
							<div class="table-responsive">
								<center>
									<h2 style="margin-top: 30px;
											   margin-bottom: 10px;">
										<label for="usuario_alterar_senha_label">
											Alterar senha
										</label>	
									</h2>
								</center>
								<br>
								<div style="margin-left: 10%;
										    margin-rigth: 10%;
										    width: 80%;">
									<?php 
										echo $this->Session->flash(); 
									?>
								</div>
								<label for="usuario_senha_atual_label"
							  		   style="margin-left: 10%;">
									Senha Atual
								</label>
								<br/>
							  	<input type="password" 
							  		   class="form-control" 
							  		   name="senha_atual" 
							  		   maxlength="20"
							  		   minlength="8"
							  		   style="margin-left: 10%;
										      margin-rigth: 10%;
										      width: 80%;">
								<br/>
								<label for="usuario_senha_atual_label"
							  		   style="margin-left: 10%;">
									Nova Senha
								</label>
								<br/>
							  	<input type="password" 
							  		   class="form-control" 
							  		   name="nova_senha"  
							  		   maxlength="20"
							  		   minlength="8"
							  		   style="margin-left: 10%;
										      margin-rigth: 10%;
										      width: 80%;">
								<br/>
								<label for="usuario_senha_atual_label"
							  		   style="margin-left: 10%;">
									Confirme sua nova senha
								</label>
								<br/>
							  	<input type="password" 
							  		   class="form-control" 
							  		   name="confirmar_nova_senha"  
							  		   maxlength="20"
							  		   minlength="8"
							  		   style="margin-left: 10%;
										      margin-rigth: 10%;
										      width: 80%;">
								<br/>
							</div>
							<center>
								<table>	
									<tr>
										<td>
											<button id="btnSalvar"
													type="submit">
												<span>
													Salvar
												</span>
											</button>
										</td>
										<td>
											<button id="btnResetar"
													type="reset">
												<span>
													Limpar
												</span>
											</button> 
										</td>												
									</tr>
								</table>
							</center>	
						</form>
					</div>					
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>