@extends('layouts.main')

@section('título', 'Edição')

@section('conteudo')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card-uper">
                    <div class="card-header">
                        Editar aluno
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('alunos-update', ['id' => $alunos->cod_aluno]) }}">
                            @csrf
                            @method('PUT')
                            {{-- NOME COMPLETO --}}
                            <div class="form-group">
                                <label for="nome">Nome Completo:</label>
                                <input id="nome" name="nome" type="text"
                                    value="{{ $alunos->nome }}"class="form-control" />
                            </div>
                            {{-- CELULAR --}}
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input id="celular" name="celular" type="text" value="{{$alunos->celular}}"class="form-control" />
                            </div>
                            {{-- SÉRIE --}}
                            <div class="form-group">
                                <label for="num_serie">Série:</label>
                                <select name="num_serie" id="num_serie" class="form-select">
                                    <option value="{{ $alunos->cod_serie }}">{{ $alunos->series->num_serie }} ,
                                        {{ $alunos->series->curso }}</option>
                                    @foreach ($series as $serie)
                                        <option value="{{ $serie->cod_serie }}">{{ $serie->num_serie }} ,
                                            {{ $serie->curso }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            {{-- BOTÃO PARA ATUALIZAR --}}
                            <input type="submit" name="submit" class="btn btn-primary" value="Atualizar">
                            {{-- BOTÃO PARA VOLTAR --}}
                            <div class="flex justify-content-lg-end">
                                <a href="{{ route('alunos-index') }}" class="btn btn-primary">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
