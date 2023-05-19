@extends('layouts.main')

@section('título', 'Empréstimos')

@section('conteudo')

    <div class="row justify-content-center">
        <div class="row">
            <div class="">
                <form action="{{ route('emprestimos-index') }}" method="GET">
                    <div class="filtro">
                        {{-- Filtro de autores --}}
                        <select name="cod_aluno" id="cod_aluno">
                            <option value="" selected>Filtrar por Aluno(a)</option>
                            @foreach ($alunos as $aluno)
                                <option value="{{ $aluno->cod_aluno }}">{{ $aluno->nome }},
                                    {{ $aluno->series->num_serie }}-{{ $aluno->series->curso }}</option>
                            @endforeach
                        </select>
                        {{-- SELECT2 AUTORES --}}
                        <script>
                            $('#cod_aluno').select2();
                        </script>

                        <select name="meses" id="meses">
                            <option value="" selected>Todos os meses</option>
                            <option value="01">Janeiro</option>
                            <option value="02">Fevereiro</option>
                            <option value="03">Março</option>
                            <option value="04">Abril</option>
                            <option value="05">Maio</option>
                            <option value="06">Junho</option>
                            <option value="07">Julho</option>
                            <option value="08">Agosto</option>
                            <option value="09">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                    </div>

                    {{-- Botões de Pesquisa --}}
                    <div class="flex justify-content-lg-end upper align-right">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </form>
                @if ($mes)
                    <div class="">
                        <h2 class="uper bottom">Listagem de empréstimos de: {{ $mes }}</h2>
                    </div>
                @else
                    <div class="">
                        <h2 class="uper bottom">Listagem de empréstimos</h2>
                    </div>
                @endif
                {{-- BOTÃO PARA ADICIONAR EMPRÉSTIMO --}}
                <div class="flex justify-content-lg-end upper">
                    <a href="{{ route('emprestimos-cad') }}" class="btn btn-primary">Adicionar empréstimo</a>
                </div>
                {{-- TABELA DE EMPRÉSTIMOS --}}
                @if ($emprestimos)
                    <p class="upper bottom">Aluno: {{ $aluno->nome }}</p>
                    <p class="upper bottom">Série: {{ $aluno->series->num_serie }} - {{ $aluno->series->curso }}</p>
                    <p class="upper bottom">Celular: {{ $aluno->celular }}</p>
                    <br>
            </div>
            <table class="table table-responsive">
                <thead class="categoria">
                    <tr>
                        <th scope="col">Livro</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Feito/Renovado em:</th>
                        <th scope="col">Data de Retorno</th>
                        <th scope="col">Status</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody class="cateNome">
                    @foreach ($emprestimos as $emprestimo)
                        <tr>
                            <td>{{ $emprestimo->livros->titulo }}</td>
                            <td>{{ $emprestimo->profs->nome }}</td>
                            @if (strtotime($emprestimo->updated_at) == strtotime($emprestimo->created_at))
                                <td>{{ date('d/m/y', strtotime($emprestimo->data_emp)) }}</td>
                            @else
                                <td>{{ date('d/m/y', strtotime($emprestimo->updated_at)) }}</td>
                            @endif
                            <td>{{ date('d/m/y', strtotime($emprestimo->data_retorno)) }}</td>
                            @if ($emprestimo->status)
                                <td>OK</td>
                            @else
                                @if (strtotime(date('Y-m-d')) < strtotime($emprestimo->data_retorno))
                                    <td>Normal</td>
                                @elseif (strtotime(date('Y-m-d')) == strtotime($emprestimo->data_retorno))
                                    <td>Retorna Hoje</td>
                                @elseif (strtotime(date('Y-m-d')) > strtotime($emprestimo->data_retorno))
                                    <td>Atrasado</td>
                                @endif
                            @endif

                            {{-- BOTÕES DE ATUALIZAR/DELETAR --}}
                            <td class="d-flex">
                                <!-- ATUALIZAR -->
                                <a href="{{ route('emprestimos-edit', ['id' => $emprestimo->cod_emp]) }}"
                                    class="btn btn-primary me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </a>
                                <!-- DELETAR -->
                                <form action="{{ route('emprestimos-destroy', ['id' => $emprestimo->cod_emp]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Você tem certeza?')"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></button>
                                </form>
                                <a href="{{ route('emprestimos-devolver', ['id' => $emprestimo->cod_emp]) }}"
                                    class="btn btn-primary me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="uper bottom">Por favor, selecione um aluno</h3>
            @endif
        </div>
    </div>
@endsection
