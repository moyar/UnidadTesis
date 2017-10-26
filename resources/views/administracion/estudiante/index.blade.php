@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Estudiantes <a href="estudiante/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administracion.estudiante.search')
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
               <tbody>
				<tr>
					
					<td><center>{{$use->rut}}</center></td>
					<td><center>{{$use->nombre}}</center></td>
					<td><center>{{$use->apellidos}}</center></td>
					<td><center>{{$use->email}}</center></td>
					<td><center>{{$use->carreras->nombre}}</center></td>
					<td>

						 

						<a href="{{URL::action('EstudianteController@edit',$use->id_user)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$use->id_user}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                         <a href="{{URL::action('EstudianteController@datos',$use->id_user)}}"><button class="btn  btn-success"><i class="fa fa-fw fa-eye"></i>Ficha</button></a>
                         
					</td>
				</tr>
				@include('administracion.estudiante.modal')
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection