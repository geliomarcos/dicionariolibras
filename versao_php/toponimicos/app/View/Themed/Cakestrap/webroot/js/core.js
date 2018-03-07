$(function () {
    // INICIALIZA AS ABAS - JQueryUI
    $("#tabs").tabs();

    $(".input-tag").tagit({
        allowDuplicates: false,
        allowSpaces: false
    });

    $.ajaxSetup({
        beforeSend: function (xhr, status) {
            mostraCarregamento();
        },
        complete: function () {
            setTimeout(function () {
                fechaCarregamento();
            }, 500);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            fechaCarregamento();
        },
        success: function () {
            setTimeout(function () {
                fechaCarregamento();
            }, 500);
        },
        cache: false
    });

    /*
     $(".valor").blur(function(){
     $(this).parseNumber({format:"#.###.00", locale:"us"});
     $(this).formatNumber({format:"#.###.00", locale:"us"});
     });
     */

    $('.valor').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.',
        centsLimit: 2
    });

    $('.unidade').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.',
        centsLimit: 3
    });

    $('.table').on('focus', '.unidade', function () {
        initPrice();
    });

    //MASCARAS
    $('.date').mask('99/99/9999');
    $('.telefone').mask('(99) 9999-9999');
    $('.cpf').mask('999.999.999-99');
    $('.cep').mask('99999-999');

    //PERMITE SOMENTE A INSERÇÃO DE NÚMEROS DECIMAIS NO CAMPO
    $('.table').on('keyup', '.decimal', function (event) {
        //this.value = this.value.replace(/[^0-9\.]/g,'');
        $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57) && (event.which != 0)) {
            event.preventDefault();
            $(this).attr('placeholder', 'Somente números!');
        }
    });

    // CALENDÁRIO
    $(".date").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });

    // MENU ACCORDION
    $("#content").on('click', 'h2.accordion', function () {
        $(this).parent().find('div.accordion').slideToggle("slow");
    });

    // TABELA ROVÁVEL
    $('.scrollable-table').scrollTableBody();

    // MODAL DE MATERIAIS
    $("#modal-materiais").dialog({
        modal: true,
        width: '80%',
        height: 550,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                getMateriaisSelecionados();
                $(this).dialog("close");
            }
        }
    });

    //Paginação ajax
    $('.modal').on('click', '.paging a', function () {
        var url = $(this).attr('href');
        $('.modal').load(url);
        return false;
    });

    //Adiciona o material na lista
    $('#content').on('click', '#btn-add-materiais', function () {
        $('#modal-materiais').dialog('open');
        $('#modal-materiais').load(getUrl('/materiais/pesquisar'));
    });

    //Pesquisa o material na lista
    $('.modal').on('click', '#btProcurarMaterial', function () {
        params = $(this).closest('form').serializeArray();
        url = $(this).closest('form').attr('action');

        $.post(url, params).success(function (response) {
            $('#content-modal').html(response);
        });

        return false;
    });

    // ------------ TELA DE COTAÇÃO ------------
    // Modal de fornecedores
    $("#modal-fornecedores").dialog({
        modal: true,
        width: '90%',
        height: 550,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                getFornecedoresSelecionados();
                $(this).dialog("close");
            }
        }
    });

    //Adiciona o fornecedor na lista
    $('#content').on('click', '#btn-add-fornecedores', function () {
        $('#modal-fornecedores').dialog('open');
        $('#modal-fornecedores').load(getUrl('/fornecedores/pesquisar'));
    });

    //Pesquisa o fornecedor
    $('.modal').on('click', '#btProcurarFornecedor', function () {
        params = $(this).closest('form').serializeArray();
        url = $(this).closest('form').attr('action');

        $.post(url, params).success(function (response) {
            $('#content-modal').html(response);
        });
        
        return false;
    });

    //Salvar cotação
    $('#btn-salvar-cotacao').click(function () {
        qtd = $('#tabela-fornecedor tbody tr').length;
        hasErrors = false;

        if (qtd < 3) {
            alert('A cotação deve possuir no mínimo 3 fornecedores.');
            hasErrors = true;
        }

        return (hasErrors) ? false : true;
    });
    // ------------ FIM TELA DE COTAÇÃO ------------

    // MODAL DE SOLICITAÇÕES DE COMPRAS
    $("#modal-solicitacoes").dialog({
        modal: true,
        width: '90%',
        height: 550,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                selecionaSolicitacao();
                $(this).dialog("close");
            }
        }
    });

    $('#content').on('click', '#btAbrirSolicitacoes', function () {
        $('#modal-solicitacoes').dialog('open');
        $('#modal-solicitacoes').load(getUrl('/solicitacoes/pesquisar'));
    });

    $('#modal-solicitacoes').on('click', '#btProcurarSolicitacao', function () {
        params = $(this).closest('form').serializeArray();
        url = $(this).closest('form').attr('action');

        $.post(url, params).success(function (response) {
            $('#content-modal').html(response);
        });

        return false;
    });

    //Verifica se a lista de materiais não esta vazia durante a ação de salvar solicitação
    $('#btn-salvar-solicitacao').click(function () {
        element = '#tabela-solicitacao-material';


        if (!hasItens(element)) {
            alert('Você deve adicionar pelos menos um material na lista.');
            return false;
        }
    });

    //Número do pedido informado manualmente
    $('#cod_pedido').focusout(function () {

        _valor = $(this).val().trim(); //Número do pedido
        if (_valor != '') {
            //Busca o pedido pelo número informado
            $.getJSON(getUrl('/solicitacoes/buscarNumero/' + _valor), function (response) {
                try {
                    //Carrega as informações do pedido
                    $('#solicitacao-info').load(getUrl('/solicitacoes/info/' + _valor));

                    //Verifica se o pedido existe
                    if (response.length != 0) {
                        //Código do pedido
                        $('#solicitacao_id').val(response.Solicitacao.id);
                        //Número do pedido
                        $('#cod_pedido').val(response.Solicitacao.n_solicitacao);
                    } else {
                        //Limpa os campos
                        $('#solicitacao_id').val('');
                        $('#cod_pedido').val('');
                        $('#cod_pedido').focus();
                    }
                } catch (e) {
                    $(this).focus();
                }
            });
        }
    });

    // JANELA MODAL PARA CONFIGURAÇÃO DE EXPORTAÇÃO DE DADOS
    $('#modal-cotacao-exportacao').dialog({
        modal: true,
        width: 400,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog('close');
            },
            Exportar: function () {
                if (gerarMapaCotacao())
                    $(this).dialog('close'); //FECHA O MODAL SE OS PARAMETROS ESTIVEREM CORRETOS
            }

        }
    });

    //EVENTO OCORRE QUANDO O BOTÃO PARA GERAR O MAPA DE COTAÇÃO É CLICADO
    $('#mapa-cotacao').click(function () {
        $('#modal-cotacao-exportacao').load(getUrl('/cotacoes/configExportacao'));
        $('#modal-cotacao-exportacao').dialog('open');
        return false;
    });

    // MODAL PARA EXPORTAÇÃO DE SOLICITAÇÃO DE ORÇAMENTOS
    $("#modal-orcamentos").dialog({
        modal: true,
        width: '90%',
        height: 550,
        autoOpen: false,
        buttons: {
            Fechar: function () {
                $(this).dialog("close");
            }
        }
    });

    $('#btn-orcamento').click(function () {
        url = $(this).attr('href');
        $('#modal-orcamentos').load(url);
        $('#modal-orcamentos').dialog('open');
        return false;
    });


    // -------- TELA DE PROCESSOS --------
    //Carrega os itens do processo para alteração
    $("#modal-item-processo").dialog({
        modal: true,
        width: '90%',
        height: 550,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                selecionaItemProcesso();
                $(this).dialog("close");
            }
        }
    });

    // Modal de fornecedores
    $("#modal-cotacoes").dialog({
        modal: true,
        width: '90%',
        height: 550,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                selecionaCotacao();
                $(this).dialog("close");
            }
        }
    });

    $('#content').on('click', '#btAbrirCotacoes', function () {
        $('#modal-cotacoes').dialog('open');
        $('#modal-cotacoes').load(getUrl('/cotacoes/pesquisar'));
    });

    //Número da cotação informado manualmente
    $('#cod-cotacao').focusout(function () {
        _valor = $(this).val().trim(); //Número da cotacao

        if (_valor != '') {
            //Busca o pedido pelo número informado
            $.getJSON(getUrl('/cotacoes/buscarNumero/' + _valor), function (response) {
                try {
                    //Carrega as informações do pedido
                    $('#cotacao-info').load(getUrl('/cotacoes/info/' + _valor));
                    //Limpa os itens da tabela de processos para adicionar outros itens
                    limpaItensProcesso();

                    //Verifica se o pedido existe
                    if (response.length != 0) {
                        //Busca os menores itens da cotação
                        buscarItensProcesso(response.Cotacao.id);
                        //Código do pedido
                        $('#id-cotacao').val(response.Cotacao.id);
                        //Número do pedido
                        $('#cod-cotacao').val(response.Cotacao.n_cotacao);
                    } else {
                        //Limpa os campos
                        $('#id-cotacao').val('');
                        $('#cod-cotacao').val('');
                        $('#cod-cotacao').focus();
                    }
                } catch (e) {
                    $(this).focus();
                }
            });
        }
    });
    //Marca o item selecionado
    $('.table').on('click', '.item-processo', function () {
        $(this).addClass('item-selecionado').siblings().removeClass('item-selecionado');
        $('.icone-item').attr('src', '../../img/ic_edit.png').addClass('active-item').removeClass('disabled');
    });

    //Item para alteração
    $('.grid').on('click', '.active-item', function () {
        material_id = $('.item-selecionado').find('#material-id').val();
        cotacao_id = $('.item-selecionado').find('#cotacao-id').val();
        $('#modal-item-processo').load(getUrl('/processos/listar_itens/' + cotacao_id + '/' + material_id));
        $('#modal-item-processo').dialog('open');
    });
    // -------- FIM TELA DE PROCESSOS --------

    // -------- EMPRESAS --------
    //Modal para carregamento das empresas cadastradas
    $("#modal-empresas").dialog({
        modal: true,
        width: '90%',
        height: 550,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                selecionaEmpresa();
                $(this).dialog("close");
            }
        }
    });

    //Seleciona uma empresa da lista
    $('#btAbrirEmpresas').click(function () {
        $("#modal-empresas").load(getUrl('/empresas/pesquisar'));
        $("#modal-empresas").dialog('open');
    });

    //Número da empresa manualmente
    $('#empresa-id').focusout(function () {
        _valor = $(this).val().trim(); //Número da empresa
        if (_valor != '') {
            //Busca o pedido pelo número informado
            $.getJSON(getUrl('/empresas/buscarNumero/' + _valor), function (response) {
                try {
                    //Verifica se o pedido existe
                    if (response.length != 0) {
                        //Código da empresa
                        $('#empresa-id').val(response.Empresa.id);
                        //Número do pedido
                        $('#empresa-nome').val(response.Empresa.razao_social);
                    } else {
                        //Limpa os campos
                        $('#empresa-id').val('');
                        $('#empresa-nome').val('');
                        alert('Centro de Custo não encontrado!');
                        $('#empresa-id').focus();
                    }
                } catch (e) {
                    $(this).focus();
                }
            });
        }
    });
    // -------- FIM EMPRESAS --------

    // -------- EMPENHOS --------
    //Modal para carregamento dos processos cadastrados
    $("#modal-processos").dialog({
        modal: true,
        width: '90%',
        height: 550,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                selecionaProcesso();
                $(this).dialog("close");
            }
        }
    });

    $("#modal-contas-bancarias").dialog({
        modal: true,
        width: '50%',
        height: 500,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                selecionaContaBancaria();
                $(this).dialog("close");
            }
        }
    });
    //Mostra as informações dos itens do fornecedor
    $("#modal-info-itens").dialog({
        modal: true,
        width: '90%',
        height: 550,
        autoOpen: false,
        buttons: {
            Fechar: function () {
                $(this).dialog("close");
            }
        }
    });

    //Seleciona uma empresa da lista
    $('#btAbrirProcessos').click(function () {
        $("#modal-processos").load(getUrl('/processos/pesquisar'));
        $("#modal-processos").dialog('open');
    });

    //Número da empresa manualmente
    $('#cod-processo').focusout(function () {
        _valor = $(this).val().trim(); //Número do processo
        _valor = _valor.replace('/', '-');
        if (_valor != '') {
            //Busca o pedido pelo número informado
            $.getJSON(getUrl('/processos/buscarNumero/' + _valor), function (response) {
                try {
                    //Verifica se o processo existe
                    if (response.length != 0) {
                        //Código do processo
                        $('#id-processo').val(response.Processo.id);
                        //Número do processo
                        $(this).val(response.Processo.n_processo);
                        buscarFornecedoresEmpenho(response.Processo.id);
                    } else {
                        //Limpa os campos
                        $('#id-processo').val('');
                        $('#cod-processo').val('');
                        alert('Processo de aquisição não encontrado!');
                        $(this).focus();
                    }
                } catch (e) {
                    $('#id-processo').val('');
                    $('#cod-processo').val('');
                    $(this).focus();
                }
            });
        }
    });
    // -------- FIM EMPENHOS --------

    // -------- UNIDADE DE MEDIDAS --------
    //Modal para carregamento dos processos cadastrados
    $("#modal-unidades").dialog({
        modal: true,
        width: '50%',
        height: 500,
        autoOpen: false,
        buttons: {
            Cancelar: function () {
                $(this).dialog("close");
            },
            Selecionar: function () {
                selecionaUnidade();
                $(this).dialog("close");
            }
        }
    });

    //Seleciona uma empresa da lista
    $('#btn-add-unidades').click(function () {
        $("#modal-unidades").load(getUrl('/unidade_medidas/pesquisar'));
        $("#modal-unidades").dialog('open');
    });
    // -------- FIM UNIDADE MEDIDAS --------

    // FILTRA CONTEÚDO DA TABELA
    $("#filtrarPor").on('keyup', function () {
        var value = $(this).val();
        filtrarTabela('#tabela-permissao', value);
    });

    $("#filtrar-marcas").on('keyup', function () {
        var value = $(this).val();
        filtrarTabela('#tabela-marcas', value);
    });

    $('#add-detalhes').bind('click', function () {
        addTableDetalhes();
    });

    /* MENU EM ÁRVORE */
    $('.tree li').each(function () {
        if ($(this).children('ul').length > 0) {
            $(this).addClass('parent');
        }
    });

    $('.tree li.parent > a').click(function () {
        $(this).parent().toggleClass('active');
        $(this).parent().children('ul').toggle();
    });
    //FIM COTAÇÃO
});

//Mostra a tela de carregamento
function mostraCarregamento() {
    $('#modal-mascara').show();
    $('#modal-carregando').show();
}

//Fecha a tela de carregamento
function fechaCarregamento() {
    $('#modal-mascara').hide();
    $('#modal-carregando').hide();
}

/**
 * Filtra o conteúdo da tabela
 * @params busca string - Termo a ser buscado
 * @return void
 * @author Ricardo Farias    
 */
function filtrarTabela(id_elemento, busca) {
    if (busca.length < 1) {
        $(id_elemento + " tr").css("display", "");
    } else {
        $(id_elemento + " tbody tr:not(:contains('" + busca + "'))").css("display", "none");
        $(id_elemento + " tbody tr:contains('" + busca + "')").css("display", "");
    }
}

//Adiciona um novo detalhe na lista de detalhes
function addTableDetalhes() {
    $("#tabela-detalhes tbody").append(
            "<tr>" +
            "<td><input name='data[Detalhe][][detalhe]' id='detalhe' type='text'></td>" +
            "<td></td>" +
            "</tr>"
            );
}
;

//Adiciona um novo material na lista
function addTableMateriais(i, id, nome) {

    path = getPathImg('ic_remove.png');
    select_id = "mat_" + id;
    $("#tabela-solicitacao-material tbody").append(
            "<tr>" +
            "<td>" + id + "<input name='data[Material][" + i + "][id]' value=" + id + " type='hidden'></td>" +
            "<td>" + nome + "</td>" +
            "<td><input required name='data[Material][" + i + "][detalhes]' style='width: 90%' type='text'></td>" +
            "<td><select id='" + select_id + "' name='data[Material][" + i + "][unidade]'/></td>" +
            "<td><input required name='data[Material][" + i + "][qtd]' class='unidade' value='1,000' type='text'></td>" +
            "<td style='text-align: center; cursor: pointer;'><img src='" + path + "' onclick='removeItem(this)'/></td>" +
            "</tr>"
            );

    //POPULA AS UNIDADES DE MEDIDAS
    populaUnidades(select_id, id);
}
;

//CARREGA AS UNIDADES DE MEDIDAS
function populaUnidades(elemento, material_id) {
    var options = $("#" + elemento);
    $.getJSON(getUrl('/materiais/buscar_unidades/' + material_id), function (item) {
        options.append($("<option />").val(item.unidade).text(item.unidade));
    });
}

//Adiciona um novo fornecedor na lista
function addTableFornecedores(id, nome) {
    path = getPathImg('ic_remove.png');
    data = getData();
    i = $('#tabela-fornecedor tbody tr td input:hidden').length;
    
    $("#tabela-fornecedor tbody").append(
            "<tr>" +
            "<td>" + id + "<input name='data[CotacaoFornecedor][" + i + "][fornecedor_id]' value=" + id + " type='hidden' /></td>" +
            "<td>" + nome + "</td>" +
            "<td><input name='data[CotacaoFornecedor][" + i + "][data_envio]' value='" + data + "' required onclick='mostrarCalendario(this);' class='date' type='text' /></td>" +
            "<td><input name='data[CotacaoFornecedor][" + i + "][data_recebimento]' required onclick='mostrarCalendario(this);' class='date' type='text' /></td>" +
            "<td style='text-align: center; cursor: pointer;'><img src='" + path + "' onclick='removeItem(this)'/></td>" +
            "</tr>"
            );
}
;

//Adiciona um novo item no processo de aquisição
function addTableItemProcesso(i, item) {
    $("#tabela-itens-processo tbody").append(
            "<tr class='item-processo'>" +
            "<td>" +
            "<input id='cotacao-id'  type='hidden' disabled value=" + item.Cotacao.id + " />" + i +
            "<input id='material-id' type='hidden' disabled value=" + item.Material.id + " />" +
            "<input type='hidden' name='data[Item][Item][]' value=" + item.MaterialFornecedor.id + " />" +
            "</td>" +
            "<td>" + item.Material.nome + "</td>" +
            "<td>" + item.MaterialFornecedor.detalhes + "</td>" +
            "<td>" +
            "<input type='hidden' disabled value=" + item.MaterialFornecedor.quantidade + " />" +
            number_format(item.MaterialFornecedor.quantidade, 2, ',','') +
            "</td>" +
            "<td>" +
            "<input type='hidden' disabled value=" + item.MaterialFornecedor.valor_unitario + " />" +
            formatarMoeda(item.MaterialFornecedor.valor_unitario) +
            "</td>" +
            "<td>" +
            "<input type='hidden' disabled value=" + item.MaterialFornecedor.tipo_frete + " />" +
            item.MaterialFornecedor.tipo_frete +
            "</td>" +
            "<td>" +
            "<input type='hidden' disabled value=" + item.MaterialFornecedor.valor_total_itens + " />" +
            formatarMoeda(item.MaterialFornecedor.valor_total_itens) +
            "</td>" +
            "<td>" + item.Fornecedor.nome_fantasia + "</td>" +
            "<td>" + item.MaterialFornecedor.forma_pagamento + "</td>" +
            "<td>" + item.MaterialFornecedor.observacao + "</td>" +
            "</tr>"
            );
}

//Adiciona um novo item no processo de aquisição
function addTableFornecedorEmpenho(item) {
    i = $('#tabela-empenho tbody tr').length;
    icone = getPathImg('ic_search.png');
    $("#tabela-empenho tbody").append(
            "<tr>" +
            "<td>" +
            "<input type='hidden' name='data[Fornecedor][" + i + "][id]' value=" + item.Fornecedor.id + " />" +
            item.Fornecedor.cnpj_cpf + " - " + item.Fornecedor.razao_social +
            "</td>" +
            "<td>" + "<img onclick='mostrarInfoItens(" + item.Fornecedor.id + ")' style='cursor: pointer' src=" + icone + " />" + "</td>" +
            "<td>" + item.Item.qtd_itens + "</td>" +
            "<td>" + formatarMoeda(item.Item.valor_total_itens) + "</td>" +
            "<td> Andamento </td>" +
            "</tr>"
    );
}

//CARREGA AS UNIDADES DE MEDIDAS
function populaContas(elemento, fornecedor_id) {
    var options = $("#" + elemento);
    $.getJSON(getUrl('/fornecedores/listar_contas/' + fornecedor_id), function (result) {
        $.each(result, function (i, item) {
            options.append($("<option />").val(item.Banco.id).text(item.Banco.nome_banco));
        });
    });
}

//Adiciona um nova unidade de medida na lista
function addTableUnidades(id, unidade, descricao) {
    path = getPathImg('ic_remove.png');
    i = $('#tabela-unidades tbody tr').length;

    $("#tabela-unidades tbody").append(
            "<tr>" +
            "<td>" + unidade + "<input name='data[Unidade][Unidade][" + i + "]' value=" + id + " type='hidden' /></td>" +
            "<td>" + descricao + "</td>" +
            "<td style='text-align: center; cursor: pointer;'><img src='" + path + "' onclick='removeItem(this)'/></td>" +
            "</tr>"
            );
}
;

//Busca os menores itens da cotação
function buscarItensProcesso(cotacao_id) {
    $.getJSON(getUrl('/processos/buscarItens/' + cotacao_id), function (data) {
        totalProcesso = 0;

        $.each(data, function (i, item) {
            addTableItemProcesso(i + 1, item);
            totalProcesso += parseFloat(item.MaterialFornecedor.valor_total_itens);
        });

        atualizaValorProcesso(totalProcesso);
    });
}

function limpaItensProcesso() {
    $("#tabela-itens-processo tbody tr").remove();
}

//Busca os fornecedores do empenho
function buscarFornecedoresEmpenho(processo_id) {
    limpaFornecedoresEmepenho();

    $.getJSON(getUrl('/empenhos/listar_fornecedores/' + processo_id), function (data) {
        $.each(data, function (i, item) {
            addTableFornecedorEmpenho(item);
        });
    });
}

function limpaFornecedoresEmepenho() {
    $("#tabela-empenho tbody tr").remove();
}

/**
 * Obtém a lista de materiais selecionados para a solicitação
 * @author Ricardo Farias
 * @return void
 */
function getMateriaisSelecionados() {
    var array = new Array();
    var elemento = '#tabela-solicitacao-material';
    cont = $('#tabela-solicitacao-material tbody tr').length;

    $('#tabela-lista-materiais tbody tr td input:checked').each(function (i, item) {
        if (!isRepetido(this.id, elemento)) {
            addTableMateriais(cont, this.id, this.name);
            cont++;
        }
    });
}

/**
 * Obtém a lista de fornecedores selecionados para a cotação
 * @author Ricardo Farias
 * @return void
 */
function getFornecedoresSelecionados() {
    elemento = '#tabela-fornecedor';

    $('#tabela-lista-fornecedores tbody tr td input:checked').each(function (i, item) {
        if (!isRepetido(this.id, elemento))
            addTableFornecedores(this.id, this.name);
    });
}

/**
 * Seleciona a solicitação
 * @author Ricardo Farias
 * @return void
 */
function selecionaSolicitacao() {
    _idPedido = $('#tabela-lista-solicitacaoes tbody tr td input:checked').val();
    _numPedido = $('#tabela-lista-solicitacaoes tbody tr td input:checked').attr('name');

    $('#solicitacao-info').load(getUrl('/solicitacoes/info/' + _numPedido));
    $('#cod_pedido').val(_numPedido);
    $('#solicitacao_id').val(_idPedido);
}

/**
 * Seleciona o item para alteração na tabela de processos
 * @author Ricardo Farias
 * @return void
 */
function selecionaItemProcesso() {
    novoItem = $('#tabela-lista-itens-processo tbody tr td input:checked').closest('tr').html();

    indexItem = $('.item-selecionado').index();
    $('.item-selecionado').closest('tr').html(novoItem);
    $('.item-selecionado td:eq(0)').append((indexItem + 1));
    $('input[type=radio]').remove();

    //Calcula o total do processo baseado nos novos itens adicionados
    totalProcesso = 0;
    $('#tabela-itens-processo tbody tr').each(function () {
        valor = $('td:eq(6) input', this).val();
        console.log(valor);
        totalProcesso += parseFloat(valor);
    });

    atualizaValorProcesso(totalProcesso);
}

/**
 * Seleciona a empresa
 * @author Ricardo Farias
 * @return void
 */
function selecionaEmpresa() {
    id_empresa = $('#tabela-lista-empresas tbody tr td input:checked').val();
    nome_empresa = $('#tabela-lista-empresas tbody tr td input:checked').attr('name');

    $('#empresa-id').val(id_empresa);
    $('#empresa-nome').val(nome_empresa);
}

/**
 * Seleciona processo
 * @author Ricardo Farias
 * @return void
 */
function selecionaProcesso() {
    id_processo = $('#tabela-lista-processos tbody tr td input:checked').val();
    n_processo = $('#tabela-lista-processos tbody tr td input:checked').attr('id');

    $('#id-processo').val(id_processo);
    $('#cod-processo').val(n_processo);

    buscarFornecedoresEmpenho(id_processo);
}

/**
 * Seleciona unidade de medida
 * @author Ricardo Farias
 * @return void
 */
function selecionaUnidade() {
    elemento = '#tabela-unidades';

    $('#tabela-lista-unidades tbody tr td input:checked').each(function (i, item) {
        if (!isRepetido(this.id, elemento))
            addTableUnidades(this.value, this.id, this.name); //Id, Unidade, Descrição
    });
}

/**
 * Seleciona a cotação da lista
 * @author Ricardo Farias
 * @return void
 */
function selecionaCotacao() {
    elemento = '#tabela-cotacoes';

    id_cotacao = $('#tabela-lista-cotacoes tbody tr td input:checked').val();
    n_cotacao = $('#tabela-lista-cotacoes tbody tr td input:checked').attr('id');

    $('#id-cotacao').val(id_cotacao);
    $('#cod-cotacao').val(n_cotacao);

    limpaItensProcesso();
    buscarItensProcesso(id_cotacao);
}

//Atualiza o valor total do processo de aquisição
function atualizaValorProcesso(valor) {
    valor = formatarMoeda(valor);
    $('#valor_total_processo').val(valor);
}

// - - - - - - EMPENHOS - - - - - -
//CARREGA AS CONTAS BANCÁRIAS RELACIONADAS AO FORNECEDOR
function mostrarContas(id) {
    $("#modal-contas-bancarias").load(getUrl('/fornecedores/listar_contas/' + id));
    $("#modal-contas-bancarias").dialog('open');
}

function mostrarInfoItens(fornecedor_id) {
    processo_id = $('#id-processo').val();
    $("#modal-info-itens").load(getUrl('/empenhos/buscar_itens/' + processo_id + '/' + fornecedor_id));
    $("#modal-info-itens").dialog('open');
}

//SELECIONA UM CONTA BANCÁRIA DA LISTA
function selecionaContaBancaria() {
    id_conta = $('#tabela-lista-contas tbody tr td input:checked').val();
    nome_conta = $('#tabela-lista-contas tbody tr td input:checked').attr('name');
    conta = $('#tabela-lista-contas tbody tr td input:checked').attr('id');

    input = "<input type='hidden' name='data[Empenho][conta_id]' value='" + id_conta + "' />";
    input += nome_conta;

    $('#' + conta).html(input);
}
// - - - - - -  FIM EMPENHOS - - - - - -

/**
 * Remove uma linha da tabela
 * @author Ricardo Farias
 * @param e - Código do elemento ou classe que representa a tabela
 * @return void
 */
function removeItem(e) {
    $(e).closest('tr').remove();
}

/**
 * Verifica se a tabela possui itens adicionados
 * @author Ricardo Farias
 * @param elemento - Código do elemento ou classe que representa a tabela
 * @return boolean
 */
function hasItens(elemento) {
    count = $(elemento + ' tbody tr').length;
    return (count > 0) ? true : false;
}

/**
 * Verifica se a tabela possui valores repetidos
 * @author Ricardo Farias
 * @param id - Valor a ser verifica na tabela
 * @param elemento - Código do elemento ou classe que representa a tabela
 * @return boolean
 */
function isRepetido(id, elemento) {
    existe = false;

    $(elemento + ' tbody tr').each(function () {
        var valor = $('td:eq(0)', this).text();
        if (valor == id) {
            existe = true;
            return;
        }
    });

    return existe;
}

//VERIFICA SE OS NÚMEROS SÃO VÁLIDOS
function isValidos(elemento, posicao) {
    hasErrors = false;

    $(elemento + ' tbody tr').each(function () {
        var input = $('td:eq(' + posicao + ')', this).children('input');
        var valor = input.val();
        if (isNaN(valor) || (valor < 1)) {
            $(input).css({background: '#FF7878', color: '#FFF'});
            $(input).focus();
            hasErrors = true;
        }
    });

    return hasErrors;
}

/**
 * Gera o mapa de cotação de acordo com a forma de exportação escolhida
 * @author Ricardo Farias
 * @return boolean
 */
function gerarMapaCotacao() {
    tipoExportacao = $('#modal-cotacao-exportacao').find('select').val();

    if (tipoExportacao != null) {
        url = $('#mapa-cotacao').attr('href');
        window.open(url + '/' + tipoExportacao);
        return true;
    }

    return false;
}

//Mostra o calendário no campo de data
function mostrarCalendario(input) {
    $(input).datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    }).datepicker("show");
}

//Obtém a data atual do sistema no formato dd/mm/YYYY
function getData() {
    var data = new Date();
    var dia = ("0" + data.getDate()).slice(-2);
    var mes = ("0" + (data.getMonth() + 1)).slice(-2);
    var ano = data.getFullYear();
    return dia + "/" + mes + "/" + ano;
}

function formatarMoeda(num) {
    num = parseFloat(num);
    return number_format(num, 2, ',', '.');
}
/*
function formatarMoeda(num) {
    num = parseFloat(num);
    var p = num.toFixed(2).split(".");
    return "R$ " + p[0].split("").reverse().reduce(function (acc, num, i, orig) {
        return  num + (i && !(i % 3) ? "," : "") + acc;
    }, "") + "." + p[1];
}
*/

function formataValor(id, tammax, teclapres) {
    if (window.event) { // Internet Explorer
        var tecla = teclapres.keyCode;
    }
    else if (teclapres.which) { // Nestcape / firefox
        var tecla = teclapres.which;
    }

    vr = document.getElementById(id).value;
    vr = vr.toString().replace("/", "");
    vr = vr.toString().replace("/", "");
    vr = vr.toString().replace(",", "");
    vr = vr.toString().replace(".", "");
    vr = vr.toString().replace(".", "");
    vr = vr.toString().replace(".", "");
    vr = vr.toString().replace(".", "");
    tam = vr.length;

    if (tam < tammax && tecla != 8) {
        tam = vr.length + 1;
    }

    if (tecla == 8) {
        tam = tam - 1;
    }

    if (tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105) {
        if (tam <= 2) {
            document.getElementById(id).value = vr;
        }
        if ((tam > 2) && (tam <= 5)) {
            document.getElementById(id).value = vr.substr(0, tam - 2) + ',' + vr.substr(tam - 2, tam);
        }
        if ((tam >= 6) && (tam <= 8)) {
            document.getElementById(id).value = vr.substr(0, tam - 5) + '.' + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
        }
        if ((tam >= 9) && (tam <= 11)) {
            document.getElementById(id).value = vr.substr(0, tam - 8) + '.' + vr.substr(tam - 8, 3) + '.' + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
        }
        if ((tam >= 12) && (tam <= 14)) {
            document.getElementById(id).value = vr.substr(0, tam - 11) + '.' + vr.substr(tam - 11, 3) + '.' + vr.substr(tam - 8, 3) + '.' + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
        }
        if ((tam >= 15) && (tam <= 17)) {
            document.getElementById(id).value = vr.substr(0, tam - 14) + '.' + vr.substr(tam - 14, 3) + '.' + vr.substr(tam - 11, 3) + '.' + vr.substr(tam - 8, 3) + '.' + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
        }
    }
}

function initPrice() {
    $('.unidade').priceFormat({
        prefix: '',
        centsSeparator: ',',
        thousandsSeparator: '.',
        centsLimit: 3
    });
}

/* UTILS */
function getUrl(local) {
    var BASE = '/sigc';
    return BASE + local;
}

function getPathImg(image) {
    var BASE = '/sigc';
    return BASE + "/img/" + image;
}

function number_format(number, decimals, dec_point, thousands_sep) {
  //  discuss at: http://phpjs.org/functions/number_format/
  // original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: davook
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Theriault
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // bugfixed by: Michael White (http://getsprink.com)
  // bugfixed by: Benjamin Lupton
  // bugfixed by: Allan Jensen (http://www.winternet.no)
  // bugfixed by: Howard Yeend
  // bugfixed by: Diogo Resende
  // bugfixed by: Rival
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  //  revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  //  revised by: Luke Smith (http://lucassmith.name)
  //    input by: Kheang Hok Chin (http://www.distantia.ca/)
  //    input by: Jay Klehr
  //    input by: Amir Habibi (http://www.residence-mixte.com/)
  //    input by: Amirouche
  //   example 1: number_format(1234.56);
  //   returns 1: '1,235'
  //   example 2: number_format(1234.56, 2, ',', ' ');
  //   returns 2: '1 234,56'
  //   example 3: number_format(1234.5678, 2, '.', '');
  //   returns 3: '1234.57'
  //   example 4: number_format(67, 2, ',', '.');
  //   returns 4: '67,00'
  //   example 5: number_format(1000);
  //   returns 5: '1,000'
  //   example 6: number_format(67.311, 2);
  //   returns 6: '67.31'
  //   example 7: number_format(1000.55, 1);
  //   returns 7: '1,000.6'
  //   example 8: number_format(67000, 5, ',', '.');
  //   returns 8: '67.000,00000'
  //   example 9: number_format(0.9, 0);
  //   returns 9: '1'
  //  example 10: number_format('1.20', 2);
  //  returns 10: '1.20'
  //  example 11: number_format('1.20', 4);
  //  returns 11: '1.2000'
  //  example 12: number_format('1.2000', 3);
  //  returns 12: '1.200'
  //  example 13: number_format('1 000,50', 2, '.', ' ');
  //  returns 13: '100 050.00'
  //  example 14: number_format(1e-8, 8, '.', '');
  //  returns 14: '0.00000001'

  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}