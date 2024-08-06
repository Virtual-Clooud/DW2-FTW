<?php  
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include "Conexao.php";

	session_start();

	  if(isset($_SESSION['id']) && isset($_SESSION['nome'])) {


	$id = $_SESSION['id'];

	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];

	$sql = "INSERT INTO  objetivo(usuario_id,titulo,descricao) VALUES(:id,:titulo,:descricao)";
	$stmt = $db->prepare($sql); // Use a variável $db do arquivo de conexão
	$stmt->execute(['id' => $id, 'titulo' => $titulo,'descricao' => $descricao]);

	if ($stmt->rowCount() === 1) {
?>
			<!DOCTYPE html>
	<html lang="pt-BR">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastrar Ações</title>
	<link rel="stylesheet" href="../view/styles.css">
	</head>
	<body>

	<div class="cabecalho">
	    <h1>Mapa Mental - Cadastrar Ação</h1>
	    <nav>
	        <ul>
	            <li><a href="#">Olá, <?php echo $_SESSION['nome']; ?></a></li>
	            <li><a href="#">Sobre</a></li>
	            <li><a href="#">Contato</a></li>
	            <li><a class="botao logout" href="../Controller/logout.php">Logout</a></li>
	        </ul>
	    </nav>
	</div>

	<div class="conteudo">
	    <div class="form-container">
	        <h2>Cadastrar Nova Ação</h2>
	        <form action="../Controller/ProcessarAcao.php" method="post">
	            <div class="form-group">
	                <label for="titulo">Título:</label>
	                <input type="text" id="titulo" name="titulo" required>
	            </div>
	            <div class="form-group">
	                <label for="descricao">Descrição:</label>
	                <textarea id="descricao" name="descricao" rows="4" required></textarea>
	            </div>
	            <div class="form-group">
	                <label for="vencimento">Data de Vencimento:</label>
	                <input type="date" id="vencimento" name="vencimento" required>
	            </div>
	            <div class="form-group">
	                <label for="status">Status:</label>
	                <select id="status" name="status">
	                    <option value="pendente">Pendente</option>
	                    <option value="em progresso">Em Progresso</option>
	                    <option value="concluída">Concluída</option>
	                </select>
	            </div>
	            <button type="submit">Cadastrar Ação</button>
	        </form>
	    </div>
	</div>

	<div class="rodape">
	    <p>© 2024 Mapa Mental. Todos os direitos reservados.</p>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

	</body>
	</html>





<?php
	}else{
		echo "deu errado";
	}

















	}
	else {
	  header('Location: index.php');
	  exit();
	}

?>