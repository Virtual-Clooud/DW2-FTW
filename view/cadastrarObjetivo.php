<?php 
      session_start();

      if(isset($_SESSION['id']) && isset($_SESSION['nome'])) {

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Objetivo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastrar Objetivo</h2>
        <form action="processar_objetivo.php" method="post">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>
            </div>

            <button type="submit">Salvar Objetivo</button>
        </form>
    </div>

    <?php 
}
else {
      header('Location: index.php');
      exit();
}


 ?>