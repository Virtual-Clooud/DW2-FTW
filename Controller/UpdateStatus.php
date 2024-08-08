<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "Conexao.php";

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {
    $id = $_SESSION['id'];
   $objetivo_id = $_POST['objetivo_id'];
    $status = $_POST['status'];
    $acoes_selecionadas = $_POST['acoes'] ?? [];

    if (isset($status)) { // Corrigido: removido 'isset('
        if (!empty($acoes_selecionadas)) {
            
            try {

                $placeholders = implode(',', array_fill(0, count($acoes_selecionadas), '?'));
                $sql = "UPDATE acoes SET status = ? WHERE id IN ($placeholders)";
                $stmt = $db->prepare($sql);
                $params = array_merge([$status], $acoes_selecionadas);
                $stmt->execute($params);

                if ($stmt->rowCount() > 0) {
                    header('Location: ../view/ObjetivoDetalhado.php?msg=Status Alterado com Sucesso');
                } else {
                    header('Location: ../view/ObjetivoDetalhado.php?msg=Falha ao alterar');
                }
                exit(); // Assegura que o script não continue após o redirecionamento
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        } else {
            echo 'Nenhuma ação selecionada';
        }
    } else {
        echo 'Status não definido';
    }
} else {
    echo 'Usuário não está logado';
    header('Location: ../view/index.php');
    exit(); // Assegura que o script não continue após o redirecionamento
}
?>
