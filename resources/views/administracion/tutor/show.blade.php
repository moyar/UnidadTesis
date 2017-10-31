@extends ('layouts.admin')
@section ('contenido')
<div class="container">
  <h3>Ficha Tutor: </h3>
  <h1>{{ $tutores->name}} {{ $tutores->apellidos}}</h1>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Datos Personales</a></li>
    <li><a data-toggle="tab" href="#menu1">Tutorias</a></li>
  </ul>

  <div class="tab-content">

<div id="home" class="tab-pane fade in active">
      <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                @if (count($errors)>0)
                        <div class="alert alert-danger">
                              <ul>
                              @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                              @endforeach
                              </ul>
                        </div>
                        @endif

          <h1> </h1>
          <form class="form-horizontal">
              <div class="form-group">
               <label  class="control-label label-default col-sm-2 col-form-label ">Rut:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$tutores->rut}}</p>
              </div>
              <label  class="control-label label-default col-sm-2 col-form-label ">Nombre:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$tutores->name}}</p>
              </div>
               <label  class="control-label label-default col-sm-2 col-form-label ">Apellidos:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$tutores->apellidos}}</p>
              </div>
               <label  class="control-label label-default col-sm-2 col-form-label ">Telefono:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$tutores->telefono}}</p>
              </div>
                 <label  class="control-label label-default col-sm-2 col-form-label ">Correo:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$tutores->email}}</p>
              </div>
               <label  class="control-label label-default col-sm-2 col-form-label ">Carrera:</label>
              <div class="col-xs-10">
                  <p class="form-control-static">{{$tutores->carreras->nombre}}</p>
              </div>
               
              </div>
            
         </form>
        </div>
    
</div>




</div>

<div id="menu1" class="tab-pane ">
    <h1> </h1>
<div class="row">
  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        
         
          <th><center>Nombre Grupo</center></th>
          <th><center>Asignatura</center></th>
          <th><center>Profesor Responsable</center></th>
          
          
          <th>Opciones</th>
        </thead>
               @foreach ($tutorias as $use)
                <tr>
                  
                  <td><center>{{ $use->nombre_grupo}}</center></td>
                  <td><center>{{$use->asignaturas->nombre}}</center></td>
                  <td><center>{{$use->profesores->name}}</center></td>
             

                  <td>
                    <a href="{{URL::action('TutoriaController@mostrarGestionar',$use->id)}}"><button class="btn btn-info">Gestionar</button></a>
                  
                  </td>
                </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
                  
 </div>


@endsection