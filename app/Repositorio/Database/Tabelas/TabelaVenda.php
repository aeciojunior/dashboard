<?php

namespace App\Repositorio\Database\Tabelas;


class TabelaVenda
{
    public function __construct()
    {
    }

    public function gerarTabela()
    {
        return "
        CREATE TABLE  IF NOT EXISTS vendas(
            id bigint not null auto_increment primary key,
            created_at timestamp default current_timestamp,
            codproduto varchar(10),
            qtde double,
            unitario double,
            total decimal(12,2),
            subtotal double,
            desconto decimal(12,2),
            codigo varchar(10),
            codnota varchar(10),
            codcaixa varchar(10),
            cfop varchar(10),
            codcliente varchar(10),
            codfilial  varchar(10),
            data timestamp default current_timestamp,
            meio_dinheiro double,
            meio_cartaodeb double,
            meio_cartaocred double,
            meio_chequeap double,
            meio_chequeav double,
            meio_crediario double,
            meio_outros double,
            troco double,
            valor_recebido double,
            valor_produtos double,
            total_nota double
         );
        ";
    }
}



