@extends('layouts.main')

@section('título', 'Cadastro de Alunos')

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
                        Adicionar Aluno
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('alunos-cad.add') }}">
                            @csrf
                            {{-- NOME --}}
                            <div class="form-group">
                                <label for="nome">Nome Completo:</label>
                                <input id="nome" name="nome" type="text" class="form-control" />
                            </div>
                            {{-- CELULAR --}}
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input id="celular" maxLength="15" name="celular" type="text" class="form-control" />
                            </div>
                            {{-- SÉRIE --}}
                            <div class="form-group">
                                <label for="num_serie">Série:</label>
                                <select name="num_serie" id="num_serie" class="form-select">
                                    @foreach ($series as $serie)
                                        <option value="{{ $serie->cod_serie }}">{{ $serie->num_serie }} ,
                                            {{ $serie->curso }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <br>
                    <div class="alinhamento">

                        {{-- BOTÃO PARA ADICIONAR --}}
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                        {{-- BOTÃO PARA VOLTAR --}}
                        <div class="flex justify-content-lg-end">
                            <a href="{{ route('alunos-index') }}" class="btn-red">Voltar</a>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
