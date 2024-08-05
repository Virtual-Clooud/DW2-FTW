<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="../Controller/Login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) {?>
			<p class="error"><?php echo $_GET['error'];?> </p>
		<?php } ?>
		<label> Usuário </label>
		<input type="text" name="username" placeholder="Usuário"><br>
		<label>Senha</label>
		<input type="password" name="password" placeholder="password"><br>

		<button type="submit">Login</button>
		 
		
	</form>

</body>
</html>