@extends ('layouts.admin')
@section ('contenido')
<div class="container">
  <h3>Ficha Tutor: </h3>
  <h1>{{ $tutores->nombre}} {{ $tutores->apellidos}}</h1>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
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

                        {!!Form::model($tutores,['method'=>'PATCH','route'=>['administracion.tutor.update',$tutores->id_user]])!!}
                  {{Form::token()}}
                  <div class="form-group">
                        <label for="rut">Rut</label>
                        <input type="text" name="rut" class="form-control" value="{{$tutores->rut}}" disabled >
                  </div>
                  <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$tutores->nombre}}">
                  </div>
                  <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" value="{{$tutores->apellidos}}" >
                  </div>
                  <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control" value="{{$tutores->telefono}}" >
                  </div>
                  <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$tutores->email}} ">
                  </div>

                  <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                       {!! Html::link('administracion/tutor', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
                  </div>

                        {!!Form::close()!!}           
                  
                  </div>
                  
            </div>
</div>

<div id="menu1" class="tab-pane ">
    
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Editar Tutor: {{ $tutores->nombre}}</h3>
                        @if (count($errors)>0)
                        <div class="alert alert-danger">
                              <ul>
                              @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                              @endforeach
                              </ul>
                        </div>
                        @endif

                        {!!Form::model($tutores,['method'=>'PATCH','route'=>['administracion.tutor.update',$tutores->id_user]])!!}
                  {{Form::token()}}
                  <div class="form-group">
                        <label for="rut">Rut</label>
                        <input type="text" name="rut" class="form-control" value="{{$tutores->rut}}" >
                  </div>
                  <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$tutores->nombre}}">
                  </div>

                  <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                  </div>

                        {!!Form::close()!!}           
                  
                  </div>
                  
            </div>

</div>
</div>
@endsection