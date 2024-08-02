<?php 
	try{
		$db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8','php','123456789');

		// var_dump($db); //teste se conexão com o banco deu certo: Se sim saida = object(PDO)#1 (0) { } se não pagina em branco
		}

		catch(Exception $erro){
			echo $erro->getMessage();

			echo " <br> <br> aconteceu um erro ";
		}
	 ?>