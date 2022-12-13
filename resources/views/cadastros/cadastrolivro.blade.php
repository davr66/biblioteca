@extends('layouts.main')

@section('título','Cadastro de Livro')

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
                    Adicionar Livro
                 </div>
                 <div class="card-body">
                     <form method="post" action="{{ route('livros-cad.add') }}">
                         <div class="form-group">
                             @csrf
                             <label for="titulo">Título:</label>
                             <input id="titulo" name="titulo" type="text" class="form-control" />
                            <br>
                             <label for="cod_author">Autor:</label>
                                <select name="cod_author" id="cod_author" class="form-select">
                            @foreach ( $authors as $author )
                                <option value="{{ $author->cod_author}}">{{ $author->nome }} {{ $author->sobrenome }}</option>
                            @endforeach
                                </select>

                                <script>
                                    $('#cod_author').select2();
                                </script>
                                <br><br>

                             <label for="publi">Publicação:</label>
                             <input id="publi" name="publi" type="text" class="form-control" />

                             <label for="aquis">Aquisição:</label>
                             <input id="aquis" name="aquis" type="text" class="form-control" />

                             <label for="ex">Ex.:</label>
                             <input id="ex" name="ex" type="number" class="form-control" />

                             <label for="vol">Vol.:</label>
                             <input id="vol" name="vol" type="number" class="form-control" />
                            <br>
                             <label for="cod_cdd">CDD (Assunto):</label>
                             <select name="cod_cdd" id="cod_cdd" class="form-select">
                         @foreach ( $cdds as $cdd )
                             <option value="{{ $cdd->cod_cdd}}">{{ $cdd->assunto }}</option>
                         @endforeach
                             </select>

                             <script>
                                 $('#cod_cdd').select2();
                             </script>
                            <br>
                            <br>
                             <label for="cod_edi">Editora:</label>
                             <select name="cod_edi" id="cod_edi" class="form-select">
                         @foreach ( $editoras as $editora )
                             <option value="{{ $editora->cod_edi}}">{{ $editora->nome }}</option>
                         @endforeach
                             </select>

                             <script>
                                 $('#cod_edi').select2();
                             </script>
                            <br>
                            <br>
                            <label for="local">Local:</label>
                            <input id="local" name="local" type="text" class="form-control" />

                         </div>
                         </div>
                         <br>
                         <button type="submit" class="btn btn-primary">Adicionar</button>
                         <div class="flex justify-content-lg-end">
                            <a href="{{ route('livros-index') }}" class="btn btn-primary">Voltar</a>
                         </div>
                        </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection
