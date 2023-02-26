<nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logotipBibliR.png') }}" alt="Logo" width="40px" height="40px" class="LogoT">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- ALUNOS --}}
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page"
                        href="{{ route('alunos-index') }}">Alunos</a>
                </li>
                {{-- EMPRÉSTIMOS --}}
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page"
                        href="{{ route('emprestimos-index') }}">Empréstimos</a>
                </li>
                {{-- LIVROS --}}
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page"
                        href="{{ route('livros-index') }}">Livros</a>
                </li>
                {{-- MAIS --}}
                <li class="nav-item dropdown">
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('authors-index') }}">Autores</a></li>
                        <li><a class="dropdown-item" href="{{ route('profs-index') }}">Profs</a></li>
                        <li><a class="dropdown-item" href="{{ route('editoras-index') }}">Editoras</a></li>
                        <li><a class="dropdown-item" href="{{ route('CDD') }}">CDDs</a></li>
                    </ul>
                </li>
                {{-- SOBRE --}}
                <li class="nav-item">
                    <a class="nav-link text-white" href='https://sites.google.com/view/sobbre-equipe1-multimeiosmg/in%C3%ADcio?authuser=1'>Sobre</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
