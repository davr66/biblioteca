@extends('layouts.main')

@section('título','Cadastro de Editora')

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
                    Adicionar Editora
                 </div>
                 <div class="card-body">
                     <form method="post" action="{{ route('editoras-cad.add') }}">
                         <div class="form-group">
                             @csrf
                             <label for="nome">Nome:</label>
                             <input id="nome" name="nome" type="text" class="form-control" />
                         </div>
                         <br>
                         <button type="submit" class="btn btn-primary">Adicionar</button>
                         <div class="flex justify-content-lg-end">
                            <a href="{{ route('editoras-index') }}" class="btn btn-primary">Voltar</a>
                        </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection