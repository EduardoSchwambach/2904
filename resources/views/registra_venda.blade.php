@extends('template')

@section('conteudo')
<h1>Informe os dados da venda abaixo</h1>

<form method="post" action="{{ route('venda_add') }}">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Descrição</label>
      <input type="text" class="form-control" name="descricao" placeholder="Descrição">
    </div>
    <div class="form-group col-md-6">
      <label for="valorTotal">Valor Total</label>
      <input type="number" step="0.01" class="form-control" name="valorTotal" placeholder="Valor">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cliente">Cliente</label>
      <select name="id_cliente" class="form-control">
      <option selected>Selecione o Cliente</option>
      @foreach ($cs as $c)  
        <option value={{ $c->id }}>{{ $c->nome }} </option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="vendedor">Vendedor</label>
      <select name="id_usuario" class="form-control">
        <option selected>Selecione o Vendedor</option>
        @foreach ($us as $u)  
        <option value= {{ $u->id }} >{{ $u->nome }} </option>
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
  
</form>
@endsection