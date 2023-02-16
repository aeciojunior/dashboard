<?php


namespace App\Repositorio\Database\Inserts;

use App\Repositorio\Database\DatabaseRepositorio;
use Exception;

class VendaInsert
{

    protected $db;

    public function __construct()
    {
        $this->db = new DatabaseRepositorio();
    }

    public function insert($vendas)
    {
       
        try {
         
            $sql = $this->prepareInsertSQL($vendas);
            $conn = $this->conection($vendas['config']['db_instancia']);
            $conn->beginTransaction();
            $conn->query("TRUNCATE table `{$vendas['config']['db_instancia']}`.`vendas`; ");
            $insert = $conn->query($sql);
            return $insert ? true : false;
            $conn->commit();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // codproduto varchar(10),
    // qtde double,
    // unitario double,
    // total decimal(12,2),
    // subtotal double,
    // desconto decimal(12,2),
    // codigo varchar(10),
    // codnota varchar(10),
    // codcaixa varchar(10),
    // cfop varchar(10),
    // codcliente varchar(10),
    // codfilial  varchar(10),
    // data timestamp default current_timestamp,
    // meio_dinheiro double,
    // meio_cartaodeb double,
    // meio_cartaocred double,
    // meio_chequeap double,
    // meio_chequeav double,
    // meio_crediario double,
    // meio_outros double,
    // troco double,
    // valor_recebido double,
    // valor_produtos double,
    // total_nota double

    protected function prepareInsertSQL($vendas)
    {
        $sql = "
            insert into vendas(codproduto,qtde,unitario,subtotal,desconto,codigo,codnota,codcaixa,cfop,codcliente,codfilial,data,meio_dinheiro,meio_cartaodeb,meio_cartaocred,meio_chequeap,meio_chequeav,meio_crediario,meio_outros,troco,valor_recebido,valor_produtos,total_nota)values
        ";

        $values = '';

        foreach ($vendas['venda'] as $dado) {

            $dado['QTDE'] = empty($dado['QTDE']) ? 0 : $dado['QTDE'];
            $dado['UNITARIO'] = empty($dado['UNITARIO']) ? 0 : $dado['UNITARIO'];
            $dado['SUBTOTAL'] = empty($dado['SUBTOTAL']) ? 0 : $dado['SUBTOTAL'];
            $dado['UNITARIO'] = empty($dado['UNITARIO']) ? 0 : $dado['UNITARIO'];
            $dado['TOTAL'] = empty($dado['TOTAL']) ? 0 : $this->parse_money($dado['TOTAL']);
            $dado['DESCONTO'] = empty($dado['DESCONTO']) ? 0 : $this->parse_money($dado['DESCONTO']);
            $dado['MEIO_DINHEIRO'] = empty($dado['MEIO_DINHEIRO']) ? 0 : $this->parse_money($dado['MEIO_DINHEIRO']);
            $dado['MEIO_CREDIARIO'] = empty($dado['MEIO_CREDIARIO']) ? 0 : $this->parse_money($dado['MEIO_CREDIARIO']);
            $dado['MEIO_CARTAOCRED'] = empty($dado['MEIO_CARTAOCRED']) ? 0 : $this->parse_money($dado['MEIO_CARTAOCRED']);
            $dado['MEIO_CARTAODEB'] = empty($dado['MEIO_CARTAODEB']) ? 0 : $this->parse_money($dado['MEIO_CARTAODEB']);
            $dado['MEIO_OUTROS'] = empty($dado['MEIO_OUTROS']) ? 0 : $this->parse_money($dado['MEIO_OUTROS']);
            $dado['MEIO_CHEQUEAP'] = empty($dado['MEIO_CHEQUEAP']) ? 0 : $this->parse_money($dado['MEIO_CHEQUEAP']);
            $dado['MEIO_CHEQUEAV'] = empty($dado['MEIO_CHEQUEAV']) ? 0 : $this->parse_money($dado['MEIO_CHEQUEAV']);
            $dado['TROCO'] = empty($dado['TROCO']) ? 0 : $this->parse_money($dado['TROCO']);
            $dado['VALOR_RECEBIDO'] = empty($dado['VALOR_RECEBIDO']) ? 0 : $this->parse_money($dado['VALOR_RECEBIDO']);
            $dado['VALOR_PRODUTOS'] = empty($dado['VALOR_PRODUTOS']) ? 0 : $this->parse_money($dado['VALOR_PRODUTOS']);
            $dado['TOTAL_NOTA'] = empty($dado['TOTAL_NOTA']) ? 0 : $this->parse_money($dado['TOTAL_NOTA']);


            $values .= "('{$dado['CODPRODUTO']}',{$dado['QTDE']},{$dado['UNITARIO']},{$dado['SUBTOTAL']},
             {$dado['DESCONTO']},'{$dado['CODIGO']}','{$dado['CODNOTA']}','{$dado['CODCAIXA']}','{$dado['CFOP']}','{$dado['CODCLIENTE']}',
            '{$dado['CODFILIAL']}','{$dado['DATA']}',{$dado['MEIO_DINHEIRO']},{$dado['MEIO_CARTAODEB']},{$dado['MEIO_CARTAOCRED']},{$dado['MEIO_CHEQUEAP']},
              {$dado['MEIO_CHEQUEAV']},{$dado['MEIO_CREDIARIO']},{$dado['MEIO_OUTROS']},{$dado['TROCO']},{$dado['VALOR_RECEBIDO']},{$dado['VALOR_PRODUTOS']},{$dado['TOTAL_NOTA']}),";
        }

        return   $sql . rtrim($values, ',') . ";";
    }


    public  function parse_money($number)
    {
        return str_replace(['R$', '.', ','], ['', '', '.'], $number);
    }

    protected function conection($db_instancia)
    {
        return  $this->db->ConnDbInstancia($db_instancia);
    }

    public  function removeMaskCpfCnpj($docuemnto)
    {
        return str_replace("/", "", str_replace('-', "", str_replace(".", "", trim($docuemnto))));
    }
}
