<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        @if(count($modelos))
            @foreach($modelos as $modelo)
                <img src="{{ URL::to('/') }}/image_logo/{{$modelo->logo}}" class="ml-3">
            @endforeach
        @else
            <img src="../../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">
                Admin
            </span>
        @endif
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if(count($modelos) > 0)
                @foreach($modelos as $modelo)
                    <img src="{{ URL::to('/') }}/image_perfil/{{$modelo->foto}}" class="img-circle elevation-2" alt="User Image">
                    <?php
                    $nome_modelo = $modelo->nome;
                    ?>
                @endforeach
            @else
                <img src="../../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">@if(!empty($nome_modelo)) {{$nome_modelo}} @endif</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/home" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.form-profile',1) }}" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>
                        Meu Perfil
                    </p>
                </a>
            </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon nav-icon fas fa-edit"></i>
              <p>
                Cadastros
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('admin.lista-assinaturas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assinaturas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.lista-produtos') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catálogo</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('admin.lista-banners') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banners</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.lista-redesociais') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RedesSociais</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
                <a href="{{ route('admin.lista-vendas') }}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>
                        Vendas
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>
                        Produtos vendidos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>
                        Assinaturas vendidas
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>
                        Presentes
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
