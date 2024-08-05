<?php
include "Conexao.php";

session_start();





// Processar o formulário de login
if (isset($_POST['username'] && isset ($_POST['password']){
    function validate($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return data;
    }
}

$username = validate($_POST['username']);
$password = validate($_POST['password']);

if(empty($username)){
    header ("Location: index.php?error=User Name is Required");
    exit();

}else if(empty($password)){
    header ("Location: index.php?error=Password Name is Required");
    exit();
}

$sql = "SELECT * FROM usuario WHERE nome = '$username' AND senha = '$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) === 1 {
    $row = mysqli_fetch_assoc($result);
    if($row['nome'] === $username && $row['senha'] === $password ){
        echo "Login in ";

        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        header(../view/homepage.php);
        exit();

    }
    else{
        header("Location: index.php?error=Incorrect Username or Password");
        exit();
    }
}
    else{
        header("Location: index.php");
        exit();
    }


  
?>