@extends('template')

@section('conteudo')
<h1>Cadastro de Cliente</h1>
<form method="post" action="{{ route('cliente_add') }}">
	@csrf
	<input type="text" class="form-control" name="nome" placeholder="Nome">
	<input type="text" class="form-control" name="endereco" placeholder="Endereco">
	<input type="submit" class="btn btn-success" value="Cadastrar">
</form>
@endsection