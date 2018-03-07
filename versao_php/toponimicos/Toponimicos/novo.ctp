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
			<div class="panel-header"><div class="table-responsive"><center><h2>Cadastro de Toponimicos</h2></center></div></div>					
			<div class="panel-body">
				<div class="table-responsive">					
					<div style="margin-left:20%;margin-right:20%;width:60%;">
						<form action="" method="POST" class="form center-block horizontal">
							<div class="row">
								<table style="margin-bottom:0px;border-bottom: 0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_municipio_label">Municipio</label></td>
									</tr>
									<tr>
										<td>
										<select name="municipios_id" class="form-control">
												<option value="">Selecione...</option>
												<?php foreach ($municipios as $m) : ?>
													<option value="<?php echo $m['Municipio']['id']; ?>"><?php echo $m['Municipio']['nome']; ?></option>
												<?php endforeach; ?>
											</select>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_etimologia_label">Etimologia</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="etimologia" name="etimologia" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_taxionomia_label">Taxionomia</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="taxionomia" name="taxionomia" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_entrada_lexical_label">Entrada Lexical</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="entrada_lexical" name="entrada_lexical" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_estrutura_morfologica_label">Estrutura Morfologica</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="estrutura_morfologica" name="estrutura_morfologica" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_historico_label">Histórico</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="historico" name="historico" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_informacao_label">Informação</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="informacao" name="informacao" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_pesquisadora_label">Pesquisador(a)</label></td>
									</tr>
									<tr>
										<td>
											<input type="text" id="pesquisadora" name="pesquisadora" class="form-control">
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_revisora_label">Revisor(a)</label></td>
									</tr>
									<tr>
										<td>
											<input type="text" id="revisora" name="revisora" class="form-control">
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_fontes_label">Fontes</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="fontes" name="fontes" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="Toponimico_data_coleta_label">Data da Coleta</label></td>
									</tr>
									<tr>
										<td>
											<input type="text" id="data_coleta" name="data_coleta" class="form-control">
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