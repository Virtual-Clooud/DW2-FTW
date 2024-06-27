<?php

namespace Controller;

require_once("Model/Database.php");
use Model\Database as Conexao;
use \PDO;

class Cidades{

    private $cidades;
    private $data;

    
    function __construct(){
        $this->cidades = new Conexao('cidades');
        $this->data['cidades'] = [];
    }

    //C - Chama o formulário de cadastro
    function novo(){
        $this->data['cidades'] = (object) [
            'cidades_id' => '',
            'cidades_nome' => '',
            'cidades_uf' => '',
        ];
        $this->data['pagina'] = 'cidades/cidades_form';
        $this->data['msg'] = '';
        $this->data['op'] = 'cadastrar';
        return $this->data;
    }

    //C - Função Cadastrar
    function cadastrar($requests){

        $values = [
            'cidades_nome'=> $requests['cidades_nome'],
            'cidades_uf'  => $requests['cidades_uf']
            ];

        if(($this->cidades)->insert($values)){
            $this->data['msg'] = ['texto'=>'Cadastrado com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi cadastrado!','color'=>'danger'];
        }
        $this->data['cidades'] = ($this->cidades)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'cidades/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //R - Função editar  - Lista as informações de uma cidade
    function editar($id){
        $this->data['cidades'] = ($this->cidades)->select($join=null,'cidades_id = '.$id)->fetchObject();
        $this->data['pagina'] = 'cidades/cidades_form';
        $this->data['msg'] = '';
        $this->data['op'] = 'alterar';
        return $this->data;
    }

    //R - Função Listar todas as informações
    function index(){
        $this->data['cidades'] = ($this->cidades)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'cidades/index';
        $this->data['msg'] = '';
        $this->data['op'] = 'listar';
        return $this->data;
    }

    //R - Função Pesquisar
    function pesquisar($requests){
        $join = null;
        $where = null;
        $order = null;
        $limit = null;
        $where = 'cidades_nome like "%'.$requests['pesquisar'].'%"'; 
        $this->data['cidades'] = ($this->cidades)->select($join,$where,$order,$limit)->fetchAll(PDO::FETCH_CLASS);
        $this->data['msg'] = [
                           'texto'=>"Total de registros: ".count($this->data['cidades']),
                           'color'=>"success"
                        ];
        $this->data['pagina'] = 'cidades/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //U - Função Alterar
    function alterar($requests){
        $values = [
                    'cidades_nome' => $requests['cidades_nome'],
                    'cidades_uf'   => $requests['cidades_uf']
                ];

        if($this->cidades->update('cidades_id = '.$requests['cidades_id'],$values)){
            $this->data['msg'] = ['texto'=>'Alterado com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi alterado!','color'=>'danger'];
        }
        $this->data['cidades'] = ($this->cidades)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'cidades/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //D - Função Deletar
    function delete($id){

        if(($this->cidades)->delete('cidades_id = '.$id)){
            $this->data['msg'] = ['texto'=>'Exluido com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi Excluido!','color'=>'danger'];
        }
        $this->data['cidades'] = ($this->cidades)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'cidades/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }
    

    
}
