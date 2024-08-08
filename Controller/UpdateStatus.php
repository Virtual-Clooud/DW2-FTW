<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include "Conexao.php";

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {
    $id = $_SESSION['id'];
    $objetivoid = $_POST['info'];

   
    if (isset(isset($_POST['status'])) {
        $status = $_POST['status'];

			

     
        $sql = "UPDATE acoes SET status =  :status WHERE :objetivoid";
        $stmt = $db->prepare($sql); // Use a variável $db do arquivo de conexão

  
        $stmt->execute([
            'objetivo_id' => $objetivoId,
            'status' => $status
        ]);

        if ($stmt->rowCount() === 1) {
            header('Location: ../view/ObjetivoDetalhado.php?msg=Status Alterado com Sucesso');
            exit();
          
        } else {
            echo 'Falha ao Alterar';
        }

    	header('Location: ../view/Catalogo.php');
    } 
    else {
        echo 'Dados não definidos';
    }
} else {
    echo 'Usuário não está logado';
    header('Location: ../view/index.php');
}
?>
