@extends('template')

@section('conteudo')
<h1>Compras do cliente {{ $cliente->nome }}</h1>
@if (count($cliente->vendas) > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID Compra</th>
            <th>Valor</th>
            <th>Produto</th>
            <th>Vendedor</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cliente->vendas as $v)
		<tr>
			<td>{{ $v->id }}</td>
            <td>{{ $v->valor }}</td>
            <td>{{ $v->descricao }}</td>
			<td>{{ $v->id_usuario }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<div class="alert alert-danger">Cliente não possui Compras.</div>
@endif
@endsection