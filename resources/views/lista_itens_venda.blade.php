@extends('template')

@section('conteudo')
<h1>Itens da Venda #{{ $venda->id }}</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID Item</th>
			<th>Nome</th>
			<th>Quantidade</th>
			<th>Valor unitário</th>
			<th>Subtotal</th>
			<th>Data</th>
			<th>Operações</th>
		</tr>
	</thead>
	<tbody>
		@foreach($venda->produtos as $p)
		<tr>
			<td>{{ $p->pivot->id }}</td>
			<td>{{ $p->nome }}</td>
			<td>{{ $p->pivot->quantidade }}</td>
			<td>{{ $p->preco }}</td>
			<td>{{ $p->pivot->subtotal }}</td>
			<td>{{ $p->pivot->created_at }}</td>
			<td></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection