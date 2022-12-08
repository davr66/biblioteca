@extends('layouts.main')

@section('título','Livros')

@section('conteudo')
<style>
    .uper {
        margin-top: 40px;
    }
    .bottom {
        margin-bottom: 20px;
    }
 </style>
<div class="row justify-content-center">
    <div class="row">
        <div class="">
            <h2 class="uper bottom">Listagem de Livros</h2>
        </div>
      <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col">Num. Registro</th>
                <th scope="col">Data Reg.</th>
                <th scope="col">Título</th>
                <th scope="col">Publicação</th>
                <th scope="col">Aquisição</th>
                <th scope="col">Ex.</th>
                <th scope="col">Vol.</th>
                <th scope="col">Disponível</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
            <tr>
                <td width="100px">{{ $livro->num_reg}}</td>
                <td width="800px">{{ $livro->data_reg}}</td>
                <td width="800px">{{ $livro->nome}}</td>
                <>
                <td width="800px">
                    <a href="{{ route('livros-edit',['id' => $livro->num_reg]) }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="flex justify-content-lg-end">
        <a href="{{ route('livros-cad') }}" class="btn btn-primary">Adicionar livro</a>
    </div>
    </div>
</div>
@endsection
