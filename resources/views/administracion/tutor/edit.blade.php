
@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		
       <h4 style="color: green;"><b>Editar Tutor</b> </h4>
       <h3>{{ $tutores->nombre}} {{ $tutores->apellidos}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tutores,['method'=>'PATCH','route'=>['administracion.tutor.update',$tutores->id_tutor]])!!}
            {{Form::token()}}
            <div class="form-group col-md-8">
            	<label for="rut">Rut</label>
            	<input type="text" name="rut" class="form-control" value="{{$tutores->rut}}" >
            </div>
            <div class="form-group col-md-8">
            	<label for="name">Nombre</label>
            	<input type="text" name="name" class="form-control" value="{{$tutores->name}}">
            </div>
            <div class="form-group col-md-8">
            	<label for="apellidos">Apellidos</label>
            	<input type="text" name="apellidos" class="form-control" value="{{$tutores->apellidos}}" >
            </div>
            <div class="form-group col-md-8">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$tutores->telefono}}" >
            </div>
            <div class="form-group col-md-8">
            	<label for="email">Email</label>
            	<input type="text" name="email" class="form-control" value="{{$tutores->email}} ">
            </div>

             <div class="form-group col-md-8">
          
                                  {{ Form::label('carrera', "Carrera:", ['class' => 'form-spacing-top']) }}
                                  {{ Form::select('carrera_id', $carre, null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group col-md-8">
            	<button class="btn btn-primary" type="submit">Guardar</button>
          {!! Html::link('administracion/tutor', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection