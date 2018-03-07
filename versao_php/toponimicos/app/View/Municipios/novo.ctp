<style type="text/css">
	table {
		border-collapse: collapse;
	}
	table, th, td {}
</style>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<div class="row" style="margin-left:10px; margin-right: 10px;">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-header"><div class="table-responsive"><center><h2>Cadastro de Municipio</h2></center></div></div>					
			<div class="panel-body">
				<div class="table-responsive">					
					<div style="margin-left:20%;margin-right:20%;width:60%;">
						<form action="" method="POST" class="form center-block horizontal">
							<div class="row">
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="79%"><label for="municipio_nome_label">Nome</label></td>
										<td width="1%"></td>
										<td width="30%"><label for="municipio_uf_label">UF</label></td>										
									</tr>
									<tr>
										<td>
											<input type="text" id="nome" name="nome" class="form-control">
										</td>
										<td></td>
										<td>
											<input type="text" id="uf" name="uf" class="form-control">
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="79%"><label for="municipio_area_territorial_label">Area Territorial</label></td>
										<td width="1%"></td>
										<td width="30%"><label for="municipio_populacao_label">População</label></td>										
									</tr>
									<tr>
										<td>
											<input type="number" id="area_territorial" name="area_territorial" class="form-control">
										</td>
										<td></td>
										<td>
											<input type="number" id="populacao" name="populacao" class="form-control">
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_localizacao_label">Localização</label></td>
									</tr>
									<tr>
										<td>
											<input type="text" id="localizacao" name="localizacao" class="form-control">
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