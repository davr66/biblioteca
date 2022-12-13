@extends('layouts.main')

@section('título','Edição')

@section('conteudo')
<style>
    .uper {
        margin-top: 40px;
    }
 </style>

 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-11">
             <div class="card uper">
                 <div class="card-header">
                    Editar aluno
                 </div>
                 <div class="card-body">
                     <form method="post" action="{{ route('alunos-update', ['id'=> $alunos->cod_aluno]) }}">
                         <div class="form-group">
                             @csrf
                             @method('PUT')
                             <label for="nome">Nome Completo:</label>
                             <input id="nome" name="nome" type="text" value="{{ $alunos->nome }}"class="form-control" />
                         </div>
                         <div class="form-group">
                           <label for="celular">Celular:</label>
                             <input id="celular" name="celular" value="{{ $alunos->celular }}" type="tel" class="form-control" />
                         </div>
                         <div class="form-group">
                            <label for="num_serie">Série:</label>
                                <select name="num_serie" id="num_serie"  class="form-select">
                            @foreach ( $series as $serie )
                                <option value="{{ $serie->cod_serie}}">{{ $serie->num_serie }} , {{ $serie->curso }}</option>
                            @endforeach
                                </select>
                         </div>
                         <br>
                         <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                         <div class="flex justify-content-lg-end">
                            <a href="{{ route('alunos-index') }}" class="btn btn-primary">Voltar</a>
                        </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
