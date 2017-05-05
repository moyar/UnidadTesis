@extends ('layouts.admin')

@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Taller</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administracion/taller','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group col-md-8">
            	<label for="nombre_grupo">Grupo </label>
            	<input type="text" name="nombre_grupo" class="form-control" placeholder="nombre del grupo...">
            </div>
           <div class="form-group col-md-8">
           <label for = "categoria">Taller</label>
           <select class="form-control" name="categoria_id">
					@foreach($categorias as $asi)
						<option value='{{ $asi->id_categoria }}'>{{ $asi->nombre}}</option>
					@endforeach

			</select>
			</div>

			 <div class="form-group col-md-8">
            	<label for="semestre">Semestre </label>
            	<select class="form-control" name="semestre">
					<option value=''>Seleccione Semestre</option>
					<option value='I'>I</option>
					<option value='II'>II</option>
			</select>
            </div>
            <div class="form-group col-md-8">
            	<label for="año">Grupo </label>
            	<input type="text" name="año" class="form-control" placeholder="Ingrese el año...">
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
            	{!! Html::link('administracion/categoria', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            			
            </div>

			{!!Form::close()!!}
            
		</div>
	</div>
	
	
@endsection


