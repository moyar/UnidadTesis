<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema UAAEP </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
       
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('css/styles.css')}}">



@yield('stylesheets')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" style="background-color: #018989;" >

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo" style="background-color: #bb302d;>
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Sistema</b><b style="color: #800080">U</b><b style="color: green">AA</b><b style="color: #f8b71e">E</b><b style="color:green">P</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema UAAEP</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="background-color: #bb302d;">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-green">Online</small>
                  
                  <span class="hidden-xs">{{Auth::user()->name}} {{Auth::user()->apellidos}}</span>
                 
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                 

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    @if(Auth::user()->rol_id == 1)
                      <p><center>Administrador(a)</center></p>
                      @endif
                    @if(Auth::user()->rol_id == 2)
                      <p><center>Director(a) {{Auth::user()->carreras->nombre}}</center></p>
                      @endif
                         @if(Auth::user()->rol_id == 3)
                      <p><center>Profesor(a)</center></p>
                      @endif
                         @if(Auth::user()->rol_id == 4)
                      <p><center>Tutor(a) {{Auth::user()->carreras->nombre}}</center></p>
                      @endif
                    <div class="pull-right">

                      <a href="{{ url('/logout') }}" class="btn btn-success btn-flat">Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="background-color: #018989;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style="background-color: #018989;"></li>
              @if(Auth::user()->rol_id == 1)
            

                
                 <li class="treeview">
                     <a href="#">
                     <i class="fa fa-user"></i> <span>Gestión de Plataforma UAAEP</span>
                     <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{action('UsersController@index')}}"><i class="fa fa-circle-o text-aqua"></i> Indice de Usuarios</a></li>
                    <li><a href="{{action('UsersController@create')}}"><i class="fa fa-circle-o text-aqua"></i> Crear Nuevo Usuario</a></li>

                    <li><a href="{{action('CarreraController@index')}}"><i class="fa fa-circle-o text-yellow"></i> Indice de Carreras</a></li>
                    <li><a href="{{action('CarreraController@create')}}"><i class="fa fa-circle-o text-yellow"></i> Agregar Nueva Carrera</a></li>
                  
                  </ul>
                </li>

                 <li class="treeview">
                     <a href="#">
                     <i class="fa fa-book"></i> <span>Gestión de Tutorias</span>
                     <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">

                    <li><a href="{{action('AsignaturasController@index')}}"><i class="fa fa-circle-o text-red"></i> Indice de Asignaturas</a></li>
                    <li><a href="{{action('AsignaturasController@create')}}"><i class="fa fa-circle-o text-red"></i> Agregar Nueva Asignatura</a></li>

                    <li><a href="{{action('EstudianteController@index')}}"><i class="fa fa-circle-o text-aqua"></i> Indice de Estudiantes</a></li>
                    <li><a href="{{action('EstudianteController@create')}}"><i class="fa fa-circle-o text-aqua"></i> Agregar Nuevo Estudiante</a></li>

                    <li><a href="{{action('TutorController@index')}}"><i class="fa fa-circle-o text-yellow"></i> Indice de Tutores</a></li>
                    <li><a href="{{action('TutorController@create')}}"><i class="fa fa-circle-o text-yellow"></i> Agregar Nuevo Tutor</a></li>

                     <li><a href="{{action('TutoriaController@index')}}"><i class="fa fa-circle-o text-green"></i> Indice de Tutorias</a></li>
                    <li><a href="{{action('TutoriaController@create')}}"><i class="fa fa-circle-o text-green"></i> Agregar Nueva Tutoria</a></li>
                  
                     
                  
                  </ul>
                </li>

                <li class="treeview">
                     <a href="#">
                     <i class="fa fa-group"></i> <span>Gestión de Talleres</span>
                     <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">

                    <li><a href="{{action('CategoriaController@index')}}"><i class="fa fa-circle-o text-red"></i> Indice de Talleres</a></li>
                    <li><a href="{{action('CategoriaController@create')}}"><i class="fa fa-circle-o text-red"></i> Agregar Nuevo Taller</a></li>

                    <li><a href="{{action('TallerController@index')}}"><i class="fa fa-circle-o text-aqua"></i> Indice de Grupos de Taller</a></li>
                    <li><a href="{{action('TallerController@create')}}"><i class="fa fa-circle-o text-aqua"></i> Agregar Nuevo Grupo Taller</a></li>
                  
                  </ul>
                </li>

                <li class="treeview">
                     <a href="#">
                     <i class="fa fa-user"></i> <span>Perfil de Usuario</span>
                     <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{action('UsersController@perfil')}}"><i class="fa fa-circle-o text-aqua"></i> Modificar Perfil de Usuario</a></li>
                    
                  
                  </ul>
                </li>


                 @endif

                @if(Auth::user()->rol_id == 2)
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-user"></i> <span>Gestión de Estudiantes</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{action('DirectorController@index')}}"><i class="fa fa-circle-o text-red"></i> Indice de Estudiantes</a></li>
                      
                      
                    </ul>
                  </li>
                   <li class="treeview">
                     <a href="#">
                     <i class="fa fa-user"></i> <span>Perfil de Usuario</span>
                     <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{action('DirectorController@perfil')}}"><i class="fa fa-circle-o text-aqua"></i> Modificar Perfil de Usuario</a></li>
                    
                  
                  </ul>
                </li>
                 @endif

                  @if(Auth::user()->rol_id == 3)
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-user"></i> <span>Gestión de Tutorias</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{action('ProfesorController@index')}}"><i class="fa fa-circle-o text-red"></i> Indice de Tutorias</a></li>
                      
                      
                    </ul>
                  </li>
                   <li class="treeview">
                     <a href="#">
                     <i class="fa fa-user"></i> <span>Perfil de Usuario</span>
                     <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                   
                     <li><a href="{{action('ProfesorController@perfil')}}"><i class="fa fa-circle-o text-aqua"></i> Modificar Perfil de Usuario</a></li>
                  
                  </ul>
                </li>
                 @endif

                 @if(Auth::user()->rol_id == 4)
                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-user"></i> <span>Gestión de Tutorias</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{action('TutorRolController@index')}}"><i class="fa fa-circle-o text-red"></i> Indice de Tutorias</a></li>
                      
                      
                    </ul>
                  </li>
                   <li class="treeview">
                     <a href="#">
                     <i class="fa fa-user"></i> <span>Perfil de Usuario</span>
                     <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                  
                     <li><a href="{{action('TutorRolController@perfil')}}"><i class="fa fa-circle-o text-aqua"></i> Modificar Perfil de Usuario</a></li>
                  
                  </ul>
                </li>
                 @endif


            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema UAAEP</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('contenido')
                              <!--Fin Contenido-->
                           </div>
                        </div>

                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
       {!! Html::script('js/parsley.min.js') !!}
      {!! Html::script('js/select2.min.js') !!}
    {!! Html::style('css/parsley.css') !!}
      {!! Html::style('css/select2.min.css') !!}
      <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>


          <script type="text/javascript">
            $('.select2-multi').select2();

          </script>
      <footer class="main-footer">


      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
     <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>

  </body>
</html>
