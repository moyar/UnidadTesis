@extends ('layouts.admin')
@section ('contenido')
<div class="well well bs-component">
	<div class="row">
	 
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3 style="border-bottom-style: solid;">Nueva Asignatura</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administracion/asignatura','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
            <div class="form-group">
            	<label for="codigo">Codigo</label>
            	<input type="text" name="codigo" class="form-control" placeholder="codigo asignatura...">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre asignatura...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	{!! Html::link('administracion/asignatura', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            </div>

			{!!Form::close()!!}		
            </div>
		</div>
	</div>
</div>
</div>
@endsection