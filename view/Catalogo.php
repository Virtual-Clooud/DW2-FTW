<?php 

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include "../Controller/Conexao.php";

  session_start();

    if(isset($_SESSION['id']) && isset($_SESSION['nome'])) {

      $id = $_SESSION['id'];

      $sql = "SELECT objetivo.titulo AS objetivo_titulo, 
                  acoes.titulo AS acao_titulo, 
                  objetivo.criadoEm AS objetivo_criadoEm
                  FROM objetivo INNER JOIN acoes
                  ON objetivo.id = acoes.objetivo_id
                  WHERE objetivo.usuario_id = :id  ";
     
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
  <title></title>
</head>
<body>
    <div class="container">
      <?php foreach ($objAcoes as $objAcao): ?>
        <div class="box">
            <h2><?php echo htmlspecialchars($objAcao['objetivo_titulo']); ?></h2>
            <p>Email: <?php echo htmlspecialchars($objAcao['acao_titulo']); ?></p>
            <p>Idade: <?php echo htmlspecialchars($objAcao['objetivo_criadoEm']); ?></p>
        </div>
        <?php endforeach; ?>
       
    </div>
</body>
</html>

<?php
  }else{
    header('Location: index.php');
      exit();

  }

?>

