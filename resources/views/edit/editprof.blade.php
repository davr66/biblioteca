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
                    Editar Professor
                 </div>
                 <div class="card-body">
                     <form method="post" action="{{ route('profs-update', ['id'=> $profs->cod_prof]) }}">
                         <div class="form-group">
                             @csrf
                             @method('PUT')
                             <label for="nome">Nome Completo:</label>
                             <input id="nome" name="nome" type="text" value="{{ $profs->nome }}"class="form-control" />
                         </div>
                         <br>
                         <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
