@extends('layouts.main')

@section('título','Cadastro de Professores')

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
                    Adicionar Professor
                 </div>
                 <div class="card-body">
                     <form method="post" action="{{ route('profs-cad.add') }}">
                         <div class="form-group">
                             @csrf
                             <label for="nome">Nome:</label>
                             <input id="nome" name="nome" type="text" class="form-control" />
                         </div>
                         <br>
                         
                         <div class="alinhamento">
                             <button type="submit" class="btn btn-primary">Adicionar</button>
                             <div class="flex justify-content-lg-end">
                                <a href="{{ route('profs-index') }}" class="btn-red">Voltar</a>
                             </div>
                         </div> 
                    </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
