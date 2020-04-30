@extends('template')

<style>
    .card-img-top{
        width:30%;
        height:16rem;
    }
    .card{
        margin:10%;
    }
    </style>
@section('esquerda')
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/11/11/10/31/guard-1816311_960_720.jpg" class="img-fluid" alt="Imagem responsiva">
  <div class="card-body">
    <h5 class="card-title">Novo Usuario</h5>
        <p class="card-text">Aqui você pode cadastrar um novo agen...usuario, deseja inserir um novo integrante?</p>
    <a href="{{ route('usuario_cadastro') }}" class="btn btn-primary">Cadastrar</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://cdn.pixabay.com/photo/2015/10/31/12/30/james-bond-1015580_960_720.jpg" class="img-fluid" alt="Imagem responsiva">
  <div class="card-body">
    <h5 class="card-title">Listar Usuarios</h5>
        <p class="card-text">Aqui esta a lista de todos os usuarios onde é possivel, alterar exluir e cadastrar um novo.</p>
    <a href="{{ route('listar') }}" class="btn btn-primary">Listar usuarios</a>
  </div>
</div>
@endsection

@section('centro')
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/12/20/05/24/store-1919713_960_720.png" class="img-fluid" alt="Imagem responsiva">
        <div class="card-body">
            <h5 class="card-title">Registrar venda</h5>
                <p class="card-text">Aqui é possivel preencher os dados da sua venda inserindo cliente, produto, valor e vendedor.</p>
            <a href="{{ route('registro') }}" class="btn btn-primary">Registrar</a>
        </div>
</div>
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2017/11/10/04/47/list-2935366_960_720.png" class="img-fluid" alt="Imagem responsiva">
        <div class="card-body">
            <h5 class="card-title">Listar Clientes</h5>
                <p class="card-text">Aqui esta a lista de todos os clientes onde é possivel, alterar exluir e cadastrar um novo.</p>
            <a href="{{ route('listarCliente') }}" class="btn btn-primary">Lista clientes</a>
        </div>
</div>
@endsection

@section('direita')
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/04/25/21/14/woman-1353211_960_720.png" class="img-fluid" alt="Imagem responsiva">
        <div class="card-body">
            <h5 class="card-title">Novo cliente</h5>
                <p class="card-text">Deseja cadastrar um novo cliente em nossa base de dados, ele pode ser usado no registro de venda.</p>
            <a href="{{ route('cliente_cadastro')}}" class="btn btn-primary">Cadastrar</a>
        </div>
</div>
@endsection
