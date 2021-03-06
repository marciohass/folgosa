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
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../select2/css/select2.min.css">
    <link rel="stylesheet" href="../../../select2-bootstrap4-theme/select2-bootstrap4.min.css">

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
                <h1 class="m-0 text-dark">Rede Social</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Rede Social</li>
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
                      <h3 class="card-title mb-0">Cadastro de Redes Sociais </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('redesociais.store')}}" method="post" enctype="multipart/form-data">
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
                          <label for="nome">Nome</label>
                          <select class="form-control select2" style="width: 100%;" name="nome" id="nome" required>
                            <option value="">Selecione uma rede social</option>
                            <option value="YouTube">YouTube</option>
                            <option value="Facebook">Facebook</option>
                            <option value="WhatsApp">WhatsApp</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Twitter">Twitter</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Pinterest">Pinterest</option>
                            <option value="Skype">Skype</option>
                            <option value="Snapchat">Snapchat</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="link">Link</label>
                          <input type="text" name="link" class="form-control" id="link" placeholder="Link">
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Adicionar</button>
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
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <!-- Page script -->
    <script>
        $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        })
    </script>
    </body>
    </html>
