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
    <div class="form-row">
    <div class="form-group col-md-6">
      <label>Descrição</label>
      <input type="text" class="form-control" name="descricao" placeholder="Descrição">
    </div>
    <div class="form-group col-md-6">
      <label for="preco">Preço</label>
      <input type="number" step="0.01" class="form-control" name="preco" placeholder="Preço">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="tipo">Tipo do produto</label>
      <select name="tipo_produto" class="form-control">
      <option selected>Selecione o tipo do produto</option>
      @foreach ($tp as $c)  
        <option value={{ $-t>id }}>{{ $t->nome }} </option>
        @endforeach
      </select>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cliente">Unidade de Venda</label>
      <select name="unidade" class="form-control">
      <option selected>UN</option>
      <option selected>PC</option>
      <option selected>KG</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
  
</form>
@endsection