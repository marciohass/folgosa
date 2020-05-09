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
                <h1 class="m-0 text-dark">Venda</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Venda</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Nota:</h5>
                    Esta página foi aprimorada para impressão. Clique no botão Print no final da página.
                  </div>

                  <!-- Main content -->
                  <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-12">
                        <h4>
                          <i class="fas fa-fire"></i>
                          @if(count($modelos) > 0)
                            @foreach($modelos as $modelo)
                                {{ $modelo->nome }}
                            @endforeach
                          @endif
                          <small class="float-right">Data: {{ $venda[0]['created_at']->format('d/m/Y') }}</small>
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                        Dados de endereço
                        <address>
                          <strong>{{ $venda[0]['nome'] }}</strong><br>
                          {{ $venda[0]['endereco'] }}, {{ $venda[0]['numero'] }}, {{ $venda[0]['complemento'] }}<br>
                          {{ $venda[0]['cep'] }} {{ $venda[0]['cidade'] }}, {{ $venda[0]['uf'] }} <br>
                          Telefone: {{ $venda[0]['telefone'] }}<br>
                          Email: {{ $venda[0]['email'] }}
                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-5 invoice-col">

                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 invoice-col">
                        <b>Invoice #{{ $venda[0]['reference'] }}</b><br>
                        <br>
                        <b>ID Pedido:</b> {{ $venda[0]['id'] }}<br>
                        <b>Dia do pagamento:</b> {{ $venda[0]['created_at']->format('d/m/Y') }}<br>
                        <b>Account:</b> 968-34567
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Qtd</th>
                            <th>Produto</th>
                            <th>Serial #</th>
                            <th>Descrição</th>
                            <th>Subtotal</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>1</td>
                            <td>{{ $venda[0]['produto'] }}</td>
                            <td>{{ $venda[0]['reference'] }}</td>
                            <td></td>
                            <td>R$ {{ $venda[0]['valor'] }}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-6">

                      </div>
                      <!-- /.col -->
                      <div class="col-6">
                        <p class="lead">Data da compra {{ $venda[0]['created_at']->format('d/m/Y') }}</p>

                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td>R${{ $venda[0]['valor'] }}</td>
                            </tr>
                            <tr>
                              <th>Taxa (0.0%)</th>
                              <td>R$0.00</td>
                            </tr>
                            <tr>
                              <th>Frete:</th>
                              <td>R$0.00</td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td>R${{ $venda[0]['valor'] }}</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                          <i class="fas fa-download"></i> Generate PDF
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
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
