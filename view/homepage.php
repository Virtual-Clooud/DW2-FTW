<?php 
      session_start();

      if(isset($_SESSION['id']) && isset($_SESSION['nome'])) {

?>

<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="styles.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Crie seu mapa mental!!</title>
      </head>
      <body>

            <div class="cabecalho">

                  <h1>Mapa Mental</h1>
                  <nav>
                        <ul>
                               <li><a href="#">Olá, <?php echo $_SESSION['nome']; ?></a></li>
                               <li><a href="#">Objetivos</a></li>
                               <li><a href="#">Sobre</a></li>
                               <li><a href="#">Contato</a></li>
                               
                        </ul>

                  </nav>
            </div>
            
            <div class="conteudo"> <!-- Centralizar tudo aq -->
                  <h1>Diagrama</h1>
                  <h2>Crie diagramas que o ajudarão a tomar as decisões importantes</h2>
                  <br>
                   
                  
                  <h3>  </h3>
                  <a class="botao" href="cadastrarObjetivo.php">Comece a criar!</a>

                  
    
             </div>
             <div class="rodape">
                  
                  <a class = "canto" href="../Controller/logout.php">Logout</a>
             </div>
    
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

            

      </body>
</html>

<?php 
}
else {
      header('Location: index.php');
      exit();
}


 ?>