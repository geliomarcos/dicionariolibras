<script type="text/javascript">
	$(function(){
		$('.table-data').DataTable({
			"language": {
				"url": "/files/Portuguese.json"
			},
			"order": [[ 2, "asc" ]]
		});
	});
</script>
<style type="text/css">
	table {
		border-collapse: collapse;
	}

	table, th, td {

	}
</style>
<?php  
	echo $this->element('bar/bar-top', array('title' => 'Usuários'));
?>
<a style="float:right;margin-right:50px;margin-top:-60px;" href=<?php echo Router::url('/usuarios/novo')?>><button id="btnSalvar"><span>Cadastrar</span></button></a>
<?php
	echo $this->Session->flash(); 
	if ($usuarios != null) {
?> 
		<!-- upper section -->
		<div class="row" 
			 style="margin-left: 15px; 
			 		margin-right: 15px;">
			<div class="col-md-12">      
				<div class="row">	
					<table cellpadding="0" 
						   cellspacing="0" 
						   class="table table-hover table-data">
						<thead>
							<tr>
								<th width="5%">
									<?php 
										echo $this->Paginator->sort('id', 'Código'); 
									?>
								</th>
								<th width="25%">
									<?php 
										echo $this->Paginator->sort('nome', 'Nome'); 
									?>
								</th>
								<th width="20%">
									<?php 
										echo $this->Paginator->sort('email', 'Email'); 
									?>
								</th>
								<th width="15%">
									<?php 
										echo $this->Paginator->sort('username', 'Login'); 
									?>
								</th>
								<th width="7%">
									<?php 
										echo $this->Paginator->sort('perfil', 'Perfil'); 
									?>
								</th>
								<th width="5%">
									<?php 
										echo $this->Paginator->sort('status', 'Status'); 
									?>
								</th>
								<th width="10%" 
									class="actions">
									<center>
										<?php 
											echo __('Ações'); 
										?>
									</center>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($usuarios as $usuario): 
								?>
							<tr>
								<td>
									<center>
										<?php 
											echo h($usuario['Usuario']['id']); 
										?>
									</center>
								</td>
								<td>
									<?php 
										echo h($usuario['Usuario']['nome']); 
									?>
								</td>
								<td>
									<?php 
										echo h($usuario['Usuario']['email']); 
									?>
								</td>
								<td>
									<?php 
										echo h($usuario['Usuario']['username']); 
									?>
								</td>
								<td>
									<?php 
										if ($usuario['Usuario']['perfil'] == "admin") {
											echo h("Administrador"); 
										} else if ($usuario['Usuario']['perfil'] == "user") {
											echo h("Coordenador");
										} 
									?>
								</td>
								<td>
									<?php 
										if ($usuario['Usuario']['status'] == 0) {
											echo "Desativado";
										} else if ($usuario['Usuario']['status'] == 1) {
											echo "Ativado";
										}
									?>
								</td>
								<td class="actions">	
									<center>									
										<?php 
											//Se o status do usuário for 0, ele esta desativado.
											//Então irá habilitar um icone para reativar o usuário.
											if ($usuario['Usuario']['status'] == 0) {			
												echo $this->Form->postLink('<i class="fa fa-lock fa-lg" style="color: #000;" title="Reativar Usuário"></i>', array('action' => 'reativar', $usuario['Usuario']['id']), array('escape' => false, 'confirm' => 'Você tem certeza que deseja reativar este usuário?'),null, $usuario['Usuario']['id']);
											//Se o status do usuário for 1, ele esta ativado.
											//Então irá habilitar um icone para desativar o usuário.
											} else if ($usuario['Usuario']['status'] == 1) {	
												echo "<span style='margin-left:5px;'></span>";
												echo $this->Form->postLink('<i class="fa fa-unlock fa-lg" style="color: #000;" title="Desativar Usuário"></i>', array('action' => 'desativar', $usuario['Usuario']['id']), array('escape' => false, 'confirm' => 'Você tem certeza que deseja desativar este usuário?'),null, $usuario['Usuario']['id']);
											}
											echo "<span style='margin-left:5px;'></span>";
											echo $this->Html->link('<i class="fa fa-search fa-lg" style="color: #000;" title="visualizar Usuário"></i>', array('action' => 'visualizar', $usuario['Usuario']['id']), array('escape' => false));
											echo "<span style='margin-left:5px;'></span>";
											echo $this->Html->link('<i class="fa fa-pencil fa-lg" style="color: #000;" title="Editar Usuário"></i>', array('action' => 'editar', $usuario['Usuario']['id']), array('escape' => false));
											echo "<span style='margin-left:5px;'></span>";												
											if ($usuario['Usuario']['status'] == 1) {	
												echo $this->Html->link('<i class="fa fa-key fa-lg" style="color: #000;" title="Resetar Senha"></i>', array('action' => 'resetar_senha', $usuario['Usuario']['id']), array('escape' => false));
											}
										?>
									</center>
								</td>
							</tr>
							<?php 
								endforeach; 
							?>
						</tbody>
					</table> 
				</div><!--/row-->
			</div><!--/col-span-9-->
		</div><!--/row-->
<?php
	}
?>