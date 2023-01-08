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
                        Editar Editora
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('editoras-update', ['id' => $editoras->cod_edi]) }}">
                            @csrf
                            @method('PUT')
                            {{-- NOME --}}
                            <div class="form-group">
                                <label for="nome">Nome: </label>
                                <input id="nome" name="nome" type="text"
                                    value="{{ $editoras->nome }}"class="form-control" />
                            </div>
                            <br>
                            {{-- BOTÃO DE ATUALIZAR --}}
                            <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                            {{-- BOTÃO PARA VOLTAR --}}
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
