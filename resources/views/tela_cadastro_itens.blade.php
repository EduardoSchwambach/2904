@extends('template')

@section('conteudo')
<h1>Cadastro de itens de Venda #{{ $venda->id }}</h1>
<form method="post" action="{{ route('vendas_item_add', ['id' => $venda->id]) }}">
	@csrf
	<select name="id_produto" class="form-control">
		@foreach ($produtos as $p)
		<option value="{{ $p->id }}">{{ $p->nome }}</option>
		@endforeach
	</select>
	<input type="number" name="quantidade" class="form-control" min="0" step="0.01">
	<input type="submit" class="btn btn-success" value="Cadastrar">
</form>

<h2 class="mt-4">Itens adicionados até o momento</h2>
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
			<td><a href="#" class="btn btn-danger" onclick="exclui({{
				$p->id }})">Remover</a></td>
		</tr>
		@endforeach
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><b>Total:</b></td>
			<td><b>{{ $venda->valor }}</b></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>

<a class="btn btn-primary" href="{{ route('venda_listar') }}">Fechar venda</a>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o item de id: " + id + "?")){
			location.href = "/venda/{{ $venda->id }}/itens/remover/" + id;
		}
	}
</script>
@endsection