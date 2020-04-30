@extends('template')

@section('conteudo')
<h1>Alteração de cliente</h1>
<form method="post" action="{{ route('cliente_alterar', ['id' => $u->id]) }}">
	@csrf
	<input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $u->nome }}">
	<input type="text" class="form-control" name="endereco" placeholder="Endereco" value="{{ $u->endereco }}">
	<input type="submit" class="btn btn-success" value="Salvar">
</form>
@endsection