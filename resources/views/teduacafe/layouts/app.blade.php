<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/jquery-ui.css" rel="stylesheet">

    <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">
    <link href="css/jquery-ui.theme.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">
<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #3c8dbc;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
                @guest
                <div class="sidebar-brand-text mx-3 text-uppercase">{{\App\Configuracioncafe::all()->first()->titulo_sistema}}</div>
                @else
                <div class="sidebar-brand-text mx-3 text-uppercase">{{\App\Configuracioncafe::all()->first()->titulo_sistema}}</div>
                @endguest
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

     

            <!-- Nav Item - Pages Collapse Menu -->
            @if(\App\User::find(Auth::id())->idrole == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>
            @endif
            @if(\App\User::find(Auth::id())->idrole == 1 || \App\User::find(Auth::id())->idrole == 3)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Vender</span>
                </a>
                <div id="collapseT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="{{ route('ventamesa.index') }}">Vender por Mesa</a>
                        <a class="collapse-item" href="{{ route('ventaproducto.index') }}">Vender por Producto</a>
                        <a class="collapse-item" href="{{ route('ventadelivery.index') }}">Vender por Delivery</a>
                        <a class="collapse-item" href="{{ route('ventapendiente') }}">Ventas pendientes</a>
                        <a class="collapse-item" href="{{ route('ventapendiente.delivery') }}">Ventas (Delivery)</a>
                        @endif
                    </div>
                </div>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collaps"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-utensils"></i>
                    <span>Secciones</span>
                </a>
                <div id="collaps" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="{{ route('monitor') }}">Monitor</a>
                        <a class="collapse-item" href="{{ route('cocina') }}">Cocina</a>
                        @endif
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collap"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Ventas</span>
                </a>
                <div id="collap" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="{{ route('ventasdiarias') }}">Ventas diarias</a>
                        <a class="collapse-item" href="{{ route('ventascafe') }}">Todas las ventas</a>
                        <a class="collapse-item" href="{{ route('ventasentrega') }}">Por entregar</a>
                        <a class="collapse-item" href="{{ route('ventascobrar') }}">Por cobrar</a>
                        
                        @endif
                       
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#colla"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clock"></i>
                    <span>Compras</span>
                </a>
                <div id="colla" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="">Nueva compra</a>
                        <a class="collapse-item" href="">Compras</a>
                        @endif
                        <a class="collapse-item" href="">Por recibir</a>
                        <a class="collapse-item" href="">Por pagar</a>
                    </div>
                </div>
            </li>
            @if(\App\User::find(Auth::id())->idrole == 1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-folder-open"></i>
                    <span>Catalogos</span>
                </a>
                <div id="collapseTw" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('productoscafe.index')}}">Productos</a>
                        <a class="collapse-item" href="{{ route('ingredientes.index') }}">Ingredientes</a>
                        <a class="collapse-item" href="{{ route('proveedores.index') }}">Proveedores</a>
                        <a class="collapse-item" href="{{ route('clientescafe.index') }}">Clientes</a>
                        <a class="collapse-item" href="{{ route('unidades.index') }}">Unidades de medida</a>
                        <a class="collapse-item" href="{{ route('presentaciones.index') }}">Tipo Presentación</a>
                        <a class="collapse-item" href="{{ route('categoriaproductos.index') }}">Categorias de Productos</a>
                        <a class="collapse-item" href="{{ route('categoriaingredientes.index') }}">Categorias de Ingredientes</a>
                        <a class="collapse-item" href="{{ route('mediopagos.index') }}">Medio de Pagos</a>
                        <a class="collapse-item" href="{{ route('estadoentregas.index') }}">Estado Entregas</a>
                        <a class="collapse-item" href="{{ route('tipopagos.index') }}">Tipo de Pagos</a>
                    </div>
                </div>
            </li>
            @endif
            @if(\App\User::find(Auth::id())->idrole == 1 || \App\User::find(Auth::id())->idrole == 2)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-briefcase"></i>
                    <span>Finanzas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="">Credito</a>
                        <a class="collapse-item" href="">Balance</a>
                        @endif
                        <a class="collapse-item" href="">Gastos</a>
                        <a class="collapse-item" href="">Caja</a>
                    </div>
                </div>
            </li>
            @endif
            @if(\App\User::find(Auth::id())->idrole == 1)
            <!--<li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-chart-area"></i>
                    <span>Reportes</span></a>
            </li>
            -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#coll"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-chart-area"></i>
                    <span>Inventario</span>
                </a>
                <div id="coll" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="">Inventario Principal</a>
                        <a class="collapse-item" href="">Inventario de Ingredientes</a>
                        @endif
                        <a class="collapse-item" href="">Inventario Extendido</a>
                        <a class="collapse-item" href="">Alertas de Inventario</a>
                        <a class="collapse-item" href="">Abastecer</a>
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="">Abastecimientos</a>
                        @endif
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#c"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-file-alt"></i>
                    <span>Reportes</span>
                </a>
                <div id="c" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="">Inventario</a>
                        <a class="collapse-item" href="">Ventas</a>
                        @endif
                        <a class="collapse-item" href="">Reporte de pagos (credito)</a>
                        <a class="collapse-item" href="">Compras</a>
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="">Productos populares</a>
                        @endif
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-cog"></i>
                    <span>Administración</span>
                </a>
                <div id="cwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="{{route('users.cafe')}}">Usuarios</a>
                        <a class="collapse-item" href="{{route('deliveris.index')}}">Delivery</a>
                        @endif
                        <a class="collapse-item" href="{{route('mesas.index')}}">Mesas</a>
                        <a class="collapse-item" href="{{route('seccion.index')}}">Secciones del Restaurante</a>
                        @if(\App\User::find(Auth::id())->idrole == 1)
                        <a class="collapse-item" href="{{route('configuracioncafe.index')}}">Configuracion</a>
                        @endif
                    </div>
                </div>
            </li>
            @endif

        </ul>
        <!-- End of Sidebar -->
         <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                 <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                
              

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

            

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @guest
                                @else
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                                    @endguest
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                               
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" style="cursor: pointer;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                 <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro que desea salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           Salir
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>


    @yield('content')

    <footer class="sticky-footer bg-white w-100" >
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery-1.12.4.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="js/jquery-ui.js"></script>

    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/moment.min.js"></script>   

  
<script>
   
        $(".datetime").datepicker({
            dateFormat: 'dd-mm-yy'
        });
   
</script>

</body>

</html>
