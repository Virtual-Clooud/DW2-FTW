<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo 'entrou aqui';

include "Conexao.php";

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {
    $id = $_SESSION['id'];

    // Verifica se os dados do POST estão definidos
    if (isset($_POST['objetivoId']) && isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['vencimento']) && isset($_POST['status'])) {
        $objetivoId = $_POST['objetivoId'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $vencimento = $_POST['vencimento'];
        $status = $_POST['status'];

			

        // Ajustar o SQL e o bind de parâmetros
        $sql = "INSERT INTO acoes(objetivo_id, titulo, descricao, vencimento, status, criadoEm) VALUES(:objetivo_id, :titulo, :descricao, :vencimento, :status, NOW())";
        $stmt = $db->prepare($sql); // Use a variável $db do arquivo de conexão

        // Execute com os parâmetros corretos
        $stmt->execute([
            'objetivo_id' => $objetivoId,
            'titulo' => $titulo,
            'descricao' => $descricao,
            'vencimento' => $vencimento,
            'status' => $status
        ]);

        if ($stmt->rowCount() === 1) {
          
        } else {
            echo 'Falha ao inserir';
        }
    } else {
        echo 'Dados do POST não definidos';
    }
} else {
    echo 'Usuário não está logado';
}
?>
