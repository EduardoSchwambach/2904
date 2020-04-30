@extends('template')

@section('conteudo')
<h1>Alteração de usuário</h1>
<form method="post" action="{{ route('usuario_alterar', ['id' => $u->id]) }}">
	@csrf
	<input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $u->nome }}">
	<input type="text" class="form-control" name="login" placeholder="Login" value="{{ $u->login }}">
	<input type="password" class="form-control" name="senha" placeholder="Senha" value="{{ $u->senha }}">
	<input type="submit" class="btn btn-success" value="Cadastrar">
</form>
@endsection