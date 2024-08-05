<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Conexao.php";

session_start();

// Processar o formulário de login
if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: index.php?error=User Name is Required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Password is Required");
        exit();
    }

    // Preparar e executar a consulta usando PDO
    $sql = "SELECT * FROM usuario WHERE nome = :username AND senha = :password";
    $stmt = $db->prepare($sql); // Use a variável $db do arquivo de conexão
    $stmt->execute(['username' => $username, 'password' => $password]);

    if ($stmt->rowCount() === 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['nome'] === $username && $row['senha'] === $password) {
            echo "Login successful";

            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            header("Location: ../view/homepage.php");
            exit();
        } else {
            header("Location: index.php?error=Incorrect Username or Password");
            exit();
        }
    } else {
        header("Location: index.php?error=Incorrect Username or Password");
        exit();
    }
}
?>
