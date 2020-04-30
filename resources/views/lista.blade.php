@extends('template')

@section('conteudo')
<h1>Lista de usuários</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Login</th>
			<th>Operações</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($us as $u)
		<tr>
			<td>{{ $u->id }}</td>
			<td>{{ $u->nome }}</td>
			<td>{{ $u->login }}</td>
			<td>
				<a class="btn btn-warning" href="{{ route('usuario_update', [ 'id' => $u->id ]) }}">Alterar</a>
				<a class="btn btn-danger" href="#" onclick="exclui({{$u->id}})">Excluir</a>
				<a class="btn btn-info" href="{{ route('vendas_usuario', ['id' => $u->id]) }}">Vendas</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<a class="btn btn-primary" href="{{ route('usuario_cadastro') }}">Cadastrar novo</a>

<script>
	function exclui(id){
		if (confirm("Deseja excluir o usuário de id: " + id + "?")){
			location.href = "/usuario/excluir/" + id;
		}
	}
</script>
@endsection
