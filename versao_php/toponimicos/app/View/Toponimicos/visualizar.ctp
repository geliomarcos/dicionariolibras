<div class="col-md-12">
	<div class="col-md-2"></div>
	<div class="col-md-8" style="text-align:justify;">
		<h2><?php echo __('Detalhes do Registro'); ?></h2>
		<strong><?php echo __('Codigo:'); ?></strong>
		<?php echo h($tipo['Toponimico']['id']); ?>
		<br><br>
		<strong><?php echo __('Municipio:'); ?></strong>
		<?php echo h($tipo['Municipio']['nome']); ?>		
		<br><br>
		<strong><?php echo __('Topononimo:'); ?></strong>
		<?php echo h($tipo['Toponimico']['topononimo']); ?>
		<br>
		<strong><?php echo __('Topononimo em Escrita em Sinais:'); ?></strong>
		<?php echo h($tipo['Toponimico']['topononimo_escrita_sinais']); ?>
		<br>
		<strong><?php echo __('Etimologia:'); ?></strong>
		<?php echo h($tipo['Toponimico']['etimologia']); ?>
		<br>
		<strong><?php echo __('Taxionomia:'); ?></strong>
		<?php echo h($tipo['Toponimico']['taxionomia']); ?>
		<br>
		<strong><?php echo __('Entrada Lexical:'); ?></strong>
		<?php echo h($tipo['Toponimico']['entrada_lexical']); ?>
		<br>
		<strong><?php echo __('Estrutura Morfologica:'); ?></strong>
		<?php echo h($tipo['Toponimico']['estrutura_morfologica']); ?>
		<br>
		<strong><?php echo __('Histórico:'); ?></strong>
		<?php echo h($tipo['Toponimico']['historico']); ?>
		<br>
		<strong><?php echo __('Informação:'); ?></strong>
		<?php echo h($tipo['Toponimico']['informacao']); ?>
		<br>
		<strong><?php echo __('MOtivação em Libras:'); ?></strong>
		<?php echo h($tipo['Toponimico']['motivacao_libras']); ?>
		<br>
		<strong><?php echo __('Taxionomia em Libras:'); ?></strong>
		<?php echo h($tipo['Toponimico']['taxionomia_libras']); ?>
		<br>
		<strong><?php echo __('Fontes de Informações em Libras:'); ?></strong>
		<?php echo h($tipo['Toponimico']['fontes_informacao_libras']); ?>
		<br>
		<strong><?php echo __('Pesquisadora:'); ?></strong>
		<?php echo h($tipo['Toponimico']['pesquisadora']); ?>
		<br>
		<strong><?php echo __('Revisora:'); ?></strong>
		<?php echo h($tipo['Toponimico']['revisora']); ?>
		<br>
		<strong><?php echo __('Fontes:'); ?></strong>
		<?php echo h($tipo['Toponimico']['fontes']); ?>
		<br>
		<strong><?php echo __('Data da Coleta:'); ?></strong>
		<?php echo h($tipo['Toponimico']['data_coleta']); ?>
		<br><br>
		<?php if ($uploads1 != null) { ?>
			<h4><strong><?php echo __('Imagem'); ?></strong></h4>
			<?php $caminho1 = '\toponimicos\files\imagens\\'.$uploads1['uploads']['nome_arquivo']; ?>
			<img src="<?php echo $caminho1; ?>"/>
			<br><br><br>
		<?php } ?>
		<?php if ($uploads2 != null) { ?>
			<h4><strong><?php echo __('Video'); ?></strong></h4>
			<?php $caminho2 = '\toponimicos\files\videos\\'.$uploads2['uploads']['nome_arquivo']; ?>
			<video controls>
				<source src="<?php echo $caminho2; ?>" type="<?php echo $uploads2['uploads']['tipo']; ?>">
			</video>
			<br><br><br>
		<?php } ?>
		<strong><?php echo __('Data da Criação:'); ?></strong>
		<?php echo h($tipo['Toponimico']['created']); ?>
		<br>
		<strong><?php echo __('Criado por:'); ?></strong>
		<?php echo h($tipo['Toponimico']['criado_usuario']); ?>
		<br><br>
		<strong><?php echo __('Data da Modificação:'); ?></strong>
		<?php echo h($tipo['Toponimico']['modified']); ?>
		<br>
		<strong><?php echo __('Modificado por:'); ?></strong>
		<?php echo h($tipo['Toponimico']['modificado_usuario']); ?>
		<br><br><br><br><br><br>
	</div>
	<div class="col-md-2">
		<a style="float:left;margin-left:-150px;margin-top:20px;" href=<?php echo Router::url('/toponimicos/relatorios/'.$tipo['Toponimico']['id'])?>><button id="btnSalvar"><span>Imprimir</span></button></a>
	</div>
</div>