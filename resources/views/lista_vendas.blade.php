@extends('template')

@section('conteudo')
<h1>Vendas do usuário {{ $usuario->nome }}</h1>
@if (count($usuario->vendas) > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID Venda</th>
			<th>Valor</th>
			<th>Produto</th>
		</tr>
	</thead>
	<tbody>
		@foreach($usuario->vendas as $v)
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->valor }}</td>
			<td>{{ $v->descricao }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<div class="alert alert-danger">Usuário não possui vendas.</div>
@endif
@endsection