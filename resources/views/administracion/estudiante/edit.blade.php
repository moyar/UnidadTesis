@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Estudiante: {{ $usuarios->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($usuarios,['method'=>'PATCH','route'=>['administracion.estudiante.update',$usuarios->id_user]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="rut">Rut</label>
            	<input type="text" name="rut" class="form-control" value="{{$usuarios->rut}}" >
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$usuarios->nombre}}">
            </div>
            <div class="form-group">
            	<label for="apellidos">Apellidos</label>
            	<input type="text" name="apellidos" class="form-control" value="{{$usuarios->apellidos}}" >
            </div>
            <div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$usuarios->telefono}}" >
            </div>
            <div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email" class="form-control" value="{{$usuarios->email}} ">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            {!! Html::link('administracion/estudiante', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection