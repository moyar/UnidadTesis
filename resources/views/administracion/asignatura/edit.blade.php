@extends ('layouts.admin')
@section ('contenido')
<div class="well well bs-component">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			

			 <h4 style="color: green;"><b>Editar Asignatura</b> </h4>
             <h3 style="border-bottom-style: solid;">{{ $asignatura->codigo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($asignatura,['method'=>'PATCH','route'=>['administracion.asignatura.update',$asignatura->id_asignatura]])!!}
            {{Form::token()}}
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="codigo">codigo</label>
            	<input type="text" name="codigo" class="form-control" value="{{$asignatura->codigo}}" >
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$asignatura->nombre}}">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	{!! Html::link('administracion/asignatura', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            </div>
        </div>

			{!!Form::close()!!}		
            
		</div>
      </div>
</div>
@endsection