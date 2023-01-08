@extends('layouts.main')

@section('título', 'CDDs')

@section('conteudo')
    <div class="">
        {{-- TABELA DE ASSUNTOS --}}
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Assunto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cdds as $cdd)
                    <tr>
                        <td width='100px'>{{ $cdd->cod_cdd }}</td>
                        <td width='500px'>{{ $cdd->assunto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
