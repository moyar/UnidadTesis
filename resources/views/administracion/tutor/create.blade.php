@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Tutor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administracion/tutor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="rut">Rut</label>
            	<input type="text" name="rut" class="form-control" placeholder="Rut...">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="apellidos">Apellidos</label>
            	<input type="text" name="apellidos" class="form-control" placeholder="apellidos...">
            </div>
            <div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" placeholder="Telefono...">
            </div>
            <div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email" class="form-control" placeholder="Email...">
            </div>
            <div class="form-group col-md-8">
                             <label for = "carrera">Carrera</label>
                             
                             <label for = "carrera_id">Carrera</label>
                             <select class="form-control" name="carrera_id">
                                    <option value=''>Seleccionar Carrera</option>
                                    @foreach($carrera as $asi)
                                    <option value='{{ $asi->id}}'>{{ $asi->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>
                             <div class="form-group col-md-8">
                                   <label for = "genero">Genero</label>
                                   <select class="form-control" name="genero">
                                                  <option value=''> Seleccione un Genero </option>
                                                  <option value='Femenino'> Femenino</option>
                                                  <option value='Masculino'> Masculino </option>   
                                    </select>
                              </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	{!! Html::link('administracion/tutor', 'Cancelar',  array('class' => 'btn btn-danger')) !!}
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection