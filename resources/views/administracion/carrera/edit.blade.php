@extends ('layouts.admin')
@section ('contenido')
<div class="well well bs-component">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
			<h3 style="border-bottom-style: solid;"><center><i class="fa fa-plus-square"></i> Editar Carrera</center></h3>
                  
                  <h3>{{ $carrera->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
            </div>
			@endif
                  <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
			{!!Form::model($carrera,['method'=>'PATCH','route'=>['administracion.carrera.update',$carrera->id]])!!}
            {{Form::token()}}
            
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$carrera->nombre}}">
            </div>
            
            <div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$carrera->telefono}}" >
            </div>
            <div class="form-group">
            	<label for="facultad">Facultad</label>
            	<input type="text" name="facultad" class="form-control" value="{{$carrera->facultad}} ">
            </div>
            <div class="form-group">
                  <label for="campus">Campus</label>
                  <input type="text" name="campus" class="form-control" value="{{$carrera->campus}} ">
            </div>


            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button href="{{URL::action('CarreraController@index')}}" class="btn btn-danger" >Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
      </div>
	</div>
</div>
@endsection