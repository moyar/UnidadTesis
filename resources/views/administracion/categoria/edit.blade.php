@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Taller: {{ $categoria->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

	{!!Form::model($categoria,['method'=>'PATCH','route'=>['administracion.categoria.update',$categoria->id_categoria]])!!}
            {{Form::token()}}
            
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	{!! Html::link('administracion/categoria', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            </div>

			{!!Form::close()!!}		
            
		</div>
            
		</div>
@endsection