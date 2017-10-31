@extends ('layouts.admin')

@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Tutoria</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administracion/tutoria','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group col-md-8">
            	<label for="nombre_grupo">Grupo </label>
            	<input type="text" name="nombre_grupo" class="form-control" placeholder="nombre del grupo...">
            </div>
           <div class="form-group col-md-8">
           <label for = "asignatura">Asignatura</label>
           <select class="form-control" name="asignaturas_id">
					@foreach($asignaturas as $asi)
						<option value='{{ $asi->id_asignatura }}'>{{ $asi->nombre}}</option>
					@endforeach

			</select>
			</div>
			<div class="form-group col-md-8">
			<label for="tutor">Tutor</label>
			<select class="form-control" name="tutores_id">
					@foreach($tutores as $tu)
						<option value='{{ $tu->id }}'>{{ $tu->name }} {{ $tu->apellidos }}</option>
					@endforeach

			</select>
            </div>
            <div class="form-group col-md-8">
            	<label for="semestre">Semestre </label>
            	<select class="form-control" name="semestre">
					<option value=''>Seleccione Semestre</option>
					<option value='1'>1</option>
					<option value='2'>2</option>
			</select>
            </div>
            <div class="form-group col-md-8">
            	<label for="año">Año </label>
            	<input type="text" name="año" class="form-control" placeholder="Ingrese el año...">
            </div>
            <div class="form-group col-md-8">
           <label for = "profesor_id">Profesores</label>
           <select class="form-control" name="profesor_id">
					@foreach($profesores as $prof)
						<option value='{{ $prof->id }}'>{{ $prof->name}} {{ $prof->apellidos}}</option>
					@endforeach

			</select>
			</div>
           <div class="form-group col-md-8">
 			{{ Form::label('estudiantes', 'Estudiantes:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($estudiantes as $tag)
						<option value='{{ $tag->id_user }}'>{{ $tag->nombre }} {{ $tag->apellidos }}</option>
					@endforeach

				</select>
				</div>
            <div class="form-group col-md-8">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	{!! Html::link('administracion/tutoria', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            			
            </div>

			{!!Form::close()!!}
            
		</div>
	</div>
	
	
@endsection


