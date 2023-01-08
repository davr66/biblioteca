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
                        Editar Autor
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('authors-update', ['id' => $authors->cod_author]) }}">
                            @csrf
                            @method('PUT')
                            {{-- NOME --}}
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input id="nome" name="nome" type="text"
                                    value="{{ $authors->nome }}"class="form-control" />
                                {{-- SOBRENOME --}}
                                <label for="sobrenome">Sobrenome:</label>
                                <input id="sobrenome" name="sobrenome" type="text"
                                    value="{{ $authors->sobrenome }}"class="form-control" />
                            </div>
                            <br>
                            {{-- BOTÃO DE ATUALIZAR --}}
                            <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                            {{-- BOTÃO PARA VOLTAR --}}
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
