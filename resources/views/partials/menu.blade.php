<!--<div class="logo">
    <a href="dashboard">
        <img src="{{ asset('images/logo.png') }}" >
    </a>
    
</div>
<div class="menuPrincipal">
    <ul>
        <li><a href="dashboard"><i class="fas fa-user"></i><span class="hidden-xs hidden-sm">Usuarios</span></a></li>
    </ul>
    <ul>
        <li><a href="dashboard"><i class="fas fa-user-circle"></i><span class="hidden-xs hidden-sm">Pacientes</span></a></li>
    </ul>
    <ul>
        <li><a href="dashboard"><i class="fas fa-file"></i><span class="hidden-xs hidden-sm">Eventos</span></a></li>
    </ul>
</div>-->
        <aside class="main-sidebar elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link logo">
                <img src="{{ asset('images/logo.png') }}" alt="Data Clinic" class="brand-image img-circle elevation-3 logo"
                    style="opacity: .8">
            </a>

            <!-- Sidebar -->
            <div class="sidebar" id="menu">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="/" class="nav-link {{ (Request::path() === '/') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                Inicio
                                </p>
                            </a>
                        </li>
                        @can('usuarios.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'usuarios')!== false) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                Usuarios
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/usuarios" class="nav-link {{ (Request::path() ===  'usuarios') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                @can('usuarios.create')
                                <li class="nav-item">
                                    <a href="/usuarios/create" class="nav-link {{ (Request::path()=== 'usuarios/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('pacientes.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'pacientes')!== false) ? 'active' : '' }}">
                                <i class=" nav-icon fas fa-user-injured"></i>
                                <p>
                                Pacientes
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/pacientes" class="nav-link {{ (Request::path()=== 'pacientes') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                @can('pacientes.create')
                                <li class="nav-item">
                                    <a href="/pacientes/create" class="nav-link {{ (Request::path() ===  'pacientes/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('historia.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'historia')!== false) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-ambulance"></i>
                                <p>
                                Eventos
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/historia" class="nav-link {{ (Request::path() ===  'historia') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                @can('historia.create')
                                <li class="nav-item">
                                    <a href="/historia/create" class="nav-link {{ (Request::path()=== 'historia/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                                @endcan
                                @can('historia.tipo.index')
                                <li class="nav-item">
                                    <a href="/historia/tipo" class="nav-link {{ (Request::path()=== 'historia/tipo') ? 'active' : '' }}">
                                        <i class="fas fa-arrows-alt nav-icon"></i>
                                        <p>Tipo de servicios</p>
                                    </a>
                                </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="/historia/reporte/generar" class="nav-link {{ (Request::path()=== 'historia/reporte') ? 'active' : '' }}">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Reporte</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'roles')!== false) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>
                                Roles
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/roles" class="nav-link {{ (Request::path() ===  'roles') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/roles/create" class="nav-link {{ (Request::path()=== 'roles/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('temperatura.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'temperatura')!== false) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-thermometer-full"></i>
                                <p>
                                Temperatura
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/temperatura" class="nav-link {{ (Request::path() ===  'temperatura') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/temperatura/create" class="nav-link {{ (Request::path()=== 'temperatura/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('oxigeno.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'oxigeno')!== false) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-lungs"></i>
                                <p>
                                Oxigeno
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/oxigeno" class="nav-link {{ (Request::path() ===  'oxigeno') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/oxigeno/create" class="nav-link {{ (Request::path()=== 'oxigeno/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/oxigeno/cilindros" class="nav-link {{ (Request::path()=== 'oxigeno/cilindros') ? 'active' : '' }}">
                                        <i class="fas fa-fire-extinguisher"></i>
                                        <p>Cilindros</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('reuniones.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'reuniones')!== false) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                Reuniones
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/reuniones" class="nav-link {{ (Request::path() ===  'reuniones') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/reuniones/create" class="nav-link {{ (Request::path()=== 'reuniones/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('lavadero.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'lavadero')!== false) ? 'active' : '' }}">
                                <i class="fas fa-shower"></i>
                                <p>
                                Lavadero
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/lavadero" class="nav-link {{ (Request::path() ===  'lavadero') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/lavadero/create" class="nav-link {{ (Request::path()=== 'lavadero/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('desinfeccion.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'desinfeccion')!== false) ? 'active' : '' }}">
                                <i class="fas fa-pump-soap"></i>
                                <p>
                                Desinfección
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/desinfeccion" class="nav-link {{ (Request::path() ===  'desinfeccion') ? 'active' : '' }}">
                                        <i class="fas fa-stream nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/desinfeccion/create" class="nav-link {{ (Request::path()=== 'desinfeccion/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-square nav-icon"></i>
                                        <p>Registrar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('ambulancias.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ (strpos(Request::path(), 'ambulancias')!== false) ? 'active' : '' }}">
                                <i class="fas fa-hospital-symbol"></i>
                                <p>
                                Ambulancias
                                <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/ambulancias" class="nav-link {{ (Request::path() ===  'ambulancias') ? 'active' : '' }}">
                                        <i class="fas fa-car-alt"></i>
                                        <p>Autos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/ambulancias/control" class="nav-link {{ (Request::path()=== 'ambulancias/control') ? 'active' : '' }}">
                                        <i class="fas fa-undo-alt"></i>
                                        <p>Controles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/ambulancias/mantenimientos" class="nav-link {{ (Request::path()=== 'ambulancias/mantenimientos') ? 'active' : '' }}">
                                        <i class="fas fa-tools"></i>
                                        <p>Mantenimientos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>