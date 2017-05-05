@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Carreras <a href="carrera/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administracion.carrera.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>					
					<th><center>Carrera</center></th>
					<th><center>Telefono</center></th>
					<th><center>Facultad</center></th>
					<th><center>Campus</center></th>
					<th><center>Opciones</center></th>
				</thead>
               @foreach ($carrera as $use)
				<tr>
					<td><center>{{$use->nombre}}</center></td>
					<td><center>{{$use->telefono}}</center></td>
					<td><center>{{$use->facultad}}</center></td>
					<td><center>{{$use->campus}}</center></td>
					<td>
						<a href="{{URL::action('CarreraController@edit',$use->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$use->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.carrera.modal')
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection