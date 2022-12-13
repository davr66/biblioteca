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
                    Editar Autor
                 </div>
                 <div class="card-body">
                     <form method="post" action="{{ route('authors-update', ['id'=> $authors->cod_author]) }}">
                         <div class="form-group">
                             @csrf
                             @method('PUT')
                             <label for="nome">Nome:</label>
                             <input id="nome" name="nome" type="text" value="{{ $authors->nome }}"class="form-control" />
                             <label for="sobrenome">Sobrenome:</label>
                             <input id="sobrenome" name="sobrenome" type="text" value="{{ $authors->sobrenome }}"class="form-control" />
                         </div>
                         <br>
                         <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                         <div class="flex justify-content-lg-end">
                            <a href="{{ route('authors-index') }}" class="btn btn-primary">Voltar</a>
                        </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
