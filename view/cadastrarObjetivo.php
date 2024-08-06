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
    <div class="cabecalho">
        <h1>Mapa Mental</h1>
        <nav>
            <ul>
                <li><a href="#">Olá, <?php echo $_SESSION['nome']; ?></a></li>  
                <li><a href="#">Home</a></li>
                <li><a href="#">Objetivos</a></li>
                <li><a href="#">Perfil</a></li>
            </ul>
        </nav>
    </div>

    <div class="conteudo">
        <div class="form-container">
            <h2>Cadastrar Objetivo</h2>
            <form action="../Controller/ProcessarObjetivo.php" method="post">
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
    </div>

    <div class="rodape">
        
        <a class = "canto" href="../Controller/logout.php">Logout</a>
    </div>
</body>
</html>

    <?php 
}
else {
      header('Location: index.php');
      exit();
}


 ?>