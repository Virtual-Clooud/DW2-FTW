<?php 
      session_start();

      if(isset($_SESSION['id']) && isset($_SESSION['nome'])) {

?>

<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>HOME</title>
      </head>
      <body>
            <h3>Olá, <?php echo $_SESSION['nome']; ?></h1>
            <div style="width:800px; margin:0 auto; text-align: center;"><!-- Centralizar tudo aq -->
                  <h1>Diagrama</h1>
                  <h2>Crie diagramas que o ajudarão á tomar as decisões importantes</h2>
                  <br>
                  <br>
                  <br>
                  <br> 
                  <br><br><br><br>
                  <h3> Comece a criar! </h3>
                  <button type="button">Click Me!</button>
    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

            <a href="../Controller/logout.php">Logout</a>

      </body>
</html>

<?php 
}
else {
      header('Location: index.php');
      exit();
}


 ?>