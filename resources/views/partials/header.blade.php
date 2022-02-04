<!--<div class="container-fluid" id="header">
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md"></div>
        <div class="info">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href=""><i class="fas fa-id-card"></i>Perfil</a></li>
                        <li><a href=""><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user user-menu">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ asset('images/profile.jpg') }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{$name_user}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @can('perfil.index')
                <a href="/perfil" class="dropdown-item">
                    <i class="fas fa-id-card"></i>Perfil
                </a>
                @endcan
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>Cerrar sesión
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
  </nav>
