@extends('layouts.main')

@section('título', 'Cadastro de Editora')

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
                        Adicionar Editora
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('editoras-cad.add') }}">
                            @csrf
                            {{-- NOME --}}
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input id="nome" name="nome" type="text" class="form-control" />
                            </div>
                    </div>
                    <br>
                    {{-- BOTÃO PARA ADICIONAR --}}
                    <button type="submit" class="btn btn-primary">Adicionar</button>
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
