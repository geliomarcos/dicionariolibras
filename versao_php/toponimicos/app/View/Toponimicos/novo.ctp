<style type="text/css">
	table {
		border-collapse: collapse;
	}
	table, th, td {}
</style>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script><?php
	echo $this->Form->create('File', array('type' => 'file', 'class' => 'col-md-12'));
?>
<div class="row" style="margin-left:10px; margin-right: 10px;">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-header"><div class="table-responsive"><center><h2>Cadastro de Toponomicos</h2></center></div></div>					
			<div class="panel-body">
				<div class="table-responsive">					
					<div style="margin-left:20%;margin-right:20%;width:60%;">
						<form action="" method="POST" class="form center-block horizontal">
							<div class="row">
								<table style="margin-bottom:0px;border-bottom: 0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_municipio_label">Municipio</label></td>
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
										<td width="100%"><label for="toponomico_topononimo_label">Topononimo</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="topononimo" name="topononimo" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_topononimo_escrita_sinais_label">Topônimo em Escrita de Sinais</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="topononimo_escrita_sinais" name="topononimo_escrita_sinais" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_topononimo_label">Etimologia</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="etimologia" name="etimologia" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_taxionomia_label">Taxionomia</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="taxionomia" name="taxionomia" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_taxionomia_libras_label">Taxionomia em Libras</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="taxionomia_libras" name="taxionomia_libras" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_entrada_lexical_label">Entrada Lexical</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="entrada_lexical" name="entrada_lexical" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_estrutura_morfologica_label">Estrutura Morfologica</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="estrutura_morfologica" name="estrutura_morfologica" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_historico_label">Histórico</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="historico" name="historico" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_informacao_label">Informação</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="informacao" name="informacao" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_motivacao_libras_label">Motivação em Libras</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="motivacao_libras" name="motivacao_libras" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_fontes_informacao_libras_label">Fonte de Informações em Libras</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="fontes_informacao_libras" name="fontes_informacao_libras" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_fontes_label">Fontes</label></td>
									</tr>
									<tr>
										<td>
											<textarea type="text" id="fontes" name="fontes" class="form-control"></textarea>
										</td>
									</tr>
								</table>
								
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_pesquisadora_label">Pesquisador(a)</label></td>
									</tr>
									<tr>
										<td>
											<input type="text" id="pesquisadora" name="pesquisadora" class="form-control">
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_revisora_label">Revisor(a)</label></td>
									</tr>
									<tr>
										<td>
											<input type="text" id="revisora" name="revisora" class="form-control">
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_data_coleta_label">Data da Coleta</label></td>
									</tr>
									<tr>
										<td>
											<input type="text" id="data_coleta" name="data_coleta" class="form-control">
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_imagem_label">Imagem (png/jpg/jpeg)</label></td>
									</tr>
									<tr>
										<td> 
											<?php echo $this->Form->file('arquivo.', array('label' => false)); ?>
										</td>
									</tr>
								</table>
								<table style="margin-top:15px;margin-bottom:0px;border-bottom:0;width:100%">
									<tr>
										<td width="100%"><label for="toponomico_video_label">Video (mp4)</label></td>
									</tr>
									<tr>
										<td> 
											<?php echo $this->Form->file('arquivo2.', array('label' => false)); ?>
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