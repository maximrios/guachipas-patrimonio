<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}" defer></script>
    <script src="https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json" defer></script> -->
    <script src="{{ asset('js/gentelella.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.js') }}" defer></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/es.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gentelella.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="nav-sm">
	<div id="app" class="container body">
    	<div class="main_container">
            <div class="col-md-3 left_col">
          		<div class="left_col scroll-view">
            		<div class="clearfix"></div>
            		<div class="profile clearfix">
              			<div class="profile_pic">

              			</div>
              			<div class="profile_info">
                			<span>Bienvenido,</span>
                			<h2></h2>
              			</div>
            		</div>
            		<!-- /menu profile quick info -->
            		<br />
            		<!-- sidebar menu -->
            		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              			<div class="menu_section">
                			<h3>Cargo</h3>
                			<ul class="nav side-menu">
                				<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Dashboard </a></li>
                                <li><a href="{{ url('orders') }}"><i class="fa fa-sign-in"></i> Altas</a></li>
                  				<li><a href="{{ url('sales') }}"><i class="fa fa-sign-out"></i> Bajas</a></li>
                                <li><a href="{{ url('inventories') }}"><i class="fa fa-list"></i> Inventario</a></li>
                                <li><a href="{{ url('assignments') }}"><i class="fa fa-share"></i> Asignaciones</a></li>
                  				<li><a href="{{ url('products') }}"><i class="fa fa-book"></i> Nomenclador</a></li>
                                <li><a href="{{ url('providers') }}"><i class="fa fa-address-book"></i> Proveedores</a></li>
                                <li><a href="{{ url('reports') }}"><i class="fa fa-tasks"></i> Reportes</a></li>
                  			</ul>
              			</div>
            		</div>
            		<!-- /sidebar menu -->
            		<!-- /menu footer buttons -->
            		<div class="sidebar-footer hidden-small">
              			<a data-toggle="tooltip" data-placement="top" title="Settings">
                			<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              			</a>
              			<a data-toggle="tooltip" data-placement="top" title="FullScreen">
                			<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              			</a>
              			<a data-toggle="tooltip" data-placement="top" title="Lock">
                			<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              			</a>
              			<a data-toggle="tooltip" data-placement="top" title="Logout">
                			<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              			</a>
            		</div>
            		<!-- /menu footer buttons -->
          		</div>
        	</div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="#"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i> Cerrar sesión
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>
    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel"></div>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js"></script>

    <script>
        $(function() {

            const languages = {
                'es': '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json',
            };
            $.extend( true, $.fn.dataTable.Buttons.defaults.dom.button, {
                className: 'btn btn-sm',
            });
            $.extend( true, $.fn.dataTable.defaults, {
                //responsive: true,
                language: {
                    url: languages['es'],
                },
                pageLength: 20,
            });
            
            $('.datepicker').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
            });
	

        });
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('scripts')
</body>
</html>
