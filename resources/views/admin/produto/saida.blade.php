@extends('admin/layouts/default')

@section('titulo')
Adicionar Saida de EPI
@stop


@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('conteudo')
<form  class="form-horizontal" role="form" method="POST" action="{{ route('epis.storeSaida',$produto->id) }}">

  <input type="hidden" name="id" id="id" value="{{ $produto->id }}">
  <input type="hidden" name="max" id="max" value="{{ $produto->qntd }}">
  <div class="text-center">
    <h2>{{ $produto->nome }}</h2>
    <p>
      <strong>Tamanho :</strong> {{ $produto->medida }}<br>
      <strong>CA :</strong> {{ $produto->ca }}<br>
      <strong>Categoria :</strong> {{ $produto->categoria->nome }}<br>
      <strong>Estoque : <span style="color:red">{{ $produto->qntd }}</span> </strong><br>
    </p>
  </div>

  <div class="form-group">
    <label class="control-label col-md-2" for="funcionario">Funcionario :</label>
    <div class="col-md-6">
      <select name="funcionario" class="form-control">
      @if(count($funcionarios) > 0)
        @foreach($funcionarios as $funcionario)
          <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
        @endforeach
      @else
        <option value="0">Selecione um funcionario</option>
      @endif
      </select>
    </div>          
  </div>

  <div class="form-group">
    <label class="control-label col-md-2" for="qntd">Quantidade :</label>
    <div class="col-md-6">
    <input type="number" class="form-control" name="qntd" min="1" id="qntd">
    </div>          
  </div>




  <div class="form-group">
    <label class="control-label col-md-2" for="data">Data de Entrada :</label>
    <div class="col-md-6">
    <input type="text" class="form-control data-picker" name="data" id="data">
    </div>          
  </div>
  <a class="btn btn-danger" href="{{route('epis.index')}}">
    Cancelar
  </a>
  <button type="submit" class="btn btn-success">
    Adicionar
  </button>  

</form>
@stop
@section('script')
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>
@stop
