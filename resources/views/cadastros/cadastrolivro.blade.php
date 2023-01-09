@extends('layouts.main')

@section('título', 'Cadastro de Livro')

@section('conteudo')
    {{-- STYLE TEMPORÁRIO (REMOVER DEPOIS) --}}
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
                            @csrf
                            {{-- TÍTULO --}}
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input id="titulo" name="titulo" type="text" class="form-control" />
                            </div>
                            <br>
                            {{-- AUTOR --}}
                            <div class="form-group">
                                <label for="cod_author">Autor:</label>
                                <select name="cod_author" id="cod_author" class="form-select">
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->cod_author }}">{{ $author->nome }}
                                            {{ $author->sobrenome }}</option>
                                    @endforeach
                                </select>
                                {{-- SELECT2 AUTORES --}}
                                <script>
                                    $('#cod_author').select2();
                                </script>
                            </div>
                            <br><br>
                            {{-- PUBLICAÇÃO --}}
                            <div class="form-group">
                                <label for="publi">Publicação:</label>
                                <input id="publi" name="publi" type="text" class="form-control" />
                            </div>
                            {{-- AQUISIÇÃO --}}
                            <div class="form-group">
                                <label for="aquis">Aquisição:</label>
                                <input id="aquis" name="aquis" type="text" class="form-control" />
                            </div>
                            {{-- EX. --}}
                            <div class="form-group">
                                <label for="ex">Ex.:</label>
                                <input id="ex" name="ex" type="number" class="form-control" />
                                <select name="auto" id="auto" class="form-select">
                                    <option value="1">Automatização ativada</option>
                                    <option value="0">Automatização desativada</option>
                                </select>
                            </div>
                            <br>
                            {{-- VOL. --}}
                            <div class="form-group">
                                <label for="vol">Vol.:</label>
                                <input id="vol" name="vol" type="number" class="form-control" />
                            </div>
                            <br>
                            {{-- ASSUNTO --}}
                            <div class="form-group">
                                <label for="cod_cdd">CDD (Assunto):</label>
                                <select name="cod_cdd" id="cod_cdd" class="form-select">
                                    @foreach ($cdds as $cdd)
                                        <option value="{{ $cdd->cod_cdd }}">{{ $cdd->assunto }}</option>
                                    @endforeach
                                </select>
                                {{-- SELECT2 ASSUNTOS --}}
                                <script>
                                    $('#cod_cdd').select2();
                                </script>
                            </div>
                            <br>
                            <br>
                            {{-- EDITORA --}}
                            <div class="form-group">
                                <label for="cod_edi">Editora:</label>
                                <select name="cod_edi" id="cod_edi" class="form-select">
                                    @foreach ($editoras as $editora)
                                        <option value="{{ $editora->cod_edi }}">{{ $editora->nome }}</option>
                                    @endforeach
                                </select>
                                {{-- SELECT2 EDITORAS --}}
                                <script>
                                    $('#cod_edi').select2();
                                </script>
                            </div>
                            <br><br>
                            {{-- LOCAL --}}
                            <div class="form-group">
                                <label for="local">Local:</label>
                                <input id="local" name="local" type="text" class="form-control" />
                            </div>

                    </div>
                </div>
                <br>
                {{-- BOTÃO PARA ADICIONAR --}}
                <button type="submit" class="btn btn-primary">Adicionar</button>
                {{-- BOTÃO PARA VOLTAR --}}
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
