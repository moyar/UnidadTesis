@extends ('layouts.admin')
@section ('contenido')
<div class="well well bs-component">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3 style="border-bottom-style: solid;">Nueva Carrera</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'administracion/carrera','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="form-group col-md-8">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Carrera...">
            </div>
          
            <div class="form-group col-md-8">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" placeholder="Telefono...">
            </div>
            <div class="form-group col-md-8">
                             <label for = "facultad">Carrera</label>
                             <select class="form-control" name="facultad">
                                    <option value=''>Seleccione una Facultad </option>        
                                    <option value='Arquitectura y Artes'>Arquitectura y Artes</option>
                                    <option value='Ciencias'>Ciencias</option>
                                    <option value='Ciencias Agrarias'>Ciencias Agrarias</option>
                                    <option value='Cs. Económicas y Administrativas'>Cs. Económicas y Administrativas</option>
                                    <option value='Cs. Forestales y Recursos Naturales'>Cs. Forestales y Recursos Naturales</option>
                                    <option value='Ciencias Jurídicas y Sociales'>Ciencias Jurídicas y Sociales</option>
                                    <option value='Ciencias Veterinarias'>Ciencias Veterinarias</option>
                                    <option value='Ciencias de la Ingeniería'>Ciencias de la Ingeniería </option>
                                    <option value='Filosofía y Humanidades'>Filosofía y Humanidades </option>
                                    <option value='Medicina'>Medicina</option>
                              </select>
            </div>



             <div class="form-group col-md-8">
                             <label for = "campus">Campus</label>
                             <select class="form-control" name="campus">
                                    <option value=''>Seleccione un Campus </option>
                                    <option value='Campus Miraflores'>Campus Miraflores</option>
                                    <option value='Campus Teja'>Campus Teja</option>
                                    <option value='Campus Puerto Montt'>Campus Puerto Montt</option>
                              </select>
            </div>

            <div class="form-group col-md-8">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            </div>
		</div>
	</div>
</div>
@endsection