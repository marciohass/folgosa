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
                <h1 class="m-0 text-dark">Banners</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Banners</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <div class="card">
                @if(count($comentarios) >= 1)
                    <div class="card-body">
                        <h5 class="mb-5">{{count($comentarios)}} comentários</h5>
                        @foreach($comentarios as $comentario)
                            <?php
                            $data_inicial = date_create($comentario->created_at->format('d-m-Y'));
                            $data_final = date_create(date('d-m-Y'));
                            $diferenca = date_diff($data_inicial,$data_final);
                            $dias = $diferenca->format('%a');
                            ?>
                            <div class="row">
                                <div class="col-lg-6 text-muted">
                                    <p class="font-weight-bold">{{$comentario->nome}} <span class="font-weight-light">({{$dias}} dias atrás)</span> </p>
                                    <p class="text-muted text-sm" style="text-indent:2em">{{$comentario->comentario}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                @else
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            Não há itens cadastrados
                        </div>
                    </div>
                @endif
              </div>

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

    <!-- jQuery -->
<script src="../../../jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../../datatables/jquery.dataTables.min.js"></script>
<script src="../../../datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="../../dist/js/demo.js"></script>-->
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
    </body>
    </html>
