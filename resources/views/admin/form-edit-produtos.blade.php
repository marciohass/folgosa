<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../../datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../../datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="http://localhost/folgosa/public/css/app.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

      @extends('admin.master.side-bar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Catálogo</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Catálogo</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- jquery validation -->
                  <div class="card card-outline card-primary">
                    <div class="card-header">
                      <h3 class="card-title mb-0">Edição de Produtos </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('produtos.update', $produto->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div><br />
                        @endif

                        @if(session()->get('success'))
                            <div class="alert alert-success">
                            {{ session()->get('success') }}
                            </div><br />
                        @endif

                        <div class="form-group col-sm-12">
                            @csrf
                          <label for="titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título" value="{{ $produto->titulo }}" required>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="descricao">Descrição</label>
                        <textarea name="descricao" class="form-control" id="descricao" rows=3 placeholder="Descrição">{{ $produto->descricao }}</textarea>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header d-flex align-items-center">
                                  <h5 class="card-title mb-0">Selecione uma imagem &nbsp;</h5>
                                  <small id="telefoneHelpBlock" class="form-text text-muted">
                                    (imagem com 500x500px)
                                  </small>
                                </div>
                                <div class="card-body">
                                    <input type="file" name="image" />
                                    <img src="{{ URL::to('/') }}/image_produtos/{{ $produto->foto }}" class="img-thumbnail" width="100" />
                                    <input type="hidden" name="hidden_image" value="{{ $produto->foto }}" />
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="row col-sm-12">
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="novidade" name="novidade" value="1" @if($produto->novidade == 1) {{ "checked" }} @endif>
                                    <label class="form-check-label" for="novidade">Novidade</label>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="promocao" name="promocao" value="1" @if($produto->promocao == 1) {{ "checked" }} @endif>
                                    <label class="form-check-label" for="promocao">Promoção</label>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-12">
                            <div class="form-group col-sm-3 mt-3">
                                <label for="valor">Valor</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" id="valor" name="valor" value="{{ $produto->valor }}" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-3 mt-3">
                                <label for="valor_promocao">Valor da promoção</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" id="valor_promocao" name="valor_promocao" value="{{ $produto->valor_promocao }}">
                                </div>
                            </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right" data-placement="top">Editar</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
                  </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
              </div>
              <!-- /.row -->

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->
    <script>
        (function() {
        'use strict';
        window.addEventListener('load', function() {

            var forms = document.getElementsByClassName('needs-validation');

            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>
    <!-- jquery-validation -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="http://localhost/folgosa/public/js/app.js"></script>
    </body>
    </html>
