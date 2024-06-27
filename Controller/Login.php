<?php

namespace Controller;

require_once("Model/Database.php");
use Model\Database as Conexao;
use \PDO;

class Login{

    private $usuarios;
    private $data;

    
    function __construct(){
        $this->usuarios = new Conexao('usuarios');
        $this->data['login'] = [];
    }

    //C - Chama o formulário de cadastro
    function index(){
        $this->data['login'] = (object) [
            'login' => '',
            'senha' => '',
        ];
        $this->data['pagina'] = 'login/index';
        $this->data['msg'] = '';
        $this->data['op'] = 'login';
        return $this->data;
    }

    //C - Função Cadastrar
    function logar($requests){

        $values = [
            'login'=> $requests['login'],
            'senha'=> $requests['senha']
            ];
            $where= "usuarios_cpf = '{$values['login']}' or usuarios_email = '{$values['login']}' and usuarios_senha = '{$values['senha']}'";

        $login = ($this->usuarios)->select($join=null, $where, $order=null,$limit=null)->fetchAll(PDO::FETCH_CLASS);
        //print_r($login[0]);
        if(!empty($login)){

            session_start();
            $_SESSION['login'] = $login[0];
            if($login[0]->usuarios_nivel == 1){
                $this->data['msg'] = ['texto'=>'Logado com Sucesso!','color'=>'success'];
                $this->data['usuarios'] = $login;
                $this->data['pagina'] = 'admin/index';
                $this->data['op'] = 'listar';
                return $this->data;
            }else if($login[0]->usuarios_nivel == 0){
                $this->data['msg'] = ['texto'=>'Logado com Sucesso!','color'=>'success'];
                $this->data['pagina'] = 'user/index';
                $this->data['op'] = 'listar';
                return $this->data;
            }
        }else{
            $this->data['msg'] = ['texto'=>'Login ou Senha invalidos!','color'=>'danger'];
            $this->data['pagina'] = 'login/index';
            $this->data['op'] = 'listar';
            return $this->data;
        }
        

    }

    
    
}
