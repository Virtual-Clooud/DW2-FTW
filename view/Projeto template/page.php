<?php
require_once('config/funcoes_auxiliares.php');

function instanceClass($pagina){
    require_once("Controller/{$pagina}.php");
    $classe = 'Controller\\'.ucfirst($pagina);
    return new $classe();
}

if(!isset($_REQUEST['p'])){
    header('Location: index.php?p=home');

} else{
    
    $page = ucfirst($_REQUEST['p']);
    
    if(file_exists("Controller/{$page}.php")){
        $opcao = instanceClass($page);

        if(!isset($_REQUEST['op'])){
            $dados = $opcao->index();
        }
        else if($_REQUEST['op'] == "index"){
            $dados = $opcao->index();
        }

        else if($_REQUEST['op'] == "cadastrar"){
            $dados = $opcao->cadastrar($_REQUEST);
        }
        else if($_REQUEST['op'] == "novo"){
            $dados = $opcao->novo();
        }
        else if($_REQUEST['op'] == "editar"){
            $id = $_REQUEST['id'];
            $dados = $opcao->editar($id);
        }
        else if($_REQUEST['op'] == "alterar"){
            $dados = $opcao->alterar($_REQUEST);
        }
        else if($_REQUEST['op'] == "pesquisar"){
            $dados = $opcao->pesquisar($_REQUEST);
        }
        else if($_REQUEST['op'] == "excluir"){
            $id = $_REQUEST['id'];
            $dados = $opcao->delete($id);
        }
        else if($_REQUEST['op'] == "logar"){
            $dados = $opcao->logar($_REQUEST);
        }

        require "view/{$dados['pagina']}.php";
        
    }
        
}
 ?>