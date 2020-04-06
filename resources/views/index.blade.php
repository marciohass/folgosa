<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">

    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">

    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">

    <title>Musique - Music Collection</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-dark">
        <div class="container">
            <a class="navbar-brand h1 mb-0" href="#">Musique</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#">Formato</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#">Categorias</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#">Bandas</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#">Colecionadores</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#">Notícia</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Usuário</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Login</a>
                            <a class="dropdown-item" href="#">Registre-se</a>
                        </div>
                    </li>
                </ul>

                <form class="form-inline" action="">
                    <input class="form-control ml-4 mr-2" type="search" placeholder="Buscar...">
                    <button class="btn btn-dark" type="submit">Ok</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="carouselSite" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
            <li data-target="#carouselSite" data-slide-to="1"></li>
            <li data-target="#carouselSite" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imgs/slide-1.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h1>The Cult Sonic Temple Tour</h1>
                    <p class="lead">Banda de rock anos 80 faz tour Também no Brasil.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imgs/slide-2.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Depeche Mode</h1>
                    <p class="lead">Shows em São Paulo dias 28 e 29 de Janeiro de 2020.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imgs/slide-3.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Front 242</h1>
                    <p class="lead">Banda de EBM traz novo álbum em 2020.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Avançar</span>
        </a>
    </div>
    <div class="container my-5">
        <div class="row justify-content-sm-center">
            <div class="col-sm-6 col-md-2">
                <div class="card mb-5">
                    <img class="card-img-top" src="imgs/item-01.jpg">
                    <div class="card-body">
                        <h4 class="card-title">The Cult</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Beyon Good And Evil</h6>
                        <p class="card-text">2010</p>
                    </div>
                    <div class="card-body">
                        <a href="#" class="card-link">Lorem</a>
                        <a href="#" class="card-link">Sydney College</a>
                    </div>
                    <div class="card-footer text-muted">
                        Latim combinado
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <img class="card-img-top" src="imgs/item-02.jpg">
                    <div class="card-body">
                        <h4 class="card-title">De onde ele vem?</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Com mais de 2000 anos</h6>
                        <p class="card-text">Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Os Extremos do Bem e do Mal</li>
                        <li class="list-group-item">A primeira linha de Lorem Ipsum</li>
                        <li class="list-group-item">Finibus Bonorum et Malorum</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Lorem</a>
                        <a href="#" class="card-link">Sydney College</a>
                    </div>
                    <div class="card-footer text-muted">
                        Latim combinado
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <img class="card-img-top" src="imgs/item-03.jpg">
                    <div class="card-body">
                        <h4 class="card-title">De onde ele vem?</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Com mais de 2000 anos</h6>
                        <p class="card-text">Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Os Extremos do Bem e do Mal</li>
                        <li class="list-group-item">A primeira linha de Lorem Ipsum</li>
                        <li class="list-group-item">Finibus Bonorum et Malorum</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal">Donec</a>
                        <a href="#" class="card-link">Sydney College</a>
                    </div>
                    <div class="card-footer text-muted">
                        Latim combinado
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <img class="card-img-top" src="imgs/item-02.jpg">
                    <div class="card-body">
                        <h4 class="card-title">De onde ele vem?</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Com mais de 2000 anos</h6>
                        <p class="card-text">Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Os Extremos do Bem e do Mal</li>
                        <li class="list-group-item">A primeira linha de Lorem Ipsum</li>
                        <li class="list-group-item">Finibus Bonorum et Malorum</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal">Donec</a>
                        <a href="#" class="card-link">Sydney College</a>
                    </div>
                    <div class="card-footer text-muted">
                        Latim combinado
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <img class="card-img-top" src="imgs/item-02.jpg">
                    <div class="card-body">
                        <h4 class="card-title">De onde ele vem?</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Com mais de 2000 anos</h6>
                        <p class="card-text">Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Os Extremos do Bem e do Mal</li>
                        <li class="list-group-item">A primeira linha de Lorem Ipsum</li>
                        <li class="list-group-item">Finibus Bonorum et Malorum</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal">Donec</a>
                        <a href="#" class="card-link">Sydney College</a>
                    </div>
                    <div class="card-footer text-muted">
                        Latim combinado
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <img class="card-img-top" src="imgs/item-02.jpg">
                    <div class="card-body">
                        <h4 class="card-title">De onde ele vem?</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Com mais de 2000 anos</h6>
                        <p class="card-text">Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Os Extremos do Bem e do Mal</li>
                        <li class="list-group-item">A primeira linha de Lorem Ipsum</li>
                        <li class="list-group-item">Finibus Bonorum et Malorum</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link" data-toggle="modal" data-target="#siteModal">Donec</a>
                        <a href="#" class="card-link">Sydney College</a>
                    </div>
                    <div class="card-footer text-muted">
                        Latim combinado
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4"><i class="fa fa-video-camera text-primary" aria-hidden="true"></i> Bonorum et Malorum</h1>
                    <p class="lead">Existem muitas variações disponíveis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteração.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills justify-content-center mb-4" id="pills-nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-pills-01" data-toggle="pill" href="#nav-item-01">Pellentesque</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-pills-02" data-toggle="pill" href="#nav-item-02">Suspendisse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-pills-03" data-toggle="pill" href="#nav-item-03">Nulla mattis</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="nav-pills-content">
                        <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-reponsive-item" src="https://www.youtube.com/embed/m5_AKjDdqaU" frameborder="0"></iframe>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-item-02" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-reponsive-item" src="https://www.youtube.com/embed/m5_AKjDdqaU" frameborder="0"></iframe>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-item-03" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-reponsive-item" src="https://www.youtube.com/embed/m5_AKjDdqaU" frameborder="0"></iframe>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p>Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por 'lorem ipsum' mostra vários websites ainda em sua fase de construção</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1 class="display-4"><i class="fa fa-paper-plane text-primary"></i> Excepteur sint occaecat</h1>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form action="">
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="inputNome">Seu Nome</label>
                            <input type="text" class="form-control" id="inputNome" placeholder="Nome">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="inputSobrenome">Seu sobrenome</label>
                            <input type="text" class="form-control" id="inputSobrenome" placeholder="Sobrenome">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="inputEnd">Seu Endereço</label>
                            <input type="text" class="form-control" id="inputEnd" placeholder="Endereço completo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="inputcidade">Sua cidade</label>
                            <input type="text" class="form-control" id="inputCidade" placeholder="Cidade">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="inputEst">Seu estado</label>
                            <select id="inputEst" class="form-control">
                                <option selected>Escolha...</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="inputCEP">Seu CEP</label>
                            <input type="text" id="inputCEP" class="form-control">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"> Desejo receber novidades por e-mail
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a tabindex="0" class="btn btn-secondary ml-2" role="button" data-toggle="popover" data-placement="right" data-trigger="focus" title="Ajuda do formulário" data-content="Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.">Ajuda</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">

            <div class="col-12 mb-3"><hr></div>

            <div class="col-sm-4">
                <h3>Curso</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            </div>

            <div class="col-sm-4">
                <h3>Menu</h3>
                <div class="list-group text-center">
                    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Perfil</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Serviços</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Depoimentos</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Contato</a>
                </div>
            </div>

            <div class="col-sm-4">
                <h3>Social</h3>
                <div class="btn-group-vertical btn-block btn-group-lg" role="group">
                    <a class="btn btn-outline-primary" href="#"><i class="fa fa-facebook-official"></i>Facebook</a>
                    <a class="btn btn-outline-info" href="#"><i class="fa fa-twitter-square"></i>Twitter</a>
                    <a class="btn btn-outline-warning" href="#"><i class="fa fa-instagram"></i>Instagram</a>
                </div>
            </div>

            <div class="col-12 mt-5">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">O sucesso não é garantido, mas o fracasso é certo se você não estiver emocionalmente envolvido em seu trabalho.</p>
                    <footer class="blockquote-footer">Biz Stone <cite title="Título">Fundador do Twitter</cite></footer>
                </blockquote>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="siteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Neque porro quisquam est</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <h5>Porque nós o usamos?</h5>
                                <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por 'lorem ipsum' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).</p>
                            </div>
                            <div class="col-6">
                                    <h5>Porque nós o usamos?</h5>
                                    <p>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por 'lorem ipsum' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Donec</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script>
        $(function () {

            $('[data-toggle="popover"]').popover()

        })
    </script>

  </body>
</html>
