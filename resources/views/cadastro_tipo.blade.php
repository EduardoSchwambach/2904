@extends('template')

@section('conteudo')
<h1>Informe os dados produto abaixo</h1>

<form method="post" action="{{ route('produto_add') }}">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" placeholder="Nome">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label>Descrição</label>
      <input type="text" class="form-control" name="descricao" placeholder="Descrição">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
  
</form>
@endsection