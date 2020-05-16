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
                <h1 class="m-0 text-dark">Cliente</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Cliente</li>
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
                      <h3 class="card-title mb-0">Dados do cliente </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3"><h4>{{$cliente->nome}}</h4></div>
                        </div>
                        <div class="row mb-2">
                            <?php
                            $dt = explode('-', $cliente->data_nascimento);
                            $dt = $dt[2].'/'.$dt[1].'/'.$dt[0];
                            ?>
                            <div class="col-md-3">Data nascimento: {{$dt}}</div>
                            <div class="col-md-6"><b>E-mail:</b> {{$cliente->email}}</div>
                            <div class="col-md-3"><b>Telefone:</b> {{$cliente->telefone}}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12"><b>CEP:</b> {{$cliente->cep}}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6"><b>Endereço:</b> {{$cliente->endereco}}</div>
                            <div class="col-md-3"><b>Número:</b> {{$cliente->numero}}</div>
                            <div class="col-md-3"><b>Complemento:</b> {{$cliente->complemento}}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6"><b>Bairro:</b> {{$cliente->bairro}}</div>
                            <div class="col-md-4"><b>Cidade:</b> {{$cliente->cidade}}</div>
                            <div class="col-md-2"><b>UF:</b> {{$cliente->uf}}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6"><b>Recebe email:</b> Sim</div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
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

    <!-- jquery-validation -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="http://localhost/folgosa/public/js/app.js"></script>
    </body>
    </html>
