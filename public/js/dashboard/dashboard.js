function nav_info(url) {
    setInterval(() => {
        $(document).ready(function () {
            $.get(url, function (data) {

                $('#ultima-atualizacao').text('Ultima atualização ' + new Date(data.data).toLocaleString());
                $('#nome-loja').text(data.nome[0].nome_loja);
                $('#cnpj-loja').text(data.cnpj[0].cnpj_loja);
                $('#user-venda-info').text(data.venda.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));

                $('#ultima-atualizacao').text('Ultima atualização ' + new Date(data.data)
                    .toLocaleString());

                $('#user-venda-info').text(data.venda.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
                $('#user-caixa-info').text(data.caixa.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
                $('#user-caixa-info-atual').text(data.caixaAtual.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));
                $('#user-estoque-info').text(data.estoque.toLocaleString('pt-BR', {
                    minimumFractionDigits: 2
                }));

            })

        });
    }, 3000);

}


function forma_pagamento(url) {
    graficoLinha(url, "chart-line-vendas-qtd", '',
        'Vendas', 'Vendas');
    graficoLinha(url, "chart-line-vendas-valor", '',
        'Vendas', 'Valor',
        'R$')
    formaPagamento(url)
    tabela(url)
}