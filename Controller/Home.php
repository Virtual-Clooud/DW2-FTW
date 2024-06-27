<?php

namespace Controller;

require_once("Model/Database.php");
use Model\Database as Conexao;
use \PDO;

class Home{

    private $home;
    private $data;

    
    function __construct(){
        $this->usuarios = new Conexao('usuarios');
        $this->data['home'] = [];
    }

    //C - Chama o formulário de cadastro
    function index(){
        $this->data['home'] = (object) [
            'home' => '',
        ];
        $this->data['pagina'] = 'home/index';
        $this->data['msg'] = '';
        $this->data['op'] = 'listar';
        return $this->data;
    }

    
}
