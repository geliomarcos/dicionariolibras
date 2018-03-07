<div class="col-md-12" style="color: #000;margin-top: 20px;">
	<center><h3><i class='fa fa-pencil fa-lg' style='padding: 5px;'></i>Editar Registro de Usuário</h3></center>
</div>
<div class="col-md-2"></div>
<div class="col-md-8">
	<form class="form-horizontal" method="POST">
		<fieldset>			
			<br>
			<div class="form-group">
				<label class="col-md-3 control-label">Nome</label>  
				<div class="col-md-8"><input id="nome" name="nome" type="text" placeholder="Nome do Usuário" class="form-control input-md" value="<?php echo $this->request->data['Usuario']['nome']; ?>" required autofocus></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Perfil</label>
				<div class="col-md-3">
			    	<select id="perfil" name="perfil" class="form-control" requered>
			      		<option value="0">Selecione ...</option>
			      		<option value="admin" <?php echo ($this->request->data['Usuario']['perfil']=='admin') ? ' selected' : ''; ?>>Administrador</option>
			      		<option value="user" <?php echo ($this->request->data['Usuario']['perfil']=='user') ? ' selected' : ''; ?>>Usuário Comum</option>
			    	</select>
			  	</div>
				<label class="col-md-2 control-label">Login</label>  
				<div class="col-md-3"><input id="username" name="username" type="text" placeholder="Login do Usuário" class="form-control input-md" value="<?php echo $this->request->data['Usuario']['username']; ?>" required></div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Email</label>  
				<div class="col-md-8"><input id="email" name="email" type="text" placeholder="E-mail do Usuário" value="<?php echo $this->request->data['Usuario']['email']; ?>" class="form-control input-md" required></div>
			</div>
			<div class="form-group" hidden> 
				<div class="col-md-8"><input id="id" name="id" type="text" value="<?php echo $this->request->data['Usuario']['id']; ?>" class="form-control input-md" required></div>
			</div>
			<center>
				<div class="form-group">
					<div class="col-md-3"></div>
					<div class="col-md-4">
						<button id="btnSalvar" type="submit"><span>Salvar</span></button>
						<button id="btnResetar" type="reset"><span>Limpar</span></button> 
			  		</div>
				</div>
			</center>
		</fieldset>
	</form>
</div>
<div class="col-md-2"></div>