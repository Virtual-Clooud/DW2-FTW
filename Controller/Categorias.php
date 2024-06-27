<?php

namespace Controller;

require_once("Model/Database.php");
use Model\Database as Conexao;
use \PDO;

class Categorias{

    private $categorias;
    private $data;

    
    function __construct(){
        $this->categorias = new Conexao('categorias');
        $this->data['categorias'] = [];
    }

    //C - Chama o formulário de cadastro
    function novo(){
        $this->data['categorias'] = (object) [
            'categorias_id' => '',
            'categorias_nome' => '',
            'categorias_uf' => '',
        ];
        $this->data['pagina'] = 'categorias/categorias_form';
        $this->data['msg'] = '';
        $this->data['op'] = 'cadastrar';
        return $this->data;
    }

    //C - Função Cadastrar
    function cadastrar($requests){

        $values = [
            'categorias_nome'=> $requests['categorias_nome']
            ];

        if(($this->categorias)->insert($values)){
            $this->data['msg'] = ['texto'=>'Cadastrado com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi cadastrado!','color'=>'danger'];
        }
        $this->data['categorias'] = ($this->categorias)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'categorias/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //R - Função editar  - Lista as informações de uma cidade
    function editar($id){
        $this->data['categorias'] = ($this->categorias)->select($join=null,'categorias_id = '.$id)->fetchObject();
        $this->data['pagina'] = 'categorias/categorias_form';
        $this->data['msg'] = '';
        $this->data['op'] = 'alterar';
        return $this->data;
    }

    //R - Função Listar todas as informações
    function index(){
        $this->data['categorias'] = ($this->categorias)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'categorias/index';
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
        $where = 'categorias_nome like "%'.$requests['pesquisar'].'%"'; 
        $this->data['categorias'] = ($this->categorias)->select($join,$where,$order,$limit)->fetchAll(PDO::FETCH_CLASS);
        $this->data['msg'] = [
                           'texto'=>"Total de registros: ".count($this->data['categorias']),
                           'color'=>"success"
                        ];
        $this->data['pagina'] = 'categorias/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //U - Função Alterar
    function alterar($requests){
        $values = [
                    'categorias_nome' => $requests['categorias_nome']
                ];

        if($this->categorias->update('categorias_id = '.$requests['categorias_id'],$values)){
            $this->data['msg'] = ['texto'=>'Alterado com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi alterado!','color'=>'danger'];
        }
        $this->data['categorias'] = ($this->categorias)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'categorias/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //D - Função Deletar
    function delete($id){

        if(($this->categorias)->delete('categorias_id = '.$id)){
            $this->data['msg'] = ['texto'=>'Exluido com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi Excluido!','color'=>'danger'];
        }
        $this->data['categorias'] = ($this->categorias)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'categorias/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }
    

    
}
