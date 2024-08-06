<?php  

include "Conexão.php";

 session_start();

      if(isset($_SESSION['id']) && isset($_SESSION['nome'])) {


$id = $_SESSION['id'];

$titulo = validate($_POST['titulo']);
$descricao = validate($_POST['descricao']);

	$sql = "INSERT INTO  objetivo(usuario_id,titulo,descricao) VALUES(:id,:titulo,:descricao)";
    $stmt = $db->prepare($sql); // Use a variável $db do arquivo de conexão
    $stmt->execute(['id' => $id, 'titulo' => $titulo,'descricao' => $descricao]);

















}
else {
      header('Location: index.php');
      exit();
}

?>