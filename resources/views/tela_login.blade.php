<!DOCTYPE html>
<html>
<head>
	<title>Sistema - Programação Web</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<nav class="navbar-expand-lg navbar navbar-dark bg-dark w-100">
			  <a class="navbar-brand" href="{{ route('tela_login') }}">Seja Bem Vindo</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  </div>
			</nav>
		</div>
		<div class="row">
			<div class="col-md-2">
				<!-- coluna vazia esquerda -->
			</div>
			<div class="col-md-8 mt-3">
			<h1>Login</h1>
	
			<form method="post" action="{{ route('logar') }}">
				@csrf
				<input type="text" name="login" placeholder="Login">
				<input type="password" name="senha" placeholder="Senha">
				<button type="submit" class="btn btn-primary">Entrar</button>
			</form>
			</div>
			<div class="col-md-2">
				<!-- coluna vazia direita -->
			</div>
	</div>
				  
	
</body>
</html>
