<?php 

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include "../Controller/Conexao.php";

  session_start();

  if(isset($_SESSION['id']) && isset($_SESSION['nome'])) {

    $id = $_SESSION['id'];

    $sql = "SELECT objetivo.descricao AS objetivo_descricao,
    				 objetivo.id AS objetivo_id,
                  objetivo.titulo AS objetivo_titulo, 
                   GROUP_CONCAT(CONCAT(acoes.titulo, ': Vencimento em : ', acoes.vencimento) SEPARATOR '\n 	') AS acoes_info,
                   objetivo.criadoEm AS objetivo_criadoEm
            FROM objetivo 
            INNER JOIN acoes ON objetivo.id = acoes.objetivo_id
            WHERE objetivo.usuario_id = :id  
            GROUP BY objetivo.id, objetivo.titulo, objetivo.criadoEm";

    $stmt = $db->prepare($sql); // Use a variável $db do arquivo de conexão
    $stmt->execute(['id' => $id]);

    $objAcoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Catálogo de Objetivos</title>
</head>
<body>
  <div class="cabecalho">
      <h1><?php foreach ($objAcoes as $objAcao): 
      			echo htmlspecialchars($objAcao['objetivo_titulo']);
			 endforeach; ?></h1>
      <nav>
      <ul>
          <li><a href="#">Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?></a></li>
          <li><a href="homepage.php">Home</a></li>
          <li><a href="#">Sobre</a></li>
          <li><a href="#">Contato</a></li>
      </ul>
    </nav>
  </div>

  <div class="container">
    <?php foreach ($objAcoes as $objAcao): ?>
      <div class="bigbox">
          <h2><?php echo htmlspecialchars($objAcao['objetivo_descricao']); ?></h2>
          <p>Ação(s):<br> <?php echo nl2br(htmlspecialchars($objAcao['acoes_info'] ?? 'Nenhuma ação')); ?><br></p>
          <p>Data de Criação: <?php echo htmlspecialchars($objAcao['objetivo_criadoEm']); ?></p>
          
          <form action="ObjetivoDetalhado.php" method="post">
               <input type="hidden" name="info" value="<?php echo htmlspecialchars($objAcao['objetivo_id']); ?>">
              <button type="submit" class="botao">Detalhes</button>
          </form>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="rodape">
      <a class="canto" href="../Controller/logout.php">Logout</a>
  </div>
</body>
</html>

<?php
  } else {
    header('Location: index.php');
    exit();
  }
?>
