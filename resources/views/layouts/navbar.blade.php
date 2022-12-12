<nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{asset('img/logotipBibliR.png')}}" alt="Logo" width="40px" height="40px">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{ route('inicio') }}">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{ route('alunos-index') }}">Alunos</a>
          </li>
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="{{ route('profs-index') }}">Empréstimos</a>
          </li>
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="{{ route('CDD') }}">CDDs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="{{ route('profs-index') }}">Prof</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mais
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Autores</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Cadastro de Livros</a></li>
                <li><a class="dropdown-item" href="#">Cadastro de Autores</a></li>
              </ul>
            </li>
           <li class="nav-item">
            <a class="nav-link text-white" href=''>Sobre</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


