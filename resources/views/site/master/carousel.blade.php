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
