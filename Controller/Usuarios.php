<?php

namespace Controller;

require_once("Model/Database.php");
use Model\Database as Conexao;
use \PDO;

class Usuarios{

    private $usuarios;
    private $data;

    
    function __construct(){
        $this->usuarios = new Conexao('usuarios');
        $this->data['usuarios'] = [];
    }

    //C - Chama o formulário de cadastro
    function novo(){
        $this->data['usuarios'] = (object) [
            'usuarios_id' => '',
            'usuarios_nome' => '',
            'usuarios_cpf' => '',
            'usuarios_email' => '',
            'usuarios_senha' => '',
        ];
        $this->data['pagina'] = 'usuarios/usuarios_form';
        $this->data['msg'] = '';
        $this->data['op'] = 'cadastrar';
        return $this->data;
    }

    //C - Função Cadastrar
    function cadastrar($requests){

        $values = [
            'usuarios_nome'=> $requests['usuarios_nome'],
            'usuarios_cpf'=> $requests['usuarios_cpf'],
            'usuarios_email'=> $requests['usuarios_email'],
            'usuarios_nivel'=> 0,
            'usuarios_senha'=> $requests['usuarios_senha']
            ];

        if(($this->usuarios)->insert($values)){
            $this->data['msg'] = ['texto'=>'Cadastrado com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi cadastrado!','color'=>'danger'];
        }
        $this->data['usuarios'] = ($this->usuarios)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'usuarios/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //R - Função editar  - Lista as informações de uma cidade
    function editar($id){
        $this->data['usuarios'] = ($this->usuarios)->select($join=null,'usuarios_id = '.$id)->fetchObject();
        $this->data['pagina'] = 'usuarios/usuarios_form';
        $this->data['msg'] = '';
        $this->data['op'] = 'alterar';
        return $this->data;
    }

    //R - Função Listar todas as informações
    function index(){
        $this->data['usuarios'] = ($this->usuarios)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'usuarios/index';
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
        $where = 'usuarios_nome like "%'.$requests['pesquisar'].'%" or usuarios_cpf like "%'.$requests['pesquisar'].'%"'; 
        $this->data['usuarios'] = ($this->usuarios)->select($join,$where,$order,$limit)->fetchAll(PDO::FETCH_CLASS);
        $this->data['msg'] = [
                           'texto'=>"Total de registros: ".count($this->data['usuarios']),
                           'color'=>"success"
                        ];
        $this->data['pagina'] = 'usuarios/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //U - Função Alterar
    function alterar($requests){
        $values = [
                    'usuarios_nome'=> $requests['usuarios_nome'],
                    'usuarios_cpf'=> $requests['usuarios_cpf'],
                    'usuarios_email'=> $requests['usuarios_email']
                ];

        if($this->usuarios->update('usuarios_id = '.$requests['usuarios_id'],$values)){
            $this->data['msg'] = ['texto'=>'Alterado com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi alterado!','color'=>'danger'];
        }
        $this->data['usuarios'] = ($this->usuarios)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'usuarios/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }

    //D - Função Deletar
    function delete($id){

        if(($this->usuarios)->delete('usuarios_id = '.$id)){
            $this->data['msg'] = ['texto'=>'Exluido com Sucesso!','color'=>'success'];
        }else{
            $this->data['msg'] = ['texto'=>'Não foi Excluido!','color'=>'danger'];
        }
        $this->data['usuarios'] = ($this->usuarios)->select($join=null, $where=null,$order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        $this->data['pagina'] = 'usuarios/index';
        $this->data['op'] = 'listar';
        return $this->data;

    }
    

    
}
