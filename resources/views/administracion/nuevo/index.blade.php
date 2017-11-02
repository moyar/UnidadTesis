@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estudiantes Nuevos</h3>
		@include('administracion.nuevo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th><center>Rut</center></th>
					<th><center>Nombres</center></th>
					<th><center>Apellidos</center></th>
					<th><center>Email</center></th>
					<th><center>Carrera</center></th>
					<th><center>Opciones</center></th>
					
				</thead>
               @foreach ($usuarios as $use)
              
				<tr>
					
					<td><center>{{$use->rut}}</center></td>
					<td><center>{{$use->nombre}}</center></td>
					<td><center>{{$use->apellidos}}</center></td>
					<td><center>{{$use->email}}</center></td>
					<td><center>{{$use->carreras->nombre}}</center></td>
					<td>

						 {!!Form::open(array('url'=>'administracion/nuevo','method'=>'POST','autocomplete'=>'off'))!!}
             			{{Form::token()}}
            			 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            			 <input type="hidden" name="usuId" value="{{ $use->id_user }}">
						 <button class="btn btn-success" type="submit">Aceptar</button>
                         {!!Form::close()!!}	
                         
					</td>
				</tr>
			
				@endforeach
			
			</table>
		</div>
	</div>
</div>

@endsection