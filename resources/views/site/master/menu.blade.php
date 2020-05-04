
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand mr-5 ml-5" href="#">
              @if(count($modelo))
                @foreach($modelo as $mod)
                    @if(!empty($mod->logo))
                        <img src="{{ URL::to('/') }}/image_logo/{{$mod->logo}}" class="ml-3">
                    @else
                        {{$mod->nome}}
                    @endif
                @endforeach
              @endif
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('site.home') }}">Home</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{ route('site.loja') }}">Loja</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{ route('site.promocoes') }}">Novidades & Promoções</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Presentes</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{ route('site.contato') }}">Contato</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{ route('site.comentario') }}">Comentários</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
