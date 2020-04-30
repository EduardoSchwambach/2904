@extends('template')

@section('conteudo')
<h1>Lista de Cliente</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Endereco</th>
			<th>Operações</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($us as $u)
		<tr>
			<td>{{ $u->id }}</td>
			<td>{{ $u->nome }}</td>
			<td>{{ $u->endereco }}</td>
			<td>
				<a class="btn btn-warning" href="{{ route('cliente_update', [ 'id' => $u->id ]) }}">Alterar</a>
				<a class="btn btn-danger" href="#" onclick="exclui({{$u->id}})">Excluir</a>
				<a class="btn btn-info" href="{{ route('compras_cliente', ['id' => $u->id]) }}">Compras</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<a class="btn btn-primary" href="{{ route('cliente_cadastro') }}">Cadastrar novo</a>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o usuário de id: " + id + "?")){
			location.href = "/cliente/excluir/" + id;
		}
	}
</script>
@endsection
