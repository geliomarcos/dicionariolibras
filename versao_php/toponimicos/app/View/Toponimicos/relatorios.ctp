<style>tr{margin-top:40px !important;}td{margin-left:25px !important;}</style>
<table style="width:100%;margin-bottom:10px !important;">
    <tr>
        <td><center>Projeto Atlas Toponímico da Amazônia Ocidental Brasileira (ATAOB)</center></td>
    </tr>
    <tr>
        <td><center>Ficha lexicográfico-toponímica</center></td>
    </tr>
</table>
<table style="width:100%; border:1px solid #000;">
    <tr>
        <td colspan=2><b>Município: </b><?php echo $tipo['Municipio']['nome']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Localização: </b><?php echo $tipo['Municipio']['localizacao']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Topônonimo: </b><?php echo $tipo['Toponimico']['topononimo']; ?></td>
    </tr>
    <tr>
        <td><b>UF: </b><?php echo $tipo['Municipio']['uf']; ?></td>
        <td><b>Taxionomia: </b><?php echo $tipo['Toponimico']['taxionomia']; ?></td>
    </tr>
    <tr>
        <td colspan=2 style="text-align:justify;"><b>Etimologia: </b><?php echo $tipo['Toponimico']['etimologia']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Entrada Lexical: </b><?php echo $tipo['Toponimico']['entrada_lexical']; ?></td>
    </tr>
    <tr>
        <td colspan=2 style="text-align:justify;"><b>Estrutura Morfológica: </b><?php echo $tipo['Toponimico']['estrutura_morfologica']; ?></td>
    </tr>
    <tr>
        <td colspan=2 style="text-align:justify;"><b>Histórico: </b><?php echo $tipo['Toponimico']['historico']; ?></td>
    </tr>
    <tr>
        <td colspan=2 style="text-align:justify;"><b>Informação enciclopédica: </b><?php echo $tipo['Toponimico']['informacao']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Taxionomia em Libras: </b><?php echo $tipo['Toponimico']['taxionomia_libras']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Topônimo em Escrita de Sinais: </b><?php echo $tipo['Toponimico']['topononimo_escrita_sinais']; ?></td>
    </tr>    
    <?php if ($uploads2 != null) { ?>
        <tr>
            <td colspan=2><b>Vídeo em Libras: </b><?php echo "Acesse <a href='localhost/toponimicos/files/videos/".$uploads2['uploads']['nome_arquivo']."'>localhost/toponimicos/files/videos/".$uploads2['uploads']['nome_arquivo']."</a>"; ?></td>
        </tr>
    <?php } ?>
    
    <tr>
        <td colspan=2><b>Motivação em Libras: </b><?php echo $tipo['Toponimico']['motivacao_libras']; ?></td>
    </tr>
    <tr>
        <td colspan=2 style="text-align:justify;"><b>Fonte: </b><?php echo $tipo['Toponimico']['fontes']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Fonte de Informações em Libras: </b><?php echo $tipo['Toponimico']['fontes_informacao_libras']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Pesquisadora: </b><?php echo $tipo['Toponimico']['pesquisadora']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Revisor/Coordenador do Projeto: </b><?php echo $tipo['Toponimico']['revisora']; ?></td>
    </tr>
    <tr>
        <td colspan=2><b>Data: </b><?php echo $tipo['Toponimico']['data_coleta']; ?></td>
    </tr>
</table>
<table style="width:100%;border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #FFF;">
    <?php if ($uploads1 != null) { ?>
        <tr>
            <td><br><b>Imagem: </b><?php echo $uploads1['uploads']['nome_arquivo'] ?></b></td>
        </tr>
        <tr>
            <td>
                <br>
                <?php $caminho1 = WWW_ROOT . 'files\imagens\\'.$uploads1['uploads']['nome_arquivo']; ?>
                <center><img src="<?php echo $caminho1; ?>" style="width:600px;"/></center>
                <br>
            </td>
        </tr>
    <?php } ?>
</table>