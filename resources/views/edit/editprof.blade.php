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
                             <label for="nome">Nome:</label>
                             <input id="nome" name="nome" type="text" value="{{ $profs->nome }}"class="form-control" />
                         </div>
                         <br>
                         <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                         <div class="flex justify-content-lg-end">
                            <a href="{{ route('profs-index') }}" class="btn btn-primary">Voltar</a>
                        </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
