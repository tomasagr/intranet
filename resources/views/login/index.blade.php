<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Summit Intranet | Login</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body id="login" class="background-login">
	<div class="login-container">
		<a href="/login" class="logo-login-wrapper">
			<img src="/images/logo.png" alt="">
		</a>
		<p class="default-text">Ingrese sus datos de usuario para ingresar al sistema</p>
		<form action="/home">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Nombre">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Password">
			</div>
			<div class="button-send">
				<button class="btn btn-warning danger-alternative">ENVIAR</button>
			</div>
		</form>
		<p class="default-text">Si aún no tienes cuenta, registrate haciendo <a href="/register">click aquí</a></p>

		<p class="default-text copy">© Copyright Summit Agro 2017</p>
	</div>
	<script src="/js/app.js"></script>
</body>
</html>