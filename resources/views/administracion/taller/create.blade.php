@extends ('layouts.admin')

@section ('contenido')
<div class="well well bs-component">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3 style="border-bottom-style: solid;">Nuevo Grupo Taller</h3>
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
            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
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
					<option value='1'>1</option>
					<option value='2'>2</option>
			</select>
            </div>
            <div class="form-group col-md-8">
            	<label for="año">Año </label>
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
	</div>
</div>	
	
@endsection


