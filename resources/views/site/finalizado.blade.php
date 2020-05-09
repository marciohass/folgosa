@extends('site.master.header')
@extends('site.master.menu')

<main role="main">
    <div class="container mt-5 mb-5">
        <div class="jumbotron mt-3">
            <h3>Compra concluída com sucesso!</h3>
            <p class="lead">Obrigada por comprar um dos meus conteúdos.</p>
            @if(!empty($codigo) && !empty($link))
                <p>{{$codigo}}</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{$link}}" target="_blank" role="button">Link do boleto</a>
                </p>
            @elseif(!empty($codigo))
                <p>{{$codigo}}</p>
            @endif
        </div>
    </div>
</main>
@extends('site.master.footer')
