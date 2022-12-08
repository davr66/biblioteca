@extends('layouts.main')

@section('título','CDDs')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-auto">
      <table class="table table-responsive" border="1">
    <tr>
        <th>Código</th>
        <th>Assunto</th>
    </tr>
@foreach ($cdds as $cdd)
<tr>
    <td width='800px'>{{ $cdd->cod_cdd}}</td>
    <td width='800px'>{{ $cdd->assunto}}</td>
</tr>
@endforeach
    </table>
    </div>
</div>

@endsection
