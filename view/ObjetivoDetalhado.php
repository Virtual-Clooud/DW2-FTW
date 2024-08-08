<?php 

      session_start();

      if(isset($_SESSION['id']) && isset($_SESSION['nome'])) {


 ?>

 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Detalhes</title>
</head>
<body>
  <div class="cabecalho">
      <h1>Detalhes</h1>
      <nav>
      <ul>
          <li><a href="#">Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?></a></li>
          <li><a href="#">Sobre</a></li>
          <li><a href="#">Contato</a></li>
      </ul>
    </nav>
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