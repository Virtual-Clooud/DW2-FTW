<?php 
if($_SESSION['login']->usuarios_nivel == 1){

?>
<h1>Página Administrativa</h1>

<?php 
print_r($_SESSION['login']);
?>

<?php 
}else{
    header('Location: index.php?p=login');
}
?>