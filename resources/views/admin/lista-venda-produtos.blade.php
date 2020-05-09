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
                <h1 class="m-0 text-dark">Vendas</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Vendas</li>
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
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h3 class="card-title mb-0">Listagem de produtos vendidos</h3>
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                @if(count($items) >= 1)
                    <div class="card-body">
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                            {{ session()->get('success') }}
                            </div><br />
                        @endif
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Cod. Pedido</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Produto</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Valor</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Cliente</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Método Pagto</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tipo</th>
                                        <th colspan="2">Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1">{{ $item->reference }}</td>
                                                <td>{{ $item->produto }}</td>
                                                <td>{{ $item->valor }}</td>
                                                <td>{{ $item->nome }}</td>
                                                <td>{{ $item->metodo_pagamento }}</td>
                                                <td>@if($item->tipo_venda == 'S'){{ 'Assinatura' }} @elseif($item->tipo_venda == 'G'){{ 'Presente' }}@else{{ 'Produto' }}@endif</td>
                                                <td width="15%">
                                                    <form action="{{ route('produtos.destroy', $item->id) }}" method="post">
                                                        <a href="{{ route('admin.form-show-venda',$item->id)}}" class="btn btn-primary btn-sm" data-placement="top">Visualizar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    Mostrando 1 até @if(count($items)< 5){{ count($items) }} @else {{ 5 }} @endif de {{ count($items) }} registros
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                        {!! $items->links(); !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                @else
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            Não há vendas cadastradas
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
