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
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Admin | Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="http://localhost/folgosa/public/css/app.css">

    <script src="/jquery/jquery.min.js"></script>
    <script src="/crop/croppie.js"></script>
    <link rel="stylesheet" href="/crop/croppie.css" />

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
                <h1 class="m-0 text-dark">Perfil</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Perfil</li>
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
                    <!-- form start -->
                    <form action="{{route('profile.update', $profile->id)}}" class="needs-validation" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ URL::to('/') }}/image_perfil/{{ $profile->foto }}"
                                        alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{$profile->nome}}</h3>
                                <!--<p class="text-muted text-center">Software Engineer</p>-->
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
                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="{{$profile->nome}}"quired>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="descricao">Descrição</label>
                                    <textarea name="descricao" class="form-control" id="descricao" rows="3" placeholder="Descrição">{{$profile->descricao}}</textarea>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header d-flex align-items-center">
                                            <h5 class="card-title mb-0">Selecione foto de perfil &nbsp;</h5>
                                            <small id="telefoneHelpBlock" class="form-text text-muted">
                                                (imagem deve ser quadrada)
                                            </small>
                                          </div>
                                          <div class="card-body">
                                            <input type="file" name="image" />
                                            <img src="{{ URL::to('/') }}/image_perfil/{{ $profile->foto }}" class="img-thumbnail" width="100" />
                                            <input type="hidden" name="hidden_image" value="{{ $profile->foto }}" />
                                          </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                          <h5 class="card-title mb-0">Selecione imagem de logotipo</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="file" name="logo" id="logo" />
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="{{ URL::to('/') }}/image_logo/{{ $profile->logo }}" class="img-thumbnail" width="180" />
                                                    <input type="hidden" name="hidden_logo" value="{{ $profile->logo }}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <div id="uploaded_image"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="form-row col-sm-12">
                                    <div class="form-group col-md-4">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" name="telefone" id="telefone" onkeypress="$(this).mask('(00) 00000-0000');" value="{{$profile->telefone}}">
                                        <small id="telefoneHelpBlock" class="form-text text-muted">
                                            Digite apenas os números do telefone.
                                        </small>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="email">E-mail*</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{$profile->email}}" required>
                                        <div class="valid-feedback">
                                            Ok!
                                        </div>
                                        <div class="invalid-feedback">
                                            Favor digitar um e-mail válido!
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-right">Atualizar</button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </form>

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
    <div id="uploadimageModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload & Crop</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div id="image_demo" style="width:350px; margin-top:30px"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success crop_image">Cortar e subir</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <script>
        (function(){

            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                width:180,
                height:33,
                type:'square' //circle
                },
                boundary:{
                    width:180,
                    height:33,
                }
            });

            $('#logo').on('change', function(){
                var reader = new FileReader();
                reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });

            $('.crop_image').click(function(event){
                $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
                }).then(function(response){
                $.ajax({
                    url:'http://'+window.location.host+"/uploadlogo/"+{{$profile->id}},
                    type: "POST",
                    data: {"logo": response, "_token": "{{ csrf_token() }}"},
                    success:function(data)
                    {
                        $('#uploadimageModal').modal('hide');
                        $('#uploaded_image').html(data);
                    },error: function (data, textStatus, errorThrown) {
                        console.log(data);

                    },

                });
                })
            });

        })();
    </script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="http://localhost/folgosa/public/js/app.js"></script>

    </body>
    </html>
