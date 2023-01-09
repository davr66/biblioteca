@extends('layouts.main')

@section('título', 'Edição')

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
                        Editar Livro
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('livros-update', ['id' => $livro->num_reg]) }}">
                            @csrf
                            @method('PUT')
                            {{-- TÍTULO --}}
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input id="titulo" name="titulo" type="text"
                                    value="{{ $livro->titulo }}"class="form-control" />
                            </div>
                            <br>
                            {{-- AUTOR --}}
                            <div class="form-group">
                                <label for="cod_author">Autor:</label>
                                <select name="cod_author" id="cod_author" class="form-select">
                                    <option value="{{ $livro->cod_author }}">{{ $livro->authors->nome }}
                                        {{ $livro->authors->sobrenome }}</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->cod_author }}">{{ $author->nome }}
                                            {{ $author->sobrenome }}</option>
                                    @endforeach
                                </select>

                                <script>
                                    $('#cod_author').select2();
                                </script>
                            </div>
                            <br><br>
                            {{-- PUBLICAÇÃO --}}
                            <div class="form-group">
                                <label for="publi">Publicação:</label>
                                <input id="publi" value="{{ $livro->publi }}" name="publi" type="text"
                                    class="form-control" />
                            </div>
                            {{-- AQUISIÇÃO --}}
                            <div class="form-group">
                                <label for="aquis">Aquisição:</label>
                                <input id="aquis" value="{{ $livro->aquis }}" name="aquis" type="text"
                                    class="form-control" />
                            </div>
                            {{-- EX. --}}
                            <div class="form-group">
                                <label for="ex">Ex.:</label>
                                <input id="ex" value="{{ $livro->ex }}" name="ex" type="number"
                                    class="form-control" />
                            </div>
                            {{-- VOL. --}}
                            <div class="form-group">
                                <label for="vol">Vol.:</label>
                                <input id="vol" name="vol" value="{{ $livro->vol }}" type="number"
                                    class="form-control" />
                            </div>
                            <br>
                            {{-- ASSUNTO --}}
                            <div class="form-group">
                                <label for="cod_cdd">CDD (Assunto):</label>
                                <select name="cod_cdd" id="cod_cdd" class="form-select">
                                    <option value="{{ $livro->cdds->cod_cdd }}">{{ $livro->cdds->assunto }}</option>
                                    @foreach ($cdds as $cdd)
                                        <option value="{{ $cdd->cod_cdd }}">{{ $cdd->assunto }}</option>
                                    @endforeach
                                </select>
                                {{-- SELECT2--}}
                                <script>
                                    $('#cod_cdd').select2();
                                </script>
                            </div>
                            <br><br>
                            {{-- EDITORA --}}
                            <div class="form-group">
                                <label for="cod_edi">Editora:</label>
                                <select name="cod_edi" id="cod_edi" class="form-select">
                                    <option value="{{ $livro->cod_edi }}">{{ $livro->editoras->nome }}</option>
                                    @foreach ($editoras as $editora)
                                        <option value="{{ $editora->cod_edi }}">{{ $editora->nome }}</option>
                                    @endforeach
                                </select>

                                <script>
                                    $('#cod_edi').select2();
                                </script>
                            </div>
                            <br><br>
                            {{-- LOCAL --}}
                            <div class="form-group">
                                <label for="local">Local:</label>
                                <input id="local" name="local" value="{{ $livro->local }}" type="text"
                                    class="form-control" />
                            </div>
                    </div>
                    <br>
                    {{-- BOTÃO DE ATUALIZAR --}}
                    <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                    {{-- BOTÃO DE VOLTAR --}}
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
