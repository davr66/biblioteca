@extends('layouts.main')

@section('título', 'Livros')

@section('conteudo')



    <div class="">
        <form action="{{ route('livros-index') }}" method="GET">
            <div class="filtro">

                {{-- Filtro de autores --}}
                <select name="cod_author" id="cod_author">
                    <option value="" selected>Filtrar por Autor(a)</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->cod_author }}">{{ $author->nome }}
                            {{ $author->sobrenome }}</option>
                    @endforeach
                </select>
                {{-- SELECT2 AUTORES --}}
                <script>
                    $('#cod_author').select2();
                </script>

                {{-- Filtro de disponibilidade --}}
                <select name="disponivel" id="disponivel">
                    <option value="" selected>Filtrar por Disponibilidade</option>
                    <option value="disponivel">Disponível</option>
                    <option value="emprestado">Emprestado</option>
                </select>

                {{-- Filtro de Assuntos --}}
                <select name="cod_cdd" id="cod_cdd">
                    <option value="" selected>Filtrar por assunto</option>
                    @foreach ($cdds as $cdd)
                        <option value="{{ $cdd->cod_cdd }}">{{ $cdd->assunto }}</option>
                    @endforeach
                </select>
                {{-- SELECT2 ASSUNTOS --}}
                <script>
                    $('#cod_cdd').select2();
                </script>

                {{-- Filtro de título --}}
                <label for='titulo'>Título</label>
                <input type="text" name="titulo" id="titulo">

            </div>

            {{-- Botões de Pesquisa --}}
            <div class="flex justify-content-lg-end upper align-right">
                <a href="{{ route('livros-index') }}" class="btn">Exibir Todos</a>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>

        <hr>
        {{-- BOTÃO PARA ADICIONAR LIVRO --}}
        <div class="flex justify-content-lg-end upper">
            <a href="{{ route('livros-cad') }}" class="btn btn-primary">Adicionar livro</a>
        </div>
        {{-- TABELA DE LIVROS --}}
        <table class="table table-responsive">
            <thead class="categoria">
                <tr>
                    <th scope="col">Num. Registro</th>
                    <th scope="col">Data Reg.</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Publicação</th>
                    <th scope="col">Aquisição</th>
                    <th scope="col">Editora</th>
                    <th scope="col">Ex.</th>
                    <th scope="col">Vol.</th>
                    <th scope="col">CDD</th>
                    <th scope="col">Disponível</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody class="cateNome">
                @foreach ($livros as $livro)
                    <tr>
                        <td width="10px">{{ $livro->num_reg }}</td>
                        <td>{{ date('d/m/y', strtotime($livro->data_reg)) }}</td>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ strtoupper($livro->authors->sobrenome) }},{{ $livro->authors->nome }}</td>
                        <td>{{ $livro->publi }}</td>
                        <td>{{ $livro->aquis }}</td>
                        <td>{{ $livro->editoras->nome }}</td>
                        <td>{{ $livro->ex }}</td>
                        <td>{{ $livro->vol }}</td>
                        <td>{{ $livro->cod_cdd }}</td>
                        @if ($livro->disponivel)
                            <td>Sim</td>
                        @else
                            <td>Não</td>
                        @endif
                        {{-- BOTÕES DE ATUALIZAR/DELETAR --}}
                        <td class="d-flex">
                            <!-- ATUALIZAR -->
                            <a href="{{ route('livros-edit', ['id' => $livro->num_reg]) }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                            <!-- DELETAR -->
                            <form action="{{ route('livros-destroy', ['id' => $livro->num_reg]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Você tem certeza?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
