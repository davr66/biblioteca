@extends('layouts.main')

@section('título', 'CDDs')

@section('conteudo')
    <div class="row justify-content-center">
        {{-- TABELA DE ASSUNTOS --}}
        <table class="table table-responsive">
            <thead class="categoria">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Assunto</th>
                </tr>
            </thead>
            <tbody class="cateNome">
                @foreach ($cdds as $cdd)
                    <tr>
                        <td>{{ $cdd->cod_cdd }}</td>
                        <td>{{ $cdd->assunto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
