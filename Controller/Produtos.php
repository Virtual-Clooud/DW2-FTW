<?php

namespace Controller;

require_once("Model/Database.php");
use Model\Database as Conexao;
use \PDO;

class Produtos{

    private $categorias;
    private $produtos;
    private $data;

    
    function __construct(){
        $this->produtos = new Conexao('produtos');
        $this->categorias = new Conexao('categorias');
        $this->data['produtos'] = [];
    }

    //C - Chama o formulário de cadastro
    function novo(){
        $this->data['categorias'] = ($this->categorias)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['produtos'] = (object) [
            'produtos_id' => '',
            'produtos_nome' => '',
            'produtos_descricao' => '',
            'produtos_preco_custo' => '0.00',
            'produtos_preco_venda' => '0.00'
        ];
        $this->data['pagina'] = 'produtos/produtos_form';
        $this->data['msg'] = '';
        $this->data['op'] = 'cadastrar';
        return $this->data;
    }

    //C - Função Cadastrar
    function cadastrar($requests){

        $values = [
            'produtos_nome'=> $requests['produtos_nome'],
            'produtos_descricao'  => $requests['produtos_descricao'],
            'produtos_preco_custo'  => moedaDolar($requests['produtos_preco_custo']),
            'produtos_preco_venda'  => moedaDolar($requests['produtos_preco_venda']),
            'produtos_categorias_id'  => $requests['produtos_categorias_id']
            ];

        if(($this->produtos)->insert($values)){
            $this->data['msg'] = ['texto'=>'Cadastrado com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi cadastrado!','color'=>'danger'];
        }
        $this->data['produtos'] = ($this->produtos)->select($join='categorias on produtos_categorias_id = categorias_id', $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'produtos/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //R - Função editar  - Lista as informações de uma cidade
    function editar($id){
        $this->data['categorias'] = ($this->categorias)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['produtos'] = ($this->produtos)->select($join=null,'produtos_id = '.$id)->fetchObject();
        $this->data['pagina'] = 'produtos/produtos_form';
        $this->data['msg'] = '';
        $this->data['op'] = 'alterar';
        return $this->data;
    }

    //R - Função Listar todas as informações
    function index(){
        $this->data['produtos'] = ($this->produtos)->select($join='categorias on produtos_categorias_id = categorias_id', $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'produtos/index';
        $this->data['msg'] = '';
        $this->data['op'] = 'listar';
        return $this->data;
    }

    //R - Função Pesquisar
    function pesquisar($requests){
        $join = 'categorias on produtos_categorias_id = categorias_id';
        $where = null;
        $order = null;
        $limit = null;
        $where = 'produtos_nome like "%'.$requests['pesquisar'].'%"'; 
        $this->data['produtos'] = ($this->produtos)->select($join,$where,$order,$limit)->fetchAll(PDO::FETCH_CLASS);
        $this->data['msg'] = [
                           'texto'=>"Total de registros: ".count($this->data['produtos']),
                           'color'=>"success"
                        ];
        $this->data['pagina'] = 'produtos/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //U - Função Alterar
    function alterar($requests){
        $values = [
                    'produtos_nome'=> $requests['produtos_nome'],
                    'produtos_descricao'  => $requests['produtos_descricao'],
                    'produtos_preco_custo'  => moedaDolar($requests['produtos_preco_custo']),
                    'produtos_preco_venda'  => moedaDolar($requests['produtos_preco_venda']),
                    'produtos_categorias_id'  => $requests['produtos_categorias_id']
                ];

        if($this->produtos->update('produtos_id = '.$requests['produtos_id'],$values)){
            $this->data['msg'] = ['texto'=>'Alterado com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi alterado!','color'=>'danger'];
        }
        $this->data['produtos'] = ($this->produtos)->select($join='categorias on produtos_categorias_id = categorias_id', $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'produtos/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //D - Função Deletar
    function delete($id){

        if(($this->produtos)->delete('produtos_id = '.$id)){
            $this->data['msg'] = ['texto'=>'Exluido com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi Excluido!','color'=>'danger'];
        }
        $this->data['produtos'] = ($this->produtos)->select($join='categorias on produtos_categorias_id = categorias_id', $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'produtos/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }
    

    
}
