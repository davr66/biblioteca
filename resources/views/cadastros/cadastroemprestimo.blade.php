@extends('layouts.main')

@section('título', 'Cadastro de Empréstimo')

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
                        Adicionar empréstimo
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('emprestimos-cad.add') }}">
                            @csrf
                            {{-- ALUNO --}}
                            <div class="form-group">
                                <label for="cod_aluno">Para:</label>
                                <select name="cod_aluno" id="cod_aluno" class="form-select">
                                    @foreach ($alunos as $aluno)
                                        <option value="{{ $aluno->cod_aluno }}">{{ $aluno->nome }}</option>
                                    @endforeach
                                </select>
                                {{-- SELECT2 ALUNOS --}}
                                <script>
                                    $('#cod_aluno').select2();
                                </script>
                            </div>
                            <br><br>
                            {{-- INTERVALO DE TEMPO --}}
                            <div class="form-group">
                                <label for="tempo_emp">Tempo de empréstimo:</label>
                                <select name="intervalo" id="intervalo" class="form-select">
                                    <option value="1">Uma Semana</option>
                                    <option value="0">Duas Semanas</option>
                                </select>
                            </div>
                            <br>
                            {{-- LIVRO --}}
                            <div class="form-group">
                                <label for="num_reg">Livro:</label>
                                <select name="num_reg" id="num_reg" class="form-select">
                                    @foreach ($livros as $livro)
                                        <option value="{{ $livro->num_reg }}">{{ $livro->titulo }}</option>
                                    @endforeach
                                </select>
                                {{-- SELECT2 LIVROS --}}
                                <script>
                                    $('#num_reg').select2();
                                </script>
                            </div>
                            <br><br>
                    </div>
                </div>
                <br>
                {{-- BOTÃO PARA ADICIONAR --}}
                <button type="submit" class="btn btn-primary">Adicionar</button>
                {{-- BOTÃO PARA VOLTAR --}}
                <div class="flex justify-content-lg-end">
                    <a href="{{ route('emprestimos-index') }}" class="btn btn-primary">Voltar</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
