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
					<th>Id</th>
					<th>Rut</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Email</th>
					<th>Opciones</th>
				</thead>
               @foreach ($users as $use)
				<tr>
					<td>{{ $use->id_user}}</td>
					<td>{{ $use->rut}}</td>
					<td>{{ $use->nombre}}</td>
					<td>{{ $use->apellidos}}</td>
					<td>{{ $use->email}}</td>
					<td>
						<a href="{{URL::action('EstudianteController@edit',$use->id_user)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$use->id_user}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.estudiante.modal')
				@endforeach
			</table>
		</div>
		{{$users->render()}}
	</div>
</div>

@endsection