@extends('site.master.header')
@extends('site.master.menu')

<main role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">

          @for($x=0; $x<count($banners); $x++)
              <li data-target="#myCarousel" data-slide-to="{{$x}}" @if($x == 0)class="active"@endif></li>
          @endfor
        </ol>
        <div class="carousel-inner">

          @foreach($banners as $key=>$value)

          <div class="carousel-item @if($key == 0){{'active'}}@endif">
              <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
              <img src="image_banners/{{$value->banner}}" class="img-fluid d-block">
              <div class="container">
                  <div class="carousel-caption d-none d-md-block">
                  <h1>{{$value->titulo}}</h1>
                  <p>{{$value->descricao}}</p>
                  </div>
              </div>
              </div>

          @endforeach

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        <blockquote class="blockquote">
            <p class="mb-0">
                @foreach($modelo as $md)
                    {{$md->descricao}}
                @endforeach
            </p>
        </blockquote>
    </div>
    <div class="row mb-5"></div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">

        @foreach($assinaturas as $assinatura)

            <div class="col-lg-4">
                <form name="payment-method" method="POST" action="{{route('site.paymentmethod')}}">
                    @csrf
                    @if($assinatura->imagem == "")
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                    @endif
                    <img src="image_assinaturas/{{$assinatura->imagem}}" class="rounded-circle" width="140" height="140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <h2>{{$assinatura->nome}}</h2>
                    <p>{{$assinatura->descricao}}</p>
                    <h4><span class="text-muted">R$ {{$assinatura->valor}}</span></h4>
                    <input type="hidden" name="id" value="{{$assinatura->id}}">
                    <input type="hidden" name="titulo" value="{{$assinatura->nome}}">
                    <input type="hidden" name="valor" value="{{$assinatura->valor}}">
                    <input type="hidden" name="tipo_venda" value="S">
                    <p><button type="submit" class="btn btn-secondary">Assine já! &raquo;</button></p>
                </form>
            </div><!-- /.col-lg-4 -->

        @endforeach

      </div><!-- /.row -->

    </div><!-- /.container -->
</main>
@extends('site.master.footer')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
