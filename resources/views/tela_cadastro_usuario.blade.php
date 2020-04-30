@extends('template')

@section('conteudo')
<h1>Cadastro de usuários</h1>
<form method="post" action="{{ route('usuario_add') }}">
	@csrf
	<input type="text" class="form-control" name="nome" placeholder="Nome">
	<input type="text" class="form-control" name="login" placeholder="Login">
	<input type="password" class="form-control" name="senha" placeholder="Senha">
	<input type="submit" class="btn btn-success" value="Cadastrar">
</form>
@endsection
